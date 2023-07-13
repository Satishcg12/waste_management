<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($submission as $item)
        <x-user-video-card :item="$item" />

        @endforeach
    </div>
    <div class="pagination">

                {{ $submission->links() }}
        </div>
</x-app-layout>
