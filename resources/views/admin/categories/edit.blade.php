<x-app-admin-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="post" action="{{ route('categories.update',[$category->id]) }}" >
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" autocomplete="given-title" value="{{ $category->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('title')
                            <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <p class="text-sm text-gray-700 mt-5 mb-3">Last Update : {{ $category->updated_at }}</p>
                        <div class="mt-5">
                            <x-button >
                                Update
                            </x-button>
                        </div>


                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
