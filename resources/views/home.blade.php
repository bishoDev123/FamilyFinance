<x-layout>
    <div class="w-full h-[80vh] flex justify-center items-center bg-no-repeat bg-center bg-cover"
         style="
         background-image:
          linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),
          url('{{ asset('images/homebackground.jpg') }}');
          background-size: cover">

        <div class="flex flex-col text-center">
            <h1 class="font-bold text-white text-4xl">Manage Your Paycheck</h1>
            <p class="text-white mt-2 mb-6">Tired of your paycheck running out without knowing what was spent, well no more!</p>
            <div class="flex justify-center space-x-5">
                <x-button href="/register">Register Now</x-button>
                <x-button href="/login">Login</x-button>
            </div>
        </div>

    </div>
</x-layout>
