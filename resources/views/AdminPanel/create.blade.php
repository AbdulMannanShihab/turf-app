<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                
                <div class="overflow-x-auto px-4 py-4">
                   <form action="{{ route('UserStore') }}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <!-- Role -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select name="role" id="role" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="" selected>Select User Role</option>
                                <option value="super-admin" selected>Super Admin</option>
                                <option value="admin" selected>admin</option>
                                <option value="customer" selected>customer</option>
                            </select>
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Save') }}
                        </x-primary-button>
                   </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>