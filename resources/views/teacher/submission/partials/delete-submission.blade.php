{{-- //delete button --}}

<section class="my-3">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Video/ Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('') }}
        </p>

    </header>

    <form method="post" action="{{ route('teacher.submission.destroy', [ 'submission' => $submission->id ]) }}" class="">
        @csrf
        @method('delete')

        <div class="flex items-center">
            <x-danger-button>{{ __('Delete') }}</x-danger-button>
        </div>
    </form>
</section>
