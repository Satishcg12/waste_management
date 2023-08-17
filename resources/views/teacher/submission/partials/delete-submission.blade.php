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

    <x-delete-btn :href="route('teacher.submission.destroy', [ 'submission' => $submission->id ])" class="my-4" />
</section>
