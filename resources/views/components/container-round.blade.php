<div {{ $attributes->merge(['class' => '']) }}>
    <div class=" h-full w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ $slot }}
        </div>
    </div>
</div>
