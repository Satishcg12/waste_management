@php
$parsedown = new Parsedown();
$content = file_get_contents(resource_path('docs/terms.md'));
$html = $parsedown->text($content);
@endphp

<body class="bg-gray-100">
<section class="container my-7 mx-auto max-w-3xl">
<div class="bg-white px-8">

    <x-markdown-document>
        {!! $html !!}
    </x-markdown-document>
</div>
</section>
</body>

