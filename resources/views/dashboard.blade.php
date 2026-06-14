<x-layout>
    <x-success-message />
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

