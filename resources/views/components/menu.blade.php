@props(['model', 'isEdit' => false])

@php
    $modelName = Str::plural(Str::snake(class_basename($model)));
@endphp
<x-transaction.modal name="deleteModal">
    <form action="{{ route("$modelName.destroy", $model) }}" method="post">
        <input type="checkbox" id="confirmation" name="confirm">
        <label for="confirmation">
            @if($model->type == 'withdraw')
                Would you like to add the transaction amount to plan balance?
            @else
                Would you like to remove the transaction amount from plan balance?
            @endif
        </label>
    </form>
</x-transaction.modal>
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
<el-dropdown class="inline-block">
    <button
        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring-1 inset-ring-gray-300 hover:bg-gray-50">
        Options
        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
             class="-mr-1 size-5 text-gray-400">
            <path
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" fill-rule="evenodd"/>
        </svg>
    </button>

    <el-menu anchor="bottom end" popover
             class="w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
        <div class="py-1">
            @if($isEdit)
                <button onclick="openModal('transactionModal')"
                        class="block w-full text-left cursor-pointer px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">
                    Edit
                </button>
            @else
                <a href="{{ route("$modelName.edit", $model) }}"
                   class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Edit</a>
            @endif
        </div>
        <div class="py-1">
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Archive</a>
        </div>
        <div class="py-1">
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Share</a>
        </div>
        <div class="py-1">

            @if($modelName == 'plans')
                <form action="{{ route("$modelName.destroy", $model) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button
                        class="block w-full text-left px-4 py-2 text-sm text-red-500 focus:bg-gray-100 focus:outline-none cursor-pointer"
                        onclick="return confirm('Are you sure you want to delete this?')">
                        Delete
                    </button>
                </form>
            @else


                {{--Make a normal delete button but make the button open a modal--}}
                <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-red-500 focus:bg-gray-100 focus:outline-none cursor-pointer"
                            onclick="openModal('deleteModal')">
                        Delete
                </button>
                {{--Make the modal be the confirmation, and add a checkbox--}}
                {{--Change the text of the modal depending on the type of transaction--}}
                {{--Use the value of the checkbox to do appropriate changes in the controller--}}
            @endif
        </div>
    </el-menu>
</el-dropdown>
