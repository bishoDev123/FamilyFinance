@props(['image' => 'https://placehold.co/600x400', 'plan'])

@php
    $url = route('plans.show', $plan->id);
@endphp

<a href="{{ $url }}"
   class="bg-neutral-primary-soft block max-w-xs border border-default rounded-lg shadow-xs hover:shadow-md transition">

    <img class="rounded-t-base" src="{{ $image }}" alt="" />

    <div class="p-6 text-center">
        <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">
            {{ $plan->title }}
        </h5>

        @if(auth()->user()->ownedPlans->contains($plan))
            <span
                class="inline-flex items-center shadow-sm font-medium bg-orange-400 hover:bg-orange-500 rounded-lg text-sm px-4 py-2.5">
            View details
        </span>
        @elseif(auth()->user()->memberPlans->contains($plan))
            <span
                class="inline-flex items-center shadow-sm font-medium bg-cyan-400 hover:bg-cyan-500 rounded-lg text-sm px-4 py-2.5">
            View details
        @endif
        </span>
    </div>
</a>

