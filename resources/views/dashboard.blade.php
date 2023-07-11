<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            @if (auth()->user()->isAdmin)
                (Admin)
            @elseif (auth()->user()->isTeacher)
                (teacher)
            @endif

            <span>
                @if (session('status') === 'submission-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-600">{{ __('Updated successfully') }}</p>
                @endif
                @if ($errors->has('status'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-red-600">{{ $errors->get('status')[0] }}</p>
                @endif
            </span>
        </h2>
    </x-slot>
    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($submission as $item)
        <x-video-card :item="$item" />

        @endforeach
    </div>
    <div class="pagination">

                {{ $submission->links() }}
        </div>
</x-app-layout>
