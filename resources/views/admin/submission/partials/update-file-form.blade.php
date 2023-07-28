<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload Video/ Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.submission.update', $submission) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" placeholder="title here..." name="title" type="text" class="mt-1 block w-full" autocomplete="attachment-title" :value="old('title',$submission->title)" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea-input id="description" name="description" class="mt-1 block w-full" autocomplete="attachment-description" rows='4' required >{{ old('description', $submission->description) }}</x-textarea-input>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

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
