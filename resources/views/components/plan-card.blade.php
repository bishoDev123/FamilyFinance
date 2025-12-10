@props(['image' => 'https://placehold.co/600x400', 'title' => 'Plan title'])

<div class="bg-neutral-primary-soft block max-w-xs border border-default rounded-lg shadow-xs">
    <a href="#">
        <img class="rounded-t-base" src="{{ $image }}" alt=""/>
    </a>
    <div class="p-6 text-center">
        <a href="#">
            <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">{{ $title }}</h5>
        </a>
        <a href="#"
           class="inline-flex items-center shadow-sm font-medium bg-orange-400 hover:bg-orange-500 rounded-lg text-sm px-4 py-2.5">
            View details
        </a>
    </div>
</div>
