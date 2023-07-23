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


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="attachment"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement);

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
