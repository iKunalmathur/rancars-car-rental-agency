<header class="py-8">
    <div class="flex flex-col justify-center items-center md:flex-row md:justify-between gap-4 flex-wrap">
        <div>
            <a href="/">
                <x-logo />
            </a>
        </div>
        <nav class="flex gap-8 capitalize items-center">
            @guest
            <a href="#agency">Want To List ?</a>
            <a href="{{ route('customer.login') }}">login</a>
            <a href="{{ route('customer.register') }}">
                <x-button>register</x-button>
            </a>
            @endguest
            @auth
            <a href="/dashboard">
                <x-button>dashboard</x-button>
            </a>
            @endauth
        </nav>
    </div>
</header>