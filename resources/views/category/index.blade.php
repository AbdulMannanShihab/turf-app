<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Turf Category
            </h2>
            <div>
                <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'turf-category-create')"
                >{{ __('Create') }}</x-primary-button>
            </div>
        </div>
    </x-slot>
    <div class="modal">
        @include('category.create-modal')
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex justify-between px-4 py-4">
                    <h3>Category List</h3>
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
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Status</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400" rowspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($turf_categories as $category)
                            
                            <tr>
                                <td class="px-4 py-2 border border-gray-400">{{ $Sl++ }}</td>
                                <td class="px-4 py-2 border border-gray-400">{{ $category -> category_name}}</td>
                                <td class="px-4 py-2 border border-gray-400 text-center">
                                    @if($category->status === 'Active')
                                        <span class="px-4 py-2 bg-green-600 text-white rounded-md font-semibold text-xs">{{ $category->status }}</span>
                                    @else
                                        <span class="px-4 py-2 bg-red-600 text-white rounded-md font-semibold text-xs">{{ $category->status }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border border-gray-400 flex justify-center">
                                    <x-secondary-button class="ms-3">
                                        <a href="{{route('turf_category.edit', $category->id)}}">Edit</a>
                                    </x-second-button>
                                    <div class="ms-3">
                                        <form method="post" action="{{ route('turf_category.destroy', $category->id) }}">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button class="ms-3">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                       
                        </tbody>
                    </table>
                    <div class="px-2 py-2">
                        {{ $turf_categories -> links() }}
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>