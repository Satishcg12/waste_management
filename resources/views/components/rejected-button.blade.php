{{-- rejected button component --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-red-500 border border-red-500 rounded-full hover:text-red-700']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
