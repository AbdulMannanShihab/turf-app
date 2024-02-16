<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                
                <div class="overflow-x-auto px-4 py-4">
                   <form action="{{ route('UserUpdate', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" value="{{ $user -> name }}" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" value="{{ $user -> email }}" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <!-- Role -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select name="role" id="role" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @if($user -> role == 'super-admin') 
                                    <option selected>{{ $user -> role }}</option>
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                @elseif($user -> role == 'admin') 
                                    <option selected>{{ $user -> role }}</option>
                                    <option value="super-admin">Admin</option>
                                    <option value="customer">Customer</option>
                                @else
                                    <option selected>{{ $user -> role }}</option>
                                    <option value="super-admin">Super Admin</option>
                                    <option value="admin">admin</option>
                                @endif
                            </select>
                        </div>
                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @if($user -> status == 'Active')
                                    <option selected>{{ $user -> status }}</option>
                                    <option value="Inactive">Inactive</option>
                                @else
                                    <option selected>{{ $user -> status }}</option>
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