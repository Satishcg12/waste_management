

<div class="p-8 bg-white mt-24">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
            <div>
                <p class="font-bold text-gray-700 text-xl">{{ $user->totalNumberOfSubmissions() }}</p>
                <p class="text-gray-400">Uploads</p>
            </div>
            <div>
                <p class="font-bold text-gray-700 text-xl">{{ $user->numberOfVideos() }}</p>
                <p class="text-gray-400">Videos</p>
            </div>
            <div>
                <p class="font-bold text-gray-700 text-xl">{{ $user->numberOfImages() }}</p>
                <p class="text-gray-400">Photo</p>
            </div>
        </div>
        <div class="relative">
            <div class="group w-48 h-48 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center"
                style="background-color: {{ '#' . str_pad(dechex(ord($user->name[1])), 6, '1234567', STR_PAD_LEFT) }}">
                <span class="group-hover:aspi text-6xl font-semibold invert">
                    {{ $user->name[0] }}
                </span>
            </div>
        </div>
        <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
            <button onclick="window.location.href='{{ route('submission.create') }}'"
                class="text-white py-2 px-4 uppercase rounded bg-orange-400 hover:bg-orange-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                Upload
            </button>
            <a href="#change-password"
                class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5 grid place-content-center ">
                Change Password
            </a>

        </div>
    </div>
    <div class="mt-20 text-center">
        <h1 class="text-4xl font-medium text-gray-700">{{ $user->name }}</h1>
        <p class="font-light text-gray-600 mt-3 select-text">{{ '@' . $user->username }}</p>
        <p class="mt-8 text-gray-500">{{ $user->email }} - {{ $user->phone }}</p>
        <p class="mt-2 text-gray-500">{{ $user->grade->name }}</p>
    </div>
</div>

<span id="change-password"></span>
