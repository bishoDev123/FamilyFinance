@props(['image' => 'https://placehold.co/600x400', 'plan', 'ownedIds', 'memberIds'])

@php
    $url = route('plans.show', $plan);
    $owned = in_array($plan->id, $ownedIds);
    $member = in_array($plan->id, $memberIds);
@endphp

<a href="{{ $url }}"
   class="bg-neutral-primary-soft block max-w-xs border border-default rounded-lg shadow-xs hover:shadow-md transition">

    <img class="rounded-t-base" src="{{ $image }}" alt="{{ $plan->title }}"/>

    <div class="p-6 text-center">
        <h5 class="mt-3 mb-6 text-2xl font-semibold tracking-tight text-heading">
            {{ $plan->title }}
        </h5>

        @if($owned)
            <span
                class="inline-flex items-center shadow-sm font-medium bg-orange-400 hover:bg-orange-500 rounded-lg text-sm px-4 py-2.5">
            View details
        </span>
        @elseif($member)
            <span
                class="inline-flex items-center shadow-sm font-medium bg-cyan-400 hover:bg-cyan-500 rounded-lg text-sm px-4 py-2.5">
            View details
            </span>
        @endif
    </div>
</a>

