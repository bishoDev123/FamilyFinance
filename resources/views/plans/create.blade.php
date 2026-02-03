<x-layout>
    <div class="flex flex-col justify-center items-center mt-30">
        <h1 class="text-4xl font-bold mb-4">Create a new budget plan</h1>
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="/plans">
                @csrf
                <x-form.input name="title" label="Title" placeholder="plans for august" :value="old('title')"/>
                <x-form.textarea name="description" label="Description" placeholder="Plans starting from august 23rd"
                                 :value="old('description')"/>

                <x-form.input name="budget" label="Starting budget" placeholder="100000" type="number"
                              :value="old('budget')"/>

                <div class="flex items-center justify-center">
                    <button
                        class="bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create Plan
                    </button>
                </div>
                @if (session('error'))
                    <div
                        class="bg-red-100 border border-red-500 text-red-800 p-4 mb-4 rounded mt-4">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-layout>
