<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('bookings / create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="grid grid-cols-1 md:grid-cols-12 gap-8" action="{{ route('owner.bookings.store') }}"
                        method="post">
                        @csrf
                        <div class="space-y-2 md:col-span-12">
                            <x-label>Select Car</x-label>
                            <select name="car_id" id="car_id"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @foreach ($cars as $car)
                                <option value="{{$car->id}}" @if (old('car_id') && old('car_id')==$car->id)
                                    selected
                                    @endif
                                    >{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>start date</x-label>
                            <x-input type="date" name="start_date" value="{{old('start_date')}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>end date (optional)</x-label>
                            <x-input type="date" step=0 min=0 name="end_date" value="{{old('end_date')}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>rent</x-label>
                            <x-input type="number" name="rent" min=0 step="0.5" value="{{old('rent')}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>number of days</x-label>
                            <x-input type="number" min=1 name="number_of_days" value="{{old('number_of_days')}}" />
                        </div>
                        <div class="space-y-2 md:col-span-12">
                            <x-button class="submit">Submit</x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>