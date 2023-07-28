<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>
    <div class="py-12">

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
                }),
                allowImageCrop: true,
                imageCropAspectRatio: '16:9',
                allowImageEdit: true,

            };


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="attachment"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, filePondOptions);

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

</x-app-layout>
