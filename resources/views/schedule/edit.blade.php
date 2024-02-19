<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Schedule
            </h2>
            <div>
                <form method="post" action="{{ route('turf_schedule.destroy', $turf_schedule->id) }}">
                    @csrf
                    @method('delete')
                    <x-danger-button class="ms-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </form>
            </div>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="overflow-x-auto px-4 py-4">
                   <form action="{{ route('turf_schedule.update', $turf_schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--Catgeory Name -->
                        <div class="mt-2">
                            <x-input-label for="catgeory_id" :value="__('Catgeory Name')" class="mt-"/>
                            <select name="turf_category_id" id="turf_category_id"  type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        
                                        <option value="{{ $turf_schedule -> turf_category_id }}" selected>{{ $turf_schedule -> category_name }}</option>
                                    
                                        @foreach($turf_categories as $category)
                                            <option value="{{ $category -> id }}">{{ $category -> category_name}}</option>
                                        @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('turf_category_id')" class="mt-2" />
                        </div>

                        <!--Shift Name -->
                        <div class="mt-2">
                            <x-input-label for="shift_name" :value="__('Shift Name')" />
                                <select name="shift_name" id="shift_name" type="text" style="width: 100%;"
                                        class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @if($turf_schedule -> shift_name  == 'Morning')
                                        <option value="{{ $turf_schedule -> shift_name }}" >{{ $turf_schedule -> shift_name }}</option>
                                        <option value="Day">Day</option>
                                        <option value="Night">Night</option>
                                    @elseif($turf_schedule -> shift_name  == 'Day')
                                        <option value="{{ $turf_schedule -> shift_name }}" >{{ $turf_schedule -> shift_name }}</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Night">Night</option>
                                    @else
                                        <option value="{{ $turf_schedule -> shift_name }}" >{{ $turf_schedule -> shift_name }}</option>
                                        <option value="Day">Day</option>
                                        <option value="Morning">Morning</option>
                                    @endif
                                </select>
                            <x-input-error :messages="$errors->get('shift_name')" class="mt-2" />
                        </div>
                        
                        <!--Start Time -->
                        <div class="mt-2">
                            <x-input-label for="start_time" :value="__('Start Time')" />
                            <x-text-input id="start_time" class="block mt-1 w-full" type="time" 
                                          name="start_time"  value="{{ $turf_schedule -> start_time }}"/>
                            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                        </div>

                        <!--End Time -->
                        <div class="mt-2">
                            <x-input-label for="end_time" :value="__('End Time')" />
                            <x-text-input id="end_time" class="block mt-1 w-full" type="time" 
                                          name="end_time" value="{{ $turf_schedule -> end_time }}"/>
                            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                        </div>
                        
                        <!--Booking Price -->
                        <div class="mt-2">
                            <x-input-label for="booking_price" :value="__('Booking Price')" />
                            <x-text-input id="booking_price" class="block mt-1 w-full" type="text" 
                                            name="booking_price" :value="old('booking_price')" required autofocus 
                                            autocomplete="booking_price" value="{{ $turf_schedule -> booking_price }}"/>
                            <x-input-error :messages="$errors->get('booking_price')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-2">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" 
                                            name="price" :value="old('price')" value="{{ $turf_schedule -> price }}" required autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @if($turf_schedule -> status == 'Active')
                                    <option selected>{{ $turf_schedule -> status }}</option>
                                    <option value="Inactive">Inactive</option>
                                @else
                                    <option selected>{{ $turf_schedule -> status }}</option>
                                    <option value="Active">Active</option>
                                @endif
                            </select>
                        </div>

                        <div class="flex justify-between">
                            <x-primary-button class="mt-4">
                                {{ __('Save') }}
                            </x-primary-button>
                            <x-secondary-button class="mt-4">
                                <a href="{{ route('turf_schedule.index')}}">Back</a>
                            </x-secondary-button>
                        </div>
                        
                   </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
