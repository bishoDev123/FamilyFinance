<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            {{--Logo--}}
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"
                 class="mx-auto h-10 w-auto"/>
            <x-auth.heading>Create a new account</x-auth.heading>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">

                @csrf

                <x-auth.form-field label="Name" name="name" type="text" :value="old('name')"/>

                <x-auth.form-field label="Email" name="email" type="email" :value="old('email')"/>

                <x-auth.form-field label="Password" name="password" type="password" />

                <x-auth.form-field label="Confirm Password" name="confirm_password" type="password" />

                <x-auth.button>Create account</x-auth.button>

            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already have an account?
                <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a>
            </p>
        </div>
    </div>
</x-layout>
