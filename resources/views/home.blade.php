<x-public-layout>

    {{-- <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse ($submissions as $submission)
            <x-video-card :item="$submission" />
        @empty
            <div class="w-full text-center text-gray-500">
                <h1 class="text-3xl font-bold">No Submissions Yet</h1>
            </div>
        @endforelse
    </div>
    <div class="pagination col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 xl:col-span-4 ">
        {{ $submissions->links() }}
    </div> --}}
    {{-- video section  --}}
    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3  ">
        @forelse ($submissions as $submission)
            <x-video-card :submission="$submission" />
        @empty
            <div class="w-full text-center text-gray-500 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 h-[80vh] flex justify-center items-center">
                <h1 class="text-3xl font-bold">No Submissions Yet</h1>
            </div>
        @endforelse

        <div class="pagination col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3  ">
            {{ $submissions->links() }}
        </div>
    </section>

</x-public-layout>
