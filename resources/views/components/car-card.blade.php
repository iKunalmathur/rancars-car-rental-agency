@props(['car','type' => "customer"])

<div class="bg-white shadow-md p-6 rounded-lg border mt-8">
    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
        <div class="sm:col-span-4 ">
            <img class="w-full h-[150px] object-cover"
                src="{{$car->image ? $car->imagePath() : 'https://via.placeholder.com/300x210'}}" alt="car">
        </div>
        <div class="sm:col-span-8 flex flex-col justify-between gap-2">
            <div class="space-y-3">
                <h2 class="text-2xl font-bold">{{$car->name}}</h2>
                <div class="flex text-xs gap-2 capitalize">
                    <p class="text-muted">{{$car->model}}</p>
                    <p class="text-muted">•</p>
                    <p class="text-muted">{{$car->seating_capacity}} Seats</p>
                </div>
                <div class="bg-gray-100 py-1 px-2 rounded-lg w-max text-sm uppercase">
                    <code>{{$car->plate_number}}</code>
                </div>
            </div>
            <div class="flex justify-between flex-wrap items-center gap-4">
                <div class="capitalize font-bold">
                    <span class="text-green-600 text-2xl">₹ {{$car->rent}}</span> / per day
                </div>
                @auth
                @if ($type === 'customer')
                <div class="">
                    <a href="{{ route('customer.cars.show', $car) }}">
                        <x-button>Rent Car</x-button>
                    </a>
                </div>
                @else
                <div class="">
                    <a href="{{ url()->previous() }}">
                        <x-button>Go Back</x-button>
                    </a>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>