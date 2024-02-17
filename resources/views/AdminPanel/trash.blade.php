<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <x-primary-button class="ms-3">
                <a href="{{ route('Users')}}">Back</a>
            </x-primary-button>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex justify-between px-4 py-4">
                    <h3>Trash List</h3>
                    <p>Search</p>
                </div>
                <div class="overflow-x-auto px-4 py-4">
                    @php
                        $Sl = 1;
                    @endphp
                   
                        <table class="table-auto border-collapse border border-gray-400" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">SL</th>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Name</th>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Email</th>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Role</th>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Status</th>
                                    <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400" rowspan="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-400">{{ $Sl++ }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $user -> name}}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $user -> email}}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $user -> role}}</td>
                                    <td class="px-4 py-2 border border-gray-400 text-center">{{ $user -> status}}</td>
                                    <td class="px-4 py-2 border border-gray-400 flex justify-center">
                                        <x-primary-button class="ms-3">
                                            <a href="{{route('UserRestore', $user->id)}}">Restore</a>
                                        </x-primary-button>
                                        <x-danger-button class="ms-3">
                                            <a href="{{route('UserDelete', $user->id)}}">Delete</a>
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @empty
                            </tbody>
                        </table>
                        <div class="px-2 py-2">
                            {{ $users->links() }}
                        </div>
                       
                        <div class="px-2 py-2 text-center">
                            Trash Box Empty.
                        </div>
                        @endforelse                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>