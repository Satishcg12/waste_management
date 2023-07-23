<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('user.update', $user) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        {{-- grade --}}
        @if (auth()->user()->isAdmin)
            <div>
                <x-input-label for="grade" :value="__('Grade')" />
                <select id="grade" name="grade" class="block mt-1 w-full">
                    <option value="">Select a grade</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ old('grade', $user->grade_id) == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('grade')" />
            </div>
        @else
            <input type="hidden" name="grade" value="{{ auth()->user()->grade_id }}">
        @endif


        {{-- number of uploads --}}
        <div>
            <x-input-label for="uploads" :value="__('Number of uploads')" />
            <select name="todays_upload_number" id="uploads" class="mt-1 block w-full">
                @for ($i = 0; $i <=5; $i++)
                    <option value="{{ $i }}" {{ old('todays_upload_number', $user->todays_upload_number) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('uploads')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'user-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('Update Successful.') }}</p>
            @endif
            @if (session('status') === 'user-not-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-red-600"
                >{{ __('Something went wrong.') }}</p>
            @endif
        </div>
    </form>
</section>