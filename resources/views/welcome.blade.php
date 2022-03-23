<x-guest-layout>
    <div class="flex flex-col justify-between min-h-screen max-w-container">
        <x-header />
        <main class="">
            <section class="grid place-content-center min-h-[40vh]">
                <div class="text-center space-y-6">
                    <h1 class="font-extrabold text-5xl capitalize max-w-[80%] mx-auto text-center">
                        Find Perfect Car For Your Next Trip.
                    </h1>
                    <p class="text-muted">available cars to rent</p>
                </div>
            </section>
            <section class="grid grid-cols-1 Xmd:grid-cols-12 gap-4">
                {{-- <aside class="md:col-span-3">filters</aside> --}}
                <div class="md:col-span-9">
                    @forelse ($cars as $car)
                    <x-car-card :car="$car" />
                    @empty
                    <div>
                        <h2>No Car Found</h2>
                    </div>
                    @endforelse
                    {{-- Pagination --}}
                    @if ($cars->count() ?? false)
                    <div class="mt-8">
                        {{ $cars->links() }}
                    </div>
                    @endif
                </div>
            </section>
            <section id="agency" class="mt-8">
                <div class="bg-white border shadow-md rounded-lg p-8">
                    <div class="grid sm:grid-cols-6 gap-4 min-h-[10rem] items-center">
                        <div class="sm:col-span-4 text-center sm:text-left">
                            <h1 class="font-extrabold text-4xl capitalize text-primary-500">
                                Want to list your car ?
                            </h1>
                            <p class="text-muted mt-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam,
                                debitis?
                                Aliquam repudiandae
                                magnam cupiditate sapiente?</p>
                        </div>
                        <div class="sm:col-span-2 text-center">
                            <a href="{{ route('owner.register') }}">
                                <x-button>Register Now</x-button>
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('owner.login') }}" class="site-link text-muted text-sm ">Already
                                    have an account ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <x-footer />
    </div>
</x-guest-layout>