<x-layout>
    @if(session('success'))
        <div
            id="flash-message"
            class="mb-4 overflow-hidden rounded bg-green-100 px-4 py-2 text-green-800"
            style="transition:
            height 300ms ease,
            opacity 300ms ease,
            margin 300ms ease,
            padding 300ms ease;"
        >
            {{ session('success') }}
        </div>
    @endif
    <x-section header="Your Finance plans">
        <div class="flex">
            <a class="rounded-lg border border-black text-black ml-auto mb-6 px-2 py-1 font-bold hover:text-white hover:bg-black hover:border-white transition duration-200" href="{{ route('plans.create') }}">+ Create</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($plans as $plan)
                <x-plan-card :plan="$plan" :owned-ids="$ownedIds" :member-ids="$memberIds"/>
            @endforeach
        </div>
    </x-section>
    <x-section header="Recent activities">
        <li>withdrawl: 900 EGP</li>
        <li>withdrawl: 950 EGP</li>
        <li>deposit: 1000 EGP</li>
    </x-section>
        <script src="{{ asset('js/flashSuccess.js') }}"></script>
</x-layout>

