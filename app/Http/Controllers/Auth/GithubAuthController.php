<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            $user = User::where('email', $githubUser->email)->first();

            if ($user) {

                auth()->loginUsingId($user->id);
//                $user->notify(new LoginToWebsiteNotification());
                if(is_null($user->profile_photo_path) or str_contains($user->profile_photo_path,'avatars.com'))
                {
                    $data['profile_photo_path'] = $githubUser->getAvatar();
                }
                $user->markEmailAsVerified();
                $user->update($data);

            } else {
                $newUser = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'username' => $githubUser->getId(),
                    'password' => Hash::make(\Str::random(16)),
                    'profile_photo_path' => $githubUser->getAvatar(),
                ]);
                auth()->loginUsingId($newUser->id);
                $newUser->markEmailAsVerified();
//                $newUser->notify(new LoginToWebsiteNotification());

            }

            return redirect('/');
        } catch (\Exception $e) {
            Log::info('Github Auth Error.',['type'=>$e->getCode()]);
            session()->flash('status', 'Github Auth Error!');
            return redirect(route('login'));
        }

    }
}
