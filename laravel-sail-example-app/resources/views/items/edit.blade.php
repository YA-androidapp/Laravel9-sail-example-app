<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="bg-white shadow-sm sm:rounded-lg flex flex-col items-center p-6">
                    <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                    @error('title')
                    <span class="text-red-400 my-3">
                        {{$message}}
                    </span>
                    @endif

                    <input type="text" class="px-4 my-5 border shadow rounded w-3/4 @error('title') border-red-400 @endif" id="title" name="title" placeholder="Title" required value="{{ old('title', $item->title) }}" maxlength="100">
                    @error('content')
                    <span class="text-red-400 my-3">
                        {{$message}}
                    </span>
                    @endif

                    <textarea class="p-4 my-1 border shadow rounded w-3/4 @error('content') border-red-400 @endif" id="content" name="content" rows="10" placeholder="Content" required maxlength="400">{{ old('content', $item->content) }}</textarea>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg mb-10">
                    <div class="p-6 flex items-center flex-row-reverse">
                        <button type="submit" class="rounded bg-blue-400 text-white py-2 px-3 mx-40">{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>