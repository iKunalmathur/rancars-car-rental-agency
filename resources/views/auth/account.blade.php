<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-6 ">
                    {{-- Details --}}
                    <section>
                        <div class="flex gap-4 items-center">
                            <img class="w-20 h-20 rounded-full"
                                src="{{$authUser->image ? $authUser->imagePath() : 'https://via.placeholder.com/150'}}"
                                alt="avtar">
                            <div>
                                <p>{{ $authUser->name }}</p>
                                <p class="text-muted">{{ $authUser->email }}</p>
                            </div>
                        </div>
                    </section>
                    {{--Update Details --}}
                    <section>
                        <p class="text-muted mb-4">Update account details!</p>
                        <form class="grid grid-cols-1 md:grid-cols-12 gap-8"
                            action="{{ route('auth.account.details') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="space-y-2 md:col-span-12">
                                @livewire('image-input')
                            </div>
                            <div class="space-y-2 md:col-span-6">
                                <x-label>Name</x-label>
                                <x-input type="text" name="name" value="{{ $authUser->name }}" />
                            </div>
                            <div class="space-y-2 md:col-span-6">
                                <x-label>email</x-label>
                                <x-input type="email" name="email" value="{{ $authUser->email }}" />
                            </div>

                            <div class="space-y-2 md:col-span-12">
                                <x-button class="submit">Submit</x-button>
                            </div>
                        </form>
                    </section>
                    <section>
                        <p class="text-muted mb-4">Update Password!</p>
                        <form class="grid grid-cols-1 md:grid-cols-12 gap-8"
                            action="{{ route('auth.account.password') }}" method="post" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            @method("put")
                            <div class="space-y-2 md:col-span-12">
                                <x-label for="current_password" :value="__('current Password')" />
                                <x-input id="current_password" class="block mt-1 w-full" type="password"
                                    name="current_password" required autocomplete="off" />
                            </div>
                            <div class="space-y-2 md:col-span-6">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="block mt-1 w-full" type="text" name="password" required
                                    autocomplete="off" />
                            </div>
                            <div class="space-y-2 md:col-span-6">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="off" />
                            </div>

                            <div class="space-y-2 md:col-span-12">
                                <x-button class="submit">Submit</x-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>