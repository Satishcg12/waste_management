
<div class="flex flex-wrap gap-5 items-center justify-around -mx-3 mb-6">
    <div class="h-44 aspect-video rounded-lg drop-shadow-lg p-4 flex flex-col justify-around bg-gradient-to-br from-gray-500 to-gray-600 text-white">
        <p class="text-3xl leading-tight ">
            {{ $user->name }}
        </p>
        <h2 class="font-semibold text-lg leading-tight">
            {{ __('Name') }}
        </h2>
    </div>
    <div class="h-44 aspect-video rounded-lg drop-shadow-lg p-4 flex flex-col justify-around bg-gradient-to-br from-gray-500 to-gray-600 text-white">
        <p class="text-3xl leading-tight">
            {{ $user->grade->name }}
        </p>
        <h2 class="font-semibold text-lg leading-tight">
            {{ __('Grade') }}
        </h2>
    </div>
    <div class="h-44 aspect-video rounded-lg drop-shadow-lg p-4 flex flex-col justify-around bg-gradient-to-br from-gray-500 to-gray-600 text-white overflow-hidden">
        <p class="text-3xl leading-tight ">
            {{ $user->email }}
        </p>
        <h2 class="font-semibold text-lg leading-tight">
            {{ __('Email') }}
        </h2>
    </div>
    <div class="h-44 aspect-video rounded-lg drop-shadow-lg p-4 flex flex-col justify-around bg-gradient-to-br from-gray-500 to-gray-600 text-white">
        <p class="text-3xl leading-tight">
            @php
                $number_of_uploads = ["Zero","One", "Two", "Three", "Four", "Five"];
                echo $number_of_uploads[$user->upload_count];
            @endphp
        </p>
        <h2 class="font-semibold text-lg leading-tight">
            {{ __('Uploads') }}
        </h2>
    </div>
</div>
