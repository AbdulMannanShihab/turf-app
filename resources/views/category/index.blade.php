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
                <div class="overflow-x-auto px-4 py-4">
                    @php
                        $Sl = 1;
                    @endphp
                    <table id="TurfCategoryDataTable" class="display table-auto border-collapse border border-gray-400">
                        <thead class="text-center">
                            <tr>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">SL</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Category</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Status</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($turf_categories as $turf_category)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-400">{{ $Sl++ }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $turf_category -> category_name}}</td>
                                    <td class="px-4 py-2 border border-gray-400 text-center">
                                        @if($turf_category->status === 'Active')
                                            <x-active-button class="ms-3 mt-2">
                                                {{ $turf_category -> status}}
                                            </x-active-button>
                                        @else
                                            <x-inactive-button>
                                                {{ $turf_category -> status}}
                                            </x-inactive-button>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2  flex justify-center">
                                        <x-secondary-button class="ms-3 mt-2">
                                            <a href="{{route('turf_category.edit', $turf_category->id)}}">Edit</a>
                                        </x-second-button>
                                        <div class="ms-3 mt-2">
                                            <form method="post" action="{{ route('turf_category.destroy', $turf_category->id) }}">
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
                </div>
            </div>
        </div>
    </div>

    <!-- require page -->
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#TurfCategoryDataTable').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'pageLength'
                    ]
                } );
            } );
        </script>
    @endpush
</x-app-layout>