<div
    class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
    <div class="flex flex-wrap items-center">
        <div class="block w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
            <img src="{{$src}}" alt="Team member"
                class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
        </div>
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
            <div class="px-6 py-12 md:px-12">
                <h2 class="mb-2 text-3xl font-bold text-primary dark:text-primary-400">
                    {{ $name }}
                </h2>
                <p class="mb-4 font-semibold">{{ $role }}</p>
                <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                    {{ $slot }}
                </p>
            </div>
        </div>
    </div>
</div>
