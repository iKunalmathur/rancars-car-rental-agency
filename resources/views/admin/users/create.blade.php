<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('users / create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="grid grid-cols-1 md:grid-cols-12 gap-8" action="{{ route('admin.users.store') }}"
                        method="post">
                        @csrf
                        <div class="space-y-2 md:col-span-6">
                            @livewire('image-input')
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>Select role</x-label>
                            <select name="role_id" id="role_id"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}" @if (old('role_id') && old('role_id')==$role->id)
                                    selected
                                    @endif
                                    >{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>Name</x-label>
                            <x-input type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>email</x-label>
                            <x-input type="email" name="email" value="{{ old('email') }}" />
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>