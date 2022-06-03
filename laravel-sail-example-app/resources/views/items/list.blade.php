<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg mb-10">
                <div class="p-6 flex items-center ">
                    <a href="{{ route('items.create') }}">
                        <button class="rounded bg-blue-400 text-white py-2 px-3">Add an item</button>
                    </a>
                </div>
            </div>
            
            <div class="bg-white shadow-sm sm:rounded-lg ">
                @foreach ($items as $item)
                <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex flex-col ">
                        <span class="text-xs text-gray-800">{{ $item->user->name }}</span>
                        <span class="text-xs text-gray-800">{{ $item->updated_at }}</span>
                    </div>
                    <a href="{{ route('items.show', $item->id) }}">
                        <p class="text-md">{{$item->title}}</p>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="my-5">{{$items->links()}}</div>
        </div>
    </div>
</x-app-layout>
