<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <div>
                <x-primary-button class="ms-3">
                    <a href="{{ route('UsersCreate')}}">Create</a>
                </x-primary-button>
                <x-secondary-button class="ms-3">
                    <a href="{{ route('Trashlist')}}">Restore</a>
                </x-secondary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex justify-between px-4 py-4">
                    <h3>User List</h3>
                    <p>Search</p>
                </div>
                <div class="overflow-x-auto px-4 py-4">
                    
                    <table class="table-auto border-collapse border border-gray-400" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Name</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Email</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Role</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Status</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400" rowspan="4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="px-4 py-2 border border-gray-400">{{ $user -> name}}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $user -> email}}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $user -> role}}</td>
                                <td class="px-4 py-2 border border-gray-400 text-center">{{ $user -> status}}</td>
                                <td class="px-4 py-2 border border-gray-400 flex justify-center">
                                    <x-secondary-button class="ms-3">
                                        <a href="{{route('UserEdit', $user->id)}}">Edit</a>
                                    </x-second-button>
                                    <x-danger-button class="ms-3">
                                        <a href="{{route('UserTrash', $user->id)}}">Trash</a>
                                    </x--button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-2 py-2">
                        {{ $users->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>