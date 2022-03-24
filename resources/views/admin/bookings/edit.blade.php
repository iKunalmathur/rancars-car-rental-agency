<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('bookings / edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="grid grid-cols-1 md:grid-cols-12 gap-8"
                        action="{{ route('admin.bookings.update',$booking) }}" method="post">
                        @csrf
                        @method("put")

                        <div class="space-y-2 md:col-span-6">
                            <x-label>Select buyer</x-label>
                            <select name="buyer_id" id="buyer_id"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @foreach ($buyers as $buyer)
                                <option value="{{$buyer->id}}" @if ($booking->buyer_id==$buyer->id)
                                    selected
                                    @endif
                                    >{{ $buyer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>Select Car</x-label>
                            <select name="car_id" id="car_id"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @foreach ($cars as $car)
                                <option value="{{$car->id}}" @if ($booking->car_id === $car->id) selected @endif
                                    >{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>start_date</x-label>
                            <x-input type="date" name="start_date" value="{{$booking->start_date}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>end_date</x-label>
                            <x-input type="date" step=0 min=0 name="end_date" value="{{$booking->end_date}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>rent</x-label>
                            <x-input type="number" name="rent" min=0 step="0.5" value="{{$booking->rent}}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>number_of_days</x-label>
                            <x-input type="number" min=1 name="number_of_days" value="{{$booking->number_of_days}}" />
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