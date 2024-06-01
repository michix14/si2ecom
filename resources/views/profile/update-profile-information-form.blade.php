<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informacion de Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza los datos personales de tu perfil') }}
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
                @if (Auth::user()->profile_photo_path)
                <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{Auth::user()->profile_photo_path }}"
                    alt="{{ Auth::user()->name }}" />
                @else
                <img class="h-8 w-8 rounded-full object-cover" src="{{Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                @endif
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
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo Electronico') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
            $this->user->hasVerifiedEmail())
            <p class="text-sm mt-2">
                {{ __('Tu correo no está verificado') }}

                <button type="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    wire:click.prevent="sendEmailVerification">
                    {{ __('Haz clic aquí para enviar verificación de correo') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('Un nuevo enlace de verificación fue enviado') }}
            </p>
            @endif
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="ci" value="{{ __('Cédula') }}" />
            <x-input id="ci" type="text" class="mt-1 block w-full" wire:model="state.ci" required />
            <x-input-error for="ci" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="telefono" value="{{ __('Teléfono') }}" />
            <x-input id="telefono" type="text" class="mt-1 block w-full" wire:model="state.telefono" required />
            <x-input-error for="telefono" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="direccion" value="{{ __('Dirección') }}" />
            <x-input id="direccion" type="text" class="mt-1 block w-full" wire:model="state.direccion" required />
            <x-input-error for="direccion" class="mt-2" />
        </div>

        {{-- <div class="col-span-6 sm:col-span-4">
            <x-label for="mapid" value="{{ __('Ubicación') }}" />
            <div id="mapid" style="height: 180px;"></div>
            <x-input id="latitud" type="hidden" class="mt-1 block w-full" wire:model="state.latitud" />
            <x-input id="longitud" type="hidden" class="mt-1 block w-full" wire:model="state.longitud" />
        </div>

        <script>
            var latitud = document.getElementById('latitud').value;
            var longitud = document.getElementById('longitud').value;
        
            // Si la latitud y la longitud son nulas, usar coordenadas predeterminadas
            if (!latitud || !longitud) {
                latitud = -17.783328;
                longitud = -63.2001641;
            }
        
            var mymap = L.map('mapid').setView([latitud, longitud], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(mymap);
        
            var marker = L.marker([latitud, longitud]).addTo(mymap);
        
            mymap.on('click', function(e) {
                mymap.removeLayer(marker);
        
                marker = L.marker(e.latlng).addTo(mymap);
        
                document.getElementById('latitud').value = e.latlng.lat;
                document.getElementById('longitud').value = e.latlng.lng;
            });
        </script> --}}

        <div class="col-span-6 sm:col-span-4">
            <x-label for="sexo" value="{{ __('Sexo') }}" />
            <select id="sexo" class="form-select mt-1 block w-full" wire:model="state.sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <x-input-error for="sexo" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>