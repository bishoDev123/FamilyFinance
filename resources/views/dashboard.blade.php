<x-layout>
    <x-section header="Your Finance plans">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($plans as $plan)
                <x-plan-card :plan="$plan"/>
            @endforeach
        </div>
    </x-section>
    <x-section header="Recent activities">
        <li>withdrawl: 900 EGP</li>
        <li>withdrawl: 950 EGP</li>
        <li>deposit: 1000 EGP</li>
    </x-section>
</x-layout>

