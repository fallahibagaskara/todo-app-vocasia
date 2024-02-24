<x-guest-layout>
    <div style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;" class="flex bg-gray-100 rs">
        <!-- Left side -->
        <div style="background-color: white !important; border-top-right-radius: 80px; /* border radius atas sisi kanan */
        border-bottom-right-radius: 80px;" class="flex flex-col items-center w-full sm:w-1/2 sm:justify-center rs2">

            <!-- Logo -->
            <div class="logo" style="width: 150px; height: 100px; margin-top: 10px; position: relative; display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset('images/Logo.png') }}" alt="{{ config('app.name') }}" style="max-width: 100%; max-height: 100%; object-fit: contain; position: absolute; top: 0; left: 0; right: 0; bottom: 0; margin: auto;">
            </div>

            <!-- Gambar -->
            <div class="gbr" style="width: 400px; height: 300px; position: relative; display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset('images/Img.png') }}" alt="{{ config('app.name') }}" style="max-width: 100%; max-height: 100%; object-fit: contain; position: absolute; top: 0; left: 0; right: 0; bottom: 0; margin: auto;">
            </div>

            <div>
                <p class="text1" style="padding: 10px 30px; color: #2B2E4A; font-size: 30px; font-weight:700"  >Atur Jadwalmu Jadi Produktif 👋 </p>
            </div>
            <div>
                <p class="text2" style="color:#737373; padding: 10px 40px; font-size: 15px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:400">Bantu kamu mengatur jadwal kegiatanmu sehari-hari dengan mudah. Jadikan harimu lebih produktif dengan menulis setiap kegiatanmu yang perlu diselesaikan</p>
            </div>
        </div>


        <!-- Right side -->
        <div class="w-full sm:w-1/2">

            <x-authentication-card>
                <x-slot name="logo">
                </x-slot>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <p style="font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 40px ">Daftar</p>
                    </div>

                    <div>
                        <x-label for="name" value="{{ __('Nama') }}" style="font-size: 18px; font-weight: 700; margin-bottom: 12px" />
                        <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" style="font-size: 18px; font-weight: 700; margin-bottom: 12px" />
                        <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" style="font-size: 18px; font-weight: 700; margin-bottom: 12px" />
                        <div class="relative">
                            <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                            <button id="togglePassword" type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 cursor-pointer" aria-label="Toggle password visibility">
                                <x-eye-login />
                            </button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Ulangi Password') }}" style="font-size: 18px; font-weight: 700; margin-bottom: 12px" />
                        <div class="relative">
                            <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <button id="togglePassword2" type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 cursor-pointer" aria-label="Toggle password visibility">
                                <x-eye-login />
                            </button>
                        </div>
                    </div>

                    <script>
                        // Function to toggle password visibility
                        function togglePasswordVisibility(inputId, buttonId) {
                            const passwordField = document.getElementById(inputId);
                            const button = document.getElementById(buttonId);

                            // Toggle password visibility
                            if (passwordField.type === 'password') {
                                passwordField.type = 'text';

                            } else {
                                passwordField.type = 'password';
                            }
                        }

                        // Event listener for the first password input
                        document.getElementById('togglePassword').addEventListener('click', function() {
                            togglePasswordVisibility('password', 'togglePassword');
                        });

                        // Event listener for the second password input
                        document.getElementById('togglePassword2').addEventListener('click', function() {
                            togglePasswordVisibility('password_confirmation', 'togglePassword2');
                        });
                    </script>

                    <style>
                        #togglePassword,
                        #togglePassword2 {
                            top: 50%;
                            left: 90%;
                            transform: translateY(-50%);
                        }
                    </style>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-center mt-8">
                        <x-button style="width: 100%; height: 50px; font-size: 18px; font-weight: 700; background-color: #BA181B" class="flex items-center justify-center">
                            {{ __('DAFTAR') }}
                        </x-button>
                    </div>
                    <div class="flex items-center justify-center mt-2">
                        <!-- Paragraf "Sudah punya akun?" -->
                        <div>
                            <p style="color:#737373; padding: 10px 30px; font-size: 18px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:400">Belum punya akun?
                                <a href="{{ route('login') }}">
                                    <span style="color: #BA181B; font-size: 18px; font-weight: 700">{{ __('Masuk') }}</span>
                                </a>
                            </p>
                        </div>
                    </div>

                    </div>
                </form>
            </x-authentication-card>
    </div>
</x-guest-layout>

<style>
    @media screen and (max-width: 640px) {
        .flex {
            flex-direction: column;
        }
        .gbr{
            width: 240px !important;
            height: 200px !important;
            max-width: 50%;
            max-height: 50%;
        }
        .logo {
            width: 120px !important;
            height: 100px !important;
            max-width: 50%;
            max-height: 50%;
        }
        .text1{
            font-size: 20px !important;
        }
        .text2{
            font-size: 12px !important;
        }
        .rs, .rs2{
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }
    }
</style>
