<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add New Grade') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.grade.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Grade Name')" />
            <x-text-input id="name" placeholder="Grade Name here..." name="name" type="text" class="mt-1 block w-full" autocomplete="attachment-name"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Add Grade') }}</x-primary-button>

            @if (session('status') === 'success')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('Grade added successfully') }}</p>
            @endif
        </div>
    </form>
</section>
