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
                class="rounded-lg border border-green-600 text-green-600 px-3 py-1 font-bold hover:text-white hover:bg-green-600 transition duration-200">
                + Add Transaction
            </button>

            <x-menu :plan="$plan"></x-menu>

        </div>

    </x-section>



    <x-section header="Recent Activities">
        {{-- transactions list goes here later --}}
    </x-section>



    {{-- TRANSACTION MODAL --}}
    <div
        id="transactionModal"
        class="fixed inset-0 bg-black/50 flex justify-center items-center z-50 hidden"
    >

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 relative w-full max-w-md">

            {{-- Close button --}}
            <button
                onclick="closeModal()"
                class="absolute top-2 right-3 text-gray-500 hover:text-black text-xl">
                ×
            </button>


            <h1 class="text-2xl font-bold mb-4 text-center">
                Add Transaction
            </h1>


            <form method="POST"
                  action="#">

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
                    step="0.01"
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
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
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

        function openModal()
        {
            document.getElementById('transactionModal').classList.remove('hidden');
        }

        function closeModal()
        {
            document.getElementById('transactionModal').classList.add('hidden');
        }

        // reopen if validation fails
        @if ($errors->any())
        openModal();
        @endif

    </script>


</x-layout>
