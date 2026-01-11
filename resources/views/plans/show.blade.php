<x-layout>
        <x-section header="Current Budget">
            <div class="flex justify-center items-center text-center flex-col">
                <div class="bg-white rounded drop-shadow-xs w-fit p-4">
                    <h1
                        class="text-6xl text-green-500 font-bold"
                        id="budget"
                        data-target="{{ $plan->budget }}">
                        $0
                    </h1>
                </div>
            </div>
        </x-section>
        <x-section header="Recent Activities"></x-section>
    <div class="min-h-screen bg-gray-100"></div>
    <script src="{{ asset('js/budgetCounter.js') }}"></script>
</x-layout>
