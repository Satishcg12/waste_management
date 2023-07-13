<x-public-layout>

    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

    @forelse ($submissions as $submission)
        <x-video-card :item="$submission" />
    @empty
        <div class="text-center text-gray-500">
            <h1 class="text-3xl font-bold">No Submissions Yet</h1>
            <p class="text-xl">Be the first to submit a video</p>
        </div>
    @endforelse
    </div>
    <div class="pagination">
        {{ $submissions->links() }}
    </div>

</x-public-layout>
