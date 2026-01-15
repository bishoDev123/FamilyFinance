<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            {{--Logo--}}
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"
                 class="mx-auto h-10 w-auto"/>
            <x-auth.heading>Login to your account</x-auth.heading>
        </div>

        <x-auth.form method="POST">
            <x-auth.form-field label="Email" name="email" type="email" :value="old('email')"/>

            <x-auth.form-field label="Password" name="password" type="password"/>

            <x-auth.button>Login</x-auth.button>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Don't have an account?
                <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">register</a>
            </p>
        </x-auth.form>

    </div>
</x-layout>
