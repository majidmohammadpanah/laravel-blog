<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {

                auth()->loginUsingId($user->id);
//                $user->notify(new LoginToWebsiteNotification());

                if(is_null($user->profile_photo_path) or str_contains($user->profile_photo_path,'avatars.com'))
                {
                    $data['profile_photo_path'] = $googleUser->getAvatar();
                }

                $user->markEmailAsVerified();
                $user->update($data);

            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'username' => $googleUser->getId(),
                    'password' => Hash::make(\Str::random(16)),
                    'profile_photo_path' => $googleUser->getAvatar(),
                ]);
                auth()->loginUsingId($newUser->id);
                $newUser->markEmailAsVerified();

//                $newUser->notify(new LoginToWebsiteNotification());

            }

            return redirect('/');
        } catch (\Exception $e) {
            Log::info('Google Auth Error.',['type'=>$e->getCode()]);
            session()->flash('status', 'Google Auth Error!');
            return redirect(route('login'));

        }

    }
}
