@props([
    'action',
    'method' => null,
    'transaction' => null,
    'buttonText' => 'Save',
])


<form method="POST"
      action="{{ $action }}">

    @csrf
    @isset($method)
        @method($method)
    @endisset

    {{-- Description --}}
    <x-form.input
        name="description"
        label="Description"
        placeholder="Bought groceries"
        :value="$transaction?->description ?? old('description')"
    />


    {{-- Amount --}}
    <x-form.input
        name="amount"
        label="Amount"
        type="number"
        step="1"
        placeholder="500"
        :value="$transaction?->amount ?? old('amount')"
    />


    {{-- Type --}}
    <div class="mb-4">

        <label class="block text-gray-700 text-sm font-bold mb-2">
            Type
        </label>

        <select name="type" class="shadow border rounded w-full py-2 px-3">
            <option
                value="deposit"
                @selected(($transaction?->type ?? old('type')) == 'deposit')>
                Deposit
            </option>

            <option
                value="withdraw"
                @selected(($transaction?->type ?? old('type')) == 'withdraw')>
                Withdraw
            </option>
        </select>

    </div>



    <div class="flex justify-center gap-3">

        <button
            type="button"
            onclick="closeModal('transactionModal')"
            class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Cancel
        </button>


        <button
            type="submit"
            class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
            {{ $buttonText }}
        </button>

    </div>


    @if ($errors->any())
        <div class="bg-red-100 border border-red-500 text-red-800 p-3 rounded mt-4">
            {{ $errors->first() }}
        </div>
    @endif


</form>
