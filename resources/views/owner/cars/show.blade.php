<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('cars / show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="overflow-hidden p-6">
                {{-- Car Details --}}
                <h1 class="text-xl font-semibold">Car Details : </h1>
                <x-car-card :car="$car" type="admin" />
            </div>
            <div class="overflow-hidden p-6">
                {{-- Booking History --}}
                <h1 class="text-xl font-semibold">Booking History : </h1>
                <div class="grid gap-4 sm:grid-cols-3 mt-8">
                    @forelse ($car->bookings as $booking)
                    <x-booking-card :booking="$booking" />
                    @empty
                </div>
                <h2 class="text-muted">Not Booked yet</h2>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>