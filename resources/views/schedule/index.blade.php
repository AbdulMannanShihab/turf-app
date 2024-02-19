<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Turf Schedule
            </h2>
            <x-primary-button class="ms-3">
                <a href="{{ route('turf_schedule.create')}}">Create</a>
            </x-primary-button>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex justify-between px-4 py-4">
                    <h3>Schedule List</h3>
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
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Category</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Shift </th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Time</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Price</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Status</th>
                                <th class="px-4 py-2 text-gray-600 font-bold border border-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($turf_schedules as $turf_schedule)
                                <tr>
                                    <td class="px-4 py-2 border border-gray-400">{{ $Sl++ }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $turf_schedule -> category_name}}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $turf_schedule -> shift_name }}</td>
                                    <td class="px-4 py-2 border border-gray-400">
                                        <li>Start Time: {{ date('h:i:s A', strtotime($turf_schedule->start_time)) }}</li>
                                        <li>End Time: {{ date('h:i:s A', strtotime($turf_schedule->end_time)) }}</li>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-400">
                                        <li>Booking Price : {{ $turf_schedule -> booking_price}}</li>
                                        <li>Price : {{ $turf_schedule -> price}} </li>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-400 text-center">{{ $turf_schedule -> status}}</td>
                                    <td class="px-4 py-2  flex justify-center">
                                        <x-secondary-button class="ms-3 mt-2">
                                            <a href="{{route('turf_schedule.edit', $turf_schedule->id)}}">Edit</a>
                                        </x-second-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-2 py-2">
                        {{ $turf_schedules -> links() }}
                    </div>
                                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>