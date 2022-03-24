<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('users') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <div class="text-lg">
                            You Have Total {{ $users->count() ?? 0 }} User
                        </div>
                        <a href="{{route('admin.users.create')}}">
                            <x-button>Create</x-button>
                        </a>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b font-semibold">
                                            <tr>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    #
                                                </th>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    Avatar
                                                </th>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    Name/Email
                                                </th>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    Role
                                                </th>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    Created At
                                                </th>
                                                <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{$loop->iteration}}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <img class="h-8 w-8 rounded-full object-cover"
                                                        src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <p>
                                                        {{ $user->name}}
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        {{ $user->email}}
                                                    </p>
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$user->role->title}}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$user->created_at}}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-4">
                                                    <a href="{{ route('admin.users.edit',$user) }}"
                                                        class="text-blue-500">Edit</a>
                                                    <form action="{{ route('admin.users.destroy',$user) }}"
                                                        method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="text-red-500">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    No data found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>