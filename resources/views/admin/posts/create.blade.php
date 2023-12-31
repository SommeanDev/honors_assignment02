<x-admin-layout>
    <x-slot name="header">
        {{ __(' Create Post')}}
    </x-slot>
    <form method="POST" action="{{ route('admin-posts-create') }}" enctype="multipart/form-data" class="p-3">
        @csrf

        <!-- Title -->
        <div class="p-2">
            <label for="title">{{ __('Title') }}</label>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
        </div>

        <!-- Content -->
        <div class="p-2">
            <label for="content">{{ __('Content') }}</label>
            <textarea id="content"
                class="block mt-1 w-full rounded"
                name="content" :value="old('content')"
                rows="6"
                required autofocus></textarea>
        </div>

        {{-- <x-form-errors /> --}}

        <div class="block p-2">
            <x-primary-button type="submit">Create</x-primary-button>
        </div>

    </form>
</x-admin-layout>
