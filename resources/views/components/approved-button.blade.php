{{-- approve button component --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-green-500 border border-green-500 rounded-full hover:text-green-700']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
</button>
