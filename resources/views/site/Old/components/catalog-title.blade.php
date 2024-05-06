<div class="w-full shadow-over overflow-hidden shadow-lg">
    <img class="w-full" src="{{ asset('u/banners/' . $image) ?? '' }}" alt="{{ $title ?? '' }}">
    <div class="px-6 py-4">
        <h1 class="text-blue font-bold bg-white text-lg">
            {{ $title ?? '' }}
        </h1>
    </div>
</div>
