<x-teacher-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}

        </h2>
    </x-slot>
    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">


        @forelse ($submissions as $item)

        <x-teacher-video-card :item="$item" />
        @empty
        <div class="text-center text-gray-500">
            <h1 class="text-3xl font-bold">No Submissions Yet</h1>
        </div>
        @endforelse
    </div>
    <div class="pagination">

        {{ $submissions->links() }}
    </div>
</x-teacher-layout>
