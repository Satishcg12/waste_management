<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3  ">
        @forelse ($submission as $item)
            <x-user-video-card :submission="$item" />

        @empty
            <div class="flex justify-center items-center">
                <p class="text-2xl text-gray-500">No Submission Yet</p>
            </div>
        @endforelse
        <div class="pagination">

            {{ $submission->links() }}
        </div>
    </section>
</x-app-layout>
