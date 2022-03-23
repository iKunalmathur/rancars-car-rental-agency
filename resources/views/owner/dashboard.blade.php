<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-2xl font-semibold">Welcome to {{ config('app.name', 'Laravel') }}</p>

                    <div class="mt-4 space-y-4">
                        <p>
                            Total Cars : {{ auth()->user()->cars?->count() ?? 0 }}
                        </p>
                        <p>
                            Total Bookings : {{ auth()->user()->bookings?->count() ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>