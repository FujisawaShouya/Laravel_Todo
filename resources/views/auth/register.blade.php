<x-guest-layout>
    <p class="text-4xl font-semibold py-5 pl-9">ToDo</p>
    <x-auth-card>
        <x-slot name="logo">
            <p class="text-2xl font-bold">会員登録</p>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <!-- <x-label for="name" :value="__('Name')" /> -->

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="名前" required autofocus  />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <!-- <x-label for="email" :value="__('Email')" /> -->

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <!-- <x-label for="password" :value="__('Password')" /> -->

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <!-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> -->

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                placeholder="確認用パスワード"
                                required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-button>
                    {{ __('会員登録') }}
                </x-button>
            </div>
            <p class="text-center mt-7 text-gray-400 font-semibold">アカウントをお持ちの方はこちらから</p>
            <a href="/login" class="block text-center text-blue-600 font-semibold">ログイン</a>
        </form>
    </x-auth-card>
    <p class="block text-center pt-1.5 font-semibold ">ToDo, inc</p>
</x-guest-layout>