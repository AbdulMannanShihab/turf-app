<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Schedule
            </h2>
            <x-primary-button class="ms-3">
                <a href="{{ route('turf_schedule.index')}}">Back</a>
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                
                <div class="overflow-x-auto px-4 py-4">
                   <form action="{{ route('turf_schedule.store') }}" method="POST">
                        @csrf
                        <!--Catgeory Name -->
                        <div class="mt-2">
                            <x-input-label for="catgeory_id" :value="__('Catgeory Name')" />
                            <select name="turf_category_id" id="turf_category_id" type="text" style="width: 100%;"
                                    class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" selected>Select Category</option>
                                    @foreach($turf_categories as $category)
                                        <option value="{{ $category -> id }}" >{{ $category -> category_name}}</option>
                                    @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('turf_category_id')" class="mt-2" />
                        </div>

                        <!--Shift Name -->
                        <div class="mt-2">
                            <x-input-label for="shift_name" :value="__('Shift Name')" />
                                <select name="shift_name" id="shift_name" type="text" style="width: 100%;"
                                        class="mt-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" selected>Select Shift</option>
                                    <option value="Morning" >Morning</option>
                                    <option value="Day">Day</option>
                                    <option value="Night">Night</option>
                                </select>
                            <x-input-error :messages="$errors->get('shift_name')" class="mt-2" />
                        </div>
                        
                        <!--Start Time -->
                        <div class="mt-2">
                            <x-input-label for="start_time" :value="__('Start Time')" />
                            <x-text-input id="start_time" class="block mt-1 w-full" type="time" 
                                          name="start_time"  />
                            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                        </div>

                        <!--End Time -->
                        <div class="mt-2">
                            <x-input-label for="end_time" :value="__('End Time')" />
                            <x-text-input id="end_time" class="block mt-1 w-full" type="time" 
                                          name="end_time"/>
                            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                        </div>
                        
                        <!--Booking Price -->
                        <div class="mt-2">
                            <x-input-label for="booking_price" :value="__('Booking Price')" />
                            <x-text-input id="booking_price" class="block mt-1 w-full" type="text" 
                                            name="booking_price" :value="old('booking_price')" required autofocus 
                                            autocomplete="booking_price" />
                            <x-input-error :messages="$errors->get('booking_price')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-2">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" 
                                            name="price" :value="old('price')" required autofocus autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
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
