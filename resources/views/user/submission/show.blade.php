    <x-app-layout>
    <x-container-round>
        {{-- back button --}}
        <span class="inline-block">
            <a href="{{ route('dashboard') }}"
                class="flex text-gray-600 hover:text-gray-900 hover:bg-gray-200 shadow rounded-xl px-2">
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
                    <video class=" h-full w-auto  object-cover object-center " controls >
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
            <div class="sm:w-1/3 w-full">
                {{-- details --}}
                <div class="flex flex-col gap-2">
                    <h1 class="text-3xl font-bold">{{ $submission->title }}</h1>
                    <div class="flex gap-2">
                        <span class="text-xs text-gray-600">{{ $submission->updated_at->diffForHumans() }}</span>
                    </div>
                    {{-- link --}}
                    <div class="flex gap-2 items-center ">
                        <span id="url" class="select-all">
                            {{ route('submission.show', $submission) }}
                        </span>
                        <button id="copy-btn" class="font-bold text-white px-4 py-2 rounded-lg"
                            onclick="copyToClipboard()">
                            {{-- link svg --}}
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                            </svg>
                        </button>
                    </div>

                    <p class="text-gray-500 ">{{ $submission->description }}</p>
                </div>
                {{-- comments --}}
                {{-- <div class="flex flex-col gap-2 mt-4">
                    <h1 class="text-2xl font-bold">Comments</h1>
                    <div class="flex flex-col gap-2">
                        @forelse ($submission->comments as $comment)
                            <div class="flex flex-col gap-1">
                                <div class="flex gap-2">
                                    <span class="text-xs text-gray-600">{{ $comment->user->name }}</span>
                                    <span class="text-xs text-gray-600">{{ $comment->updated_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-500 text-sm">{{ $comment->comment }}</p>
                            </div>
                        @empty
                        <p class="text-gray-500 text-sm">No comments yet</p>
                        @endforelse
                        <p class="text-gray-500 text-sm">No comments yet</p>
                    </div> --}}
                {{-- comment form --}}
                {{-- <form action="" method="post" class="flex flex-col gap-2">
                        @csrf
                        <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                        <textarea name="comment" id="comment" cols="30" rows="3"
                            class="border border-gray-300 rounded-lg p-2"></textarea>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Comment</button>
                    </form>
                </div> --}}

            </div>

        </section>
    </x-container-round>
    <script>
        //copy to clipboard
        function copyToClipboard() {
            //svg
            var checkClip =
                '<svg fill="green" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM305 273L177 401c-9.4 9.4-24.6 9.4-33.9 0L79 337c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L271 239c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>';
            var clip =
                '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>';

            /* Get the text field */
            var copyText = document.getElementById("url");

            //copy using navigator
            navigator.clipboard.writeText(copyText.innerText);
            //button svg change
            var button = document.getElementById("copy-btn");
            console.log(button.innerHTML);
            button.innerHTML = checkClip;
            setTimeout(() => {
                button.innerHTML = clip;
            }, 2000);


        }
    </script>
</x-app-layout>
