<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <span>

                <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
                    Welcome {{ auth()->user()->name }}
                </h2>
                <p>
                    {{-- if search --}}
                    @if (request()->query('search'))
                        <span class="text-gray-500 text-sm">Search results for "{{ request()->query('search') }}"</span>
                    @endif
                </p>
            </span>
            <span>
                {{-- filter --}}
                <form action="{{ route('dashboard') }}" method="GET">
                    {{-- status --}}
                    <select name="status" id="status" class="rounded-lg border border-gray-300 px-4 py-2" onchange="this.form.submit()">
                        <option value="" {{ request()->query('status') == '' ? 'selected' : '' }}>-- Select Status
                            --</option>
                        <option value="pending" {{ request()->query('status') == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="approved" {{ request()->query('status') == 'approved' ? 'selected' : '' }}>
                            Approved</option>
                        <option value="rejected" {{ request()->query('status') == 'rejected' ? 'selected' : '' }}>
                            Rejected</option>
                    </select>
                </form>
            </span>
        </div>
    </x-slot>

    <section class="mt-4 grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3  ">
        @forelse ($submission as $item)
            <x-user-video-card :submission="$item" />

        @empty
            <div
                class="w-full text-center text-gray-500 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 h-[80vh] flex justify-center items-center">
                <h1 class="text-3xl font-bold">No Submissions Yet</h1>
            </div>
        @endforelse
        <div class="pagination col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3  mb-5">

            {{ $submission->links() }}
        </div>
    </section>
</x-app-layout>
