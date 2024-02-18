<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Category
            </h2>
            <x-primary-button class="ms-3">
                <a href="{{ route('turf_category.index')}}">Back</a>
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                
                <div class="overflow-x-auto px-4 py-4">
                   <form action="{{ route('turf_category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-input-label for="category_name" :value="__('Category Name')" />
                            <x-text-input id="category_name" name="category_name" value="{{ $category -> category_name }}" class="block mt-1 w-full" type="text"  required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
                        </div>
                        
                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @if($category -> status == 'Active')
                                    <option selected>{{ $category -> status }}</option>
                                    <option value="Inactive">Inactive</option>
                                @else
                                    <option selected>{{ $category -> status }}</option>
                                    <option value="Active">Active</option>
                                @endif
                            </select>
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Update') }}
                        </x-primary-button>
                   </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>