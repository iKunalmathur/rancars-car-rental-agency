<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('cars / create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="grid grid-cols-1 md:grid-cols-12 gap-8" action="{{ route('admin.cars.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-2 md:col-span-12">
                            <x-label>Select owner</x-label>
                            <select name="owner_id" id="owner_id"
                                class='w-full rounded-md shadow-sm border-gray-300focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                                @foreach ($owners as $owner)
                                <option value="{{$owner->id}}">{{ $owner->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            @livewire('image-input')
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>Name</x-label>
                            <x-input type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>model</x-label>
                            <x-input type="text" name="model" value="{{ old('model') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>seating capacity</x-label>
                            <x-input type="number" min=0 name="seating_capacity"
                                value="{{ old('seating_capacity') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>rent (in ??? per day)</x-label>
                            <x-input type="number" name="rent" step="0.5" value="{{ old('rent') }}" />
                        </div>
                        <div class="space-y-2 md:col-span-6">
                            <x-label>plate number</x-label>
                            <x-input type="text" name="plate_number" value="{{ old('plate_number') }}" />
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