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

        {{ $slot }}

    </div>

</div>
