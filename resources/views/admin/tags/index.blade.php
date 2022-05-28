<x-app-admin-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage of Tags
        </h2>
        <div class="mt-3">
            <a class="underline text-sm text-blue-600 hover:text-blue-700" href="{{ route('tags.create') }}">
                Add New Tag
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                   @foreach($tags as $tag)
                        <div class="flex items-center justify-between p-2 hover:bg-gray-50 transform transition duration-100">
                           <h1 class="text-base text-indigo-800 font-bold"> {{ $tag->title }}</h1>
                           <div class="flex">
                               <a href="{{ route('tags.edit',$tag->id) }}" class="inline-flex items-center text-sm transform transition duration-200 justify-center px-3 py-1 border border-transparent rounded-md text-indigo-800 bg-indigo-100 hover:bg-indigo-200">Edit</a>
                               <form action="{{ route('tags.destroy',$tag->id) }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="inline-flex items-center text-sm justify-center px-3 py-1 border transform transition duration-200 border-transparent rounded-md text-gray-900 bg-gray-200 hover:bg-gray-300 ml-2">Delete</button>
                               </form>
                           </div>
                       </div>
                    @endforeach
                </div>
            <!-- Pagination -->
            <div class="p-2">
                {!! $tags->render() !!}
            </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
