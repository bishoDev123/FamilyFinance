<x-layout>
    <div class="flex flex-col justify-center items-center mt-30">
        <h1 class="text-4xl font-bold mb-4">Create a new budget plan</h1>
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <x-form.input name="title" label="Title" placeholder="plans for august" />
                <x-form.textarea name="description" label="Description" placeholder="Plans starting from august 23rd" />
                <x-form.input name="Budget" label="Starting budget" placeholder="100000" />

                <div class="flex items-center justify-center">
                    <button class="bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Create Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
