<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg mb-10">
                <div x-data="{toggle : false}" class="p-6 flex items-center justify-between">
                    @auth
                    @can('edit', $item)
                    <a href="{{ route('items.edit', $item->id) }}">
                        <button class="rounded bg-blue-400 text-white py-2 px-3">{{ __('Edit') }}</button>
                    </a>
                    <button x-show="!toggle" @click="toggle = ! toggle" class="p-2 bg-red-400 rounded text-white">{{ __('Remove') }}</button>
                    <div x-show="toggle" @click.away="toggle = false" class="flex items-center mx-3 justify-between" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="-translate-x-5 opacity-0" x-transition:enter-end="translate-x-0">
                        <form method="post" action="{{ route('items.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-3 bg-red-400 rounded-lg text-white">{{ __('Remove') }}</button>
                        </form>
                        <button @click="toggle = false" class="p-2 mx-3 rounded-sm shadow-sm bg-yellow-100">{{ __('Cancel') }}</button>
                        <p class="text-red-300">Are you sure you want to remove this record?</p>
                    </div>
                    @endcan
                    @endauth
                </div>
            </div>
            <div class="flex flex-col p-6 bg-white shadow-lg rounded-lg">
                <div class="flex my-3 py-2 items-center justify-between border-b-2">
                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ $item->title }}</h2>
                    <small class="text-sm text-gray-700">{{ $item->updated_at }}</small>
                </div>
                <p class="my-3 text-gray-700 text-sm">
                    {{ $item->content }}
                </p>
                <p class="text-gray-700">By {{ $item->user->name }}</p>
            </div>
        </div>
    </div>
</x-app-layout>