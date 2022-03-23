<x-guest-layout>
    <div class="flex flex-col justify-between min-h-screen max-w-container">
        <x-header />
        <main class="">
            <section class="">
                {{-- Car Details --}}
                <x-car-card :car="$car" type="back" />
                {{-- Booking Form --}}
                <div class="border bg-white shadow-md p-6 rounded-lg space-y-2 mt-8">
                    <h1 class="text-xl font-semibold mb-4">Create Booking : </h1>
                    <form class="grid grid-cols-1 md:grid-cols-12 gap-8" action="{{ route('customer.bookings.store') }}"
                        method="post">
                        @csrf
                        <x-input type="text" name="car_id" value="{{ $car->id }}" hidden readonly />
                        <div class="space-y-2 md:col-span-6">
                            <x-label>start date</x-label>
                            <x-input type="datetime-local" name="start_date" value="{{ old('start_date') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>end date (optional)</x-label>
                            <x-input type="datetime-local" step=0 min=0 name="end_date" value="{{ old('end_date') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-12">
                            <x-label>number of days</x-label>
                            <select name="number_of_days"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @for ($i = 1; $i <= 10; $i++) <option value="{{$i}}" @if (old('number_of_days') &&
                                    old('number_of_days')==$i) selected @endif>
                                    {{ $i }}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        {{-- <div class="space-y-2 md:col-span-12">
                            <x-label>number of days</x-label>
                            <x-input type="number" min=1 name="number_of_days" value="{{ old('number_of_days') }}" />
                        </div> --}}
                        <div class="space-y-2 md:col-span-12">
                            <x-button class="submit">Submit</x-button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <x-footer />
    </div>
</x-guest-layout>