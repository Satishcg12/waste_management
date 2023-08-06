<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload Video/ Image') }}
        </h2>

            <p class="mt-1 text-sm text-gray-600 flex gap-2">
                <a href="{{ route('admin.user.edit',$submission->user->id) }}">
                    <span class="text-gray-500 font-extrabold hover:underline flex gap-1">
                        <svg class="fill-gray-500" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <span class="font-normal">

                            {{ $submission->user->name }}
                        </span>
                    </span>
                </a>
                <a href=" {{ route('admin.grade.edit', $submission->user->grade->id) }} ">
                    <span class="text-gray-500 font-extrabold hover:underline">Grade:
                        <span class="font-normal">
                            {{ $submission->user->grade->name }}
                        </span>
                    </span>

                </a>
                    {{ $submission->created_at->diffForHumans() }}

            </p>
    </header>

    <form method="post" action="{{ route('teacher.submission.update', ['submission' => $submission->id]) }}" class="mt-5 space-y-6" enctype="multipart/form-data">
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
        <div>
            <x-input-label for="description" :value="__('status')" />
            <select name="status" id="status" class="mt-1 block w-full">
                <option value="pending" {{ old('status', $submission->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status', $submission->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status', $submission->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'submission-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('submission-updated') }}</p>
            @endif
        </div>
    </form>
</section>
