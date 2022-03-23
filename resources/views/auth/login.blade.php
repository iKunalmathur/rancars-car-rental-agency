<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h1 class="text-lg font-bold mb-4 text-left">Login As</h1>
        @guest
        <div class="flex flex-col gap-4">
            <a class="" href="{{ route('customer.login') }}">
                <x-button class="w-full">I am Customer</x-button>
            </a>
            <a class="" href="{{ route('owner.login') }}">
                <x-button class="w-full">I am Owner/Agency</x-button>
            </a>
        </div>
        @endguest
        @auth
        <a href="/dashboard">
            <x-button>dashboard</x-button>
        </a>
        @endauth
    </x-auth-card>
</x-guest-layout>