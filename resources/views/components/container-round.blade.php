<div {{ $attributes->merge(['class' => 'my-4 max-w-7xl mx-auto sm:px-6 lg:px-8']) }}>
    <div class=" h-full w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ $slot }}
        </div>
    </div>
</div>
