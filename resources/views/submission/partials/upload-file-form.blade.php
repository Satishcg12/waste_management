<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload Video/ Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('') }}
        </p>
    </header>

    <form method="post" action="{{ route('submission.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" placeholder="title here..." name="title" type="text" class="mt-1 block w-full" autocomplete="attachment-title"  />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea-input id="description" name="description" class="mt-1 block w-full" autocomplete="attachment-description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="attachment" :value="__('Attachment')" />
            <x-text-input id="attachment" name="attachment" type="file" class="mt-1 block w-full border p-2"/>
            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>

            @if (session('status') === 'file-uploaded')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('File uploaded successfully') }}</p>
            @endif
        </div>
    </form>
</section>
