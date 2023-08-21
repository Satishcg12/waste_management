<x-admin-layout>

    <x-slot name="header">
        Editer
    </x-slot>
    <textarea id="markdown-editor"></textarea>
    @push('scripts')
        <script>
            var simplemde = new SimpleMDE({
                element: document.getElementById("markdown-editor"),
            });
        </script>
    @endpush
</x-admin-layout>
