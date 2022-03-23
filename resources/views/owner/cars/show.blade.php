<x-guest-layout>
    <div class="flex flex-col justify-between min-h-screen max-w-container">
        <x-header />
        <main class="">
            <section class="">
                {{-- Car Details --}}
                <x-car-card :car="$car" type="owner" />
                <div class="bg-white shadow-md p-6 rounded-lg space-y-2 border mt-8">
                    <h1 class="text-xl font-semibold border-b-2 mb-4 pb-6">Booking History : </h1>
                    @forelse ($car->bookings as $booking)
                    <div class="border-b-2 mb-4 py-4">
                        <h2 class="">Name: {{$booking->buyer->name}}</h2>
                        <p>Email : {{$booking->buyer->email}}</p>
                        <p>Rent : ₹ {{$booking->rent}} / per day</p>
                    </div>
                    @empty
                    <h2 class="text-muted">Not Booked yet</h2>
                    @endforelse
                </div>
            </section>
        </main>
        <x-footer />
    </div>
</x-guest-layout>