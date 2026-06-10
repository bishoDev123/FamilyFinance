
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


        {{-- Menu + Add Transaction button --}}
        <div class="flex justify-end gap-2">

            <button
                onclick="openModal('transactionModal')"
                class="rounded-lg border border-orange-600 text-orange-600 px-3 py-1 font-bold hover:text-white hover:bg-orange-600 transition duration-200 cursor-pointer">
                + Add Transaction
            </button>

            <x-menu :model="$plan"></x-menu>

        </div>

    </x-section>

<div class=""></div>

    <x-section header="Recent Activities">
        <ul>
            @if($plan->transactions->isNotEmpty())
                @foreach($plan->transactions->take(3) as $transaction)
                    <li>{{ $transaction->description }}:
                        @if($transaction->type == 'deposit')
                            +<span class="text-green-500">{{$transaction->amount}}$</span>
                        @else
                            -<span class="text-red-500">{{$transaction->amount}}$</span>
                        @endif</li>
                @endforeach
                @if($plan->transactions->count() > 3)
                    <li class="mt-4">
                        <a href="{{route('plans.transactions.index', $plan)}}" class="text-blue-500 font-bold text-xl">[View All Transactions]</a>
                    </li>
                @endif
            @else
                <div>No transactions have been made yet</div>
            @endif
        </ul>
    </x-section>



    {{-- TRANSACTION MODAL --}}
    <div
        id="transactionModal"
        class="fixed inset-0 bg-black/50 flex justify-center items-center z-50
        opacity-0 pointer-events-none transition-opacity duration-300"
    >

        <div id='modalContent' class="bg-white shadow-md rounded px-8 pt-6 pb-8 relative w-full max-w-md
        transform scale-95 transition-transform duration-300">

            {{-- Close button --}}
            <button
                onclick="closeModal('transactionModal')"
                class="absolute top-2 right-3 text-gray-500 hover:text-black text-xl cursor-pointer">
                ×
            </button>


            <h1 class="text-2xl font-bold mb-4 text-center">
                Add Transaction
            </h1>

    <x-transaction.form
        :action="route('plans.transactions.store', $plan)"
        button-text="Add"
    />


        </div>

    </div>
{{-- End of Transaction Modal--}}


    <div class="min-h-screen bg-gray-100"></div>

    <script src="{{ asset('js/budgetCounter.js') }}"></script>


    {{-- Modal Script --}}
    <script src="{{ asset('js/modal.js') }}"></script>

    @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
               openModal('transactionModal');
            });
        </script>
    @endif


</x-layout>
