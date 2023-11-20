<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="Masukkan Nama Lengkap" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autocomplete="username" placeholder="Masukkan Alamat Email" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('No. Telepon') }}" />
                <x-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required
                    autofocus autocomplete="phone" placeholder="Masukkan Nomer Telepon" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Alamat Lengkap') }}" />
                <textarea name="address" id="address" cols="30" rows="10" autocomplete="address"
                    class="block w-full mt-1 transition duration-500 ease-in-out border-gray-300 rounded shadow-sm ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent focus:border-indigo-500"
                    placeholder="Masukan Alamat Lengkap" value="{{ old('address') }}" required autofocus autocomplete="
                    address"></textarea>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>