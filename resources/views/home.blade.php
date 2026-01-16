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
            @guest()
            <div class="flex justify-center space-x-5">
                <x-button href="/register">Register Now</x-button>
                <x-button href="/login">Login</x-button>
            </div>
            @endguest
        </div>

    </div>
    <div class="mt-10 mx-15 p-2 flex justify-between items-center mb-10 rounded-md shadow-2xl">
        <div class="ml-30">
            <h3 class="font-bold text-4xl text-orange-600 mb-4">Plan Your Paycheck</h3>
            <p class="text-sm max-w-lg font-bold">Don't wait for the kids to tell you that they took out money without you knowing, just for you to find out that your money for the month ran out</p>
        </div>
        <div>
            <img src="{{ asset('images/paycheck.jpg') }}" alt="Paycheck" class="w-xl rounded-sm shadow-2xl">
        </div>
    </div>
</x-layout>
