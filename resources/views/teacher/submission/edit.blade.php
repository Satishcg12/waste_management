<x-teacher-layout>
    <x-container-round>
        {{-- back button --}}
        <span class="inline-block">
            <a href="{{ route('teacher.dashboard') }}" class="flex text-gray-600 hover:text-gray-900 hover:bg-gray-200 shadow rounded-xl px-2">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M11 17l-5-5m0 0l5-5m-5 5h12">
                    </path>
                </svg>
                <span class="ml-2">Back</span>
            </a>
        </span>
        <section class="flex flex-col sm:flex-row gap-4 justify-evenly sm:h-[70vh] ">
            <div class="h-full w-auto flex justify-center items-center rounded-lg overflow-hidden bg-gray-100">

                @if ($submission->attachment_type == 'video')
                    <video class=" h-full w-auto  object-cover object-center " controls>
                        <source
                            src="{{ route('submission.getAttachment', ['folder' => $submission->folder, 'filename' => $submission->filename]) }}"
                            type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                @else
                    <img class=" h-full w-auto  object-cover object-center"
                        src="{{ route('submission.getAttachment', ['folder' => $submission->folder, 'filename' => $submission->filename]) }}"
                        alt="{{ $submission->title }}">
                @endif
            </div>
            <div class="sm:w-1/3 w-full overflow-auto">

                @include('teacher.submission.partials.update-file-form')

                @include('teacher.submission.partials.delete-submission')
            </div>

        </section>
    </x-container-round>
</x-teacher-layout>
