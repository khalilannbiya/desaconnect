<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informasi Profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Perbarui informasi profil') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-secondary-button>
            @endif

            <x-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nama') }}" />
            <x-input id="name" type="text" class="mt-2 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-2 block w-full" wire:model.defer="state.email"
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
            $this->user->hasVerifiedEmail())
            <p class="text-sm mt-2">
                {{ __('Your email address is unverified.') }}

                <button type="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
            @endif
            @endif
        </div>

        <!-- NIK -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nik" value="{{ __('NIK') }}" />
            <x-input id="nik" type="text" class="mt-2 block w-full" wire:model.defer="state.nik" autocomplete="nik" />
            <x-input-error for="nik" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Nomor Telpon') }}" />
            <x-input id="phone" type="text" class="mt-2 block w-full" wire:model.defer="state.phone"
                autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Alamat') }}" />
            <textarea name="address" id="address"
                class="mt-2 block w-full rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent shadow-sm"
                cols="30" rows="10" wire:model.defer="state.address" autocomplete="address"></textarea>
            <x-input-error for="address" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>