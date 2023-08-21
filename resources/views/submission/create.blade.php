<x-app-layout>


    @if (auth()->user()->hasExceededSubmissionLimit())
        <x-container-round>
            <div class="text-center">
                <h1 class="text-2xl font-bold text-red-500">You have exceeded the submission limit</h1>
                <p class="text-gray-500">You can only submit 5 times within 24 hours</p>
            </div>
        </x-container-round>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload') }}
            </h2>
        </x-slot>
        <div class="py-5">

            <x-container-round>
                @include('submission.partials.upload-file-form')
            </x-container-round>
        </div>
        @section('script')
            <script>
                // Register the plugin
                FilePond.registerPlugin(FilePondPluginImagePreview);
                FilePond.registerPlugin(FilePondPluginFileValidateType);
                FilePond.registerPlugin(FilePondPluginImageCrop);
                FilePond.registerPlugin(FilePondPluginImageEdit)

                const acceptedFileTypes = ['image/*', 'video/*'];
                const maxImageSize = 10 * 1024 * 1024; // 10 MB
                const maxVideoSize = 500 * 1024 * 1024; // 500 MB

                const filePondOptions = {
                    acceptedFileTypes: acceptedFileTypes,
                    labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
                    fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                        // Check if the file is an image or a video
                        const isImage = type.includes('image');
                        const isVideo = type.includes('video');
                        if (isImage || isVideo) {
                            resolve(type);
                        } else {
                            reject('Invalid file type. Only images and videos are allowed.');
                        }
                    }),
                    fileValidateSizeMax: (source, size) => new Promise((resolve, reject) => {
                        // Check the file size based on its type
                        const isImage = source.file.type.includes('image');
                        const isVideo = source.file.type.includes('video');
                        if (isImage && size <= maxImageSize) {
                            resolve();
                        } else if (isVideo && size <= maxVideoSize) {
                            resolve();
                        } else {
                            reject('File size exceeds the allowed limit.');
                        }
                    })
                };


                // Get a reference to the file input element
                const inputElement = document.querySelector('input[id="attachment"]');
                const uploadButton = document.getElementById('upload-button');
                // Create a FilePond instance
                const pond = FilePond.create(inputElement, filePondOptions);

                uploadButton.disabled = true;
                // Listen for init event
                pond.on('init', () => {
                    console.log('FilePond is ready to receive files!');
                });

                // Listen for initfile event
                pond.on('initfile', (file) => {
                    // loading animation
                    uploadButton.innerHTML = `<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0
                            0012 20c4.418 0 8-3.582 8-8h-2c0 3.314-2.686 6-6
                            6-3.314 0-6-2.686-6-6H6c0 2.21.895 4.209
                            2.344 5.657z">
                        </path>
                    </svg> Uploading...`;

                });

                // Listen for processfile event
                pond.on('processfile', (error, file) => {
                    // loading animation
                    uploadButton.innerHTML = `Upload`;
                    uploadButton.disabled = false;


                });

                // listen for error event
                pond.on('error', (error, file) => {
                    // loading animation
                    uploadButton.innerHTML = `Upload`;
                    uploadButton.disabled = true;


                });



                FilePond.setOptions({
                    server: {
                        process: '/temp-upload',
                        revert: '/temp-delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    },
                });
            </script>
        @endsection
    @endif
</x-app-layout>
