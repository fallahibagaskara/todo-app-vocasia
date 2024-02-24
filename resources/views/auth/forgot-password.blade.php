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

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <p style="font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 10px ">Lupa Password</p>
                    </div>

                    <div>
                        <p style="color:#737373; font-size: 14px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:400; text-align: center; margin-bottom: 40px">Masukan email yang telah terdaftar, <br>
                            kami akan mengirim link untuk mengembalikan akunmu</p>
                    </div>

                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" style="font-size: 18px; font-weight: 700; margin-bottom: 12px" />
                        <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-center mt-8">
                        <x-button style=" margin-top: 20px; width: 100%; height: 50px; font-size: 18px; font-weight: 700; background-color: #BA181B" class="flex items-center justify-center">
                            {{ __('LANJUT') }}
                        </x-button>
                    </div>

                </form>
            </x-authentication-card>
        </div>
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
