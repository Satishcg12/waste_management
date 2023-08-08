<x-admin-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}

        </h2>
        <p>
            {{-- if search --}}
            @if (request()->query('search'))
                <span class="text-gray-500 text-sm">Search results for "{{ request()->query('search') }}"</span>
            @endif
        </p>
    </x-slot>
    <section
        class=" mt-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3  ">
        @forelse ($submissions as $submission)
            <x-admin-video-card :submission="$submission" />
        @empty
            <div
                class="w-full text-center text-gray-500 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 h-[80vh] flex justify-center items-center">
                <h1 class="text-3xl font-bold">
                    {{-- if search --}}
                    @if (request()->query('search'))
                        No Results Found
                    @else
                        No Submissions Yet
                    @endif
                </h1>
            </div>
        @endforelse

        <div class="pagination col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3  ">
            {{ $submissions->links() }}
        </div>
    </section>


</x-admin-layout>
