<x-app-admin-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Tag
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('tags.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" autocomplete="given-title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('title')
                            <div class="text-red-600 text-sm pt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-button >
                                Save
                            </x-button>
                        </div>


                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
