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
                onclick="openModal()"
                class="rounded-lg border border-orange-600 text-orange-600 px-3 py-1 font-bold hover:text-white hover:bg-orange-600 transition duration-200 cursor-pointer">
                + Add Transaction
            </button>

            <x-menu :plan="$plan"></x-menu>

        </div>

    </x-section>

<div class=""></div>

    <x-section header="Recent Activities">
        <ul>
        @foreach($plan->transactions as $transaction)
                <li>{{ $transaction->description }}:
                    @if($transaction->type == 'deposit')
                        +<span class="text-green-500">{{$transaction->amount}}$</span>
                    @else
                        -<span class="text-red-500">{{$transaction->amount}}$</span>
                    @endif</li>
        @endforeach
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
                onclick="closeModal()"
                class="absolute top-2 right-3 text-gray-500 hover:text-black text-xl cursor-pointer">
                ×
            </button>


            <h1 class="text-2xl font-bold mb-4 text-center">
                Add Transaction
            </h1>


            <form method="POST"
                  action="{{ route('transaction', $plan) }}">

                @csrf


                {{-- Description --}}
                <x-form.input
                    name="description"
                    label="Description"
                    placeholder="Bought groceries"
                    :value="old('description')"
                />


                {{-- Amount --}}
                <x-form.input
                    name="amount"
                    label="Amount"
                    type="number"
                    step="1"
                    placeholder="500"
                    :value="old('amount')"
                />


                {{-- Type --}}
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Type
                    </label>

                    <select name="type"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700">

                        <option value="deposit">Deposit</option>
                        <option value="withdraw">Withdraw</option>

                    </select>

                </div>



                <div class="flex justify-center gap-3">

                    <button
                        type="button"
                        onclick="closeModal()"
                        class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                        Add
                    </button>

                </div>


                @if ($errors->any())
                    <div class="bg-red-100 border border-red-500 text-red-800 p-3 rounded mt-4">
                        {{ $errors->first() }}
                    </div>
                @endif


            </form>

        </div>

    </div>



    <div class="min-h-screen bg-gray-100"></div>

    <script src="{{ asset('js/budgetCounter.js') }}"></script>


    {{-- Modal Script --}}
    <script>
        const modal = document.getElementById('transactionModal');
        const modalContent = document.getElementById('modalContent');

        const noOpacity = 'opacity-0';
        const noInteraction = 'pointer-events-none';

        const closedSize = 'scale-95';
        const openedSize = 'scale-100';

        function openModal() {
            modal.classList.remove(noOpacity, noInteraction);

            modalContent.classList.remove(closedSize);
            modalContent.classList.add(openedSize)
        }

        function closeModal() {
            modal.classList.add(noOpacity, noInteraction);

            modalContent.classList.remove(openedSize);
            modalContent.classList.add(closedSize);
        }

        // reopen if validation fails
        @if ($errors->any())
        openModal();
        @endif

    </script>


</x-layout>
