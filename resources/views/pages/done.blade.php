<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<!-- component -->

<body class="antialiased font-inter">
    <div id="view" class="flex flex-row w-screen h-full" x-data="{ sidenav: true }">
        <button @click="sidenav = true"
            class="absolute top-0 left-0 p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-md shadow-lg focus:bg-gray-800 focus:outline-none focus:text-white sm:hidden">
            <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div id="sidebar"
            class="px-3 overflow-x-hidden transition-transform duration-300 ease-in-out border-r-2 border-gray-200 bg-lightgray md:block w-30 md:w-60 lg:w-60"
            x-show="sidenav" @click.away="sidenav = false">
            <div class="mt-10 space-y-6 md:space-y-10">
                <div id="logo" class="space-y-3">
                    <img src="{{ asset('images/vocasia.png') }}" alt="Vocasia Logo" class="w-full px-4 mx-auto" />
                </div>
                <div id="menu" class="flex flex-col space-y-2">
                    <a href="{{ route('todo.index') }}"
                        class="px-2 py-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:border-primary hover:border-l-2 active:border-lightprimary active:border-l-2 hover:text-primary hover:scale-105">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 18 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_825_7045)">
                                <rect width="14.4643" height="8.86719" transform="matrix(-1 0 0 1 16.0714 9.25781)"
                                    fill="#BA181B" />
                                <path
                                    d="M18 18.125C18 19.1602 17.1362 20 16.0714 20H1.92857C0.86384 20 0 19.1602 0 18.125V7.5H18V18.125ZM5.14286 10.4688C5.14286 10.2109 4.92589 10 4.66071 10H3.05357C2.78839 10 2.57143 10.2109 2.57143 10.4688V12.0312C2.57143 12.2891 2.78839 12.5 3.05357 12.5H4.66071C4.92589 12.5 5.14286 12.2891 5.14286 12.0312V10.4688ZM5.14286 15.4688C5.14286 15.2109 4.92589 15 4.66071 15H3.05357C2.78839 15 2.57143 15.2109 2.57143 15.4688V17.0312C2.57143 17.2891 2.78839 17.5 3.05357 17.5H4.66071C4.92589 17.5 5.14286 17.2891 5.14286 17.0312V15.4688ZM10.2857 10.4688C10.2857 10.2109 10.0687 10 9.80357 10H8.19643C7.93125 10 7.71429 10.2109 7.71429 10.4688V12.0312C7.71429 12.2891 7.93125 12.5 8.19643 12.5H9.80357C10.0687 12.5 10.2857 12.2891 10.2857 12.0312V10.4688ZM10.2857 15.4688C10.2857 15.2109 10.0687 15 9.80357 15H8.19643C7.93125 15 7.71429 15.2109 7.71429 15.4688V17.0312C7.71429 17.2891 7.93125 17.5 8.19643 17.5H9.80357C10.0687 17.5 10.2857 17.2891 10.2857 17.0312V15.4688ZM15.4286 10.4688C15.4286 10.2109 15.2116 10 14.9464 10H13.3393C13.0741 10 12.8571 10.2109 12.8571 10.4688V12.0312C12.8571 12.2891 13.0741 12.5 13.3393 12.5H14.9464C15.2116 12.5 15.4286 12.2891 15.4286 12.0312V10.4688ZM15.4286 15.4688C15.4286 15.2109 15.2116 15 14.9464 15H13.3393C13.0741 15 12.8571 15.2109 12.8571 15.4688V17.0312C12.8571 17.2891 13.0741 17.5 13.3393 17.5H14.9464C15.2116 17.5 15.4286 17.2891 15.4286 17.0312V15.4688ZM1.92857 2.5H3.85714V0.625C3.85714 0.28125 4.14643 0 4.5 0H5.78571C6.13929 0 6.42857 0.28125 6.42857 0.625V2.5H11.5714V0.625C11.5714 0.28125 11.8607 0 12.2143 0H13.5C13.8536 0 14.1429 0.28125 14.1429 0.625V2.5H16.0714C17.1362 2.5 18 3.33984 18 4.375V6.25H0V4.375C0 3.33984 0.86384 2.5 1.92857 2.5Z"
                                    fill="#DBA7A9" />
                                <path
                                    d="M3.85714 2.5H1.92857C0.86384 2.5 0 3.33984 0 4.375V6.25H18V4.375C18 3.33984 17.1362 2.5 16.0714 2.5H14.1429V0.625C14.1429 0.28125 13.8536 0 13.5 0H12.2143C11.8607 0 11.5714 0.28125 11.5714 0.625V2.5H6.42857V0.625C6.42857 0.28125 6.13929 0 5.78571 0H4.5C4.14643 0 3.85714 0.28125 3.85714 0.625V2.5Z"
                                    fill="#BA181B" />
                            </g>
                            <defs>
                                <clipPath id="clip0_825_7045">
                                    <rect width="18" height="20" fill="white"
                                        transform="matrix(-1 0 0 1 18 0)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="ml-2">To Do</span>
                    </a>
                    <a href="{{ route('done.index') }}"
                        class="px-2 py-2 text-sm font-medium transition duration-150 ease-in-out hover:text-primary hover:text-base
                    {{ Route::is('done.index') ? 'text-black border-l-2 border-primary' : 'text-gray-500 hover:text-darkgray hover:border-primary' }}">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="11" fill="#DBA7A9" />
                            <path
                                d="M6.71429 14.5114H15.2857C15.6786 14.5114 16 14.8463 16 15.2557C16 15.6651 15.6786 16 15.2857 16H6.71429C6.32143 16 6 15.6651 6 15.2557C6 14.8463 6.32143 14.5114 6.71429 14.5114ZM10.2929 12.9483C10.0243 13.2245 9.66165 13.3788 9.28424 13.3774C8.90683 13.376 8.54529 13.2191 8.27857 12.9408L6.71429 11.3108C6.32143 10.9014 6.32857 10.2389 6.73571 9.84444C7.12143 9.45739 7.73571 9.47227 8.10714 9.85932L9.28571 11.0875L13.8786 6.30145C14.2643 5.89952 14.8857 5.89952 15.2714 6.30145L15.3 6.33122C15.6857 6.73316 15.6857 7.38816 15.2929 7.7901L10.2929 12.9483Z"
                                fill="#BA181B" />
                        </svg>
                        <span class="ml-2">Done</span>
                    </a>
                    <a href="{{ route('overdue.index') }}"
                        class="px-2 py-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:border-primary hover:border-l-2 active:border-primary active:border-l-2 hover:text-primary hover:scale-105">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 18 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="7" y="1" width="4" height="18" fill="#BA181B" />
                            <path
                                d="M16 2H11.82C11.4 0.84 10.3 0 9 0C7.7 0 6.6 0.84 6.18 2H2C0.9 2 0 2.9 0 4V18C0 19.1 0.9 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM9 13C8.45 13 8 12.55 8 12V5C8 4.45 8.45 4 9 4C9.55 4 10 4.45 10 5V12C10 12.55 9.55 13 9 13ZM10 16C10 16.55 9.55 17 9 17C8.45 17 8 16.55 8 16C8 15.45 8.45 15 9 15C9.55 15 10 15.45 10 16Z"
                                fill="#DBA7A9" />
                        </svg>
                        <span class="ml-2">Overdue</span>
                    </a>
                    <div class="fixed bottom-4">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="px-2 py-2 text-sm font-medium text-gray-100 transition duration-150 ease-in-out hover:scale-105 hover:border-primary hover:border-l-2 hover:text-primary hover:text-base"
                            type="button">
                            <div class="flex items-center">
                                <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 27 27"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.4966 5.90625H5.90625V21.0938H13.5" stroke="#BA181B" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.2969 17.2969L21.0938 13.5L17.2969 9.70312" stroke="#BA181B"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.125 13.4966H21.0937" stroke="#BA181B" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 text-primary hover:text-red-800"> Logout </p>
                            </div>
                            <!-- Logout Modal -->
                        </button>
                    </div>
                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <div class="relative bg-white rounded-lg shadow dark:bg-darkgray">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 text-center md:p-5">
                                    <p style="font-size: 23px ; font-weight: 700 ; margin-bottom: 20px ;color:#BA181B">
                                        Keluar
                                    </p>
                                    <h3 class="mb-5"
                                        style="font-size: 17px ; font-weight: 400; margin-bottom: 50px ; ">Apakah Anda
                                        yakin ingin keluar?</h3>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button data-modal-hide="popup-modal" type="button"
                                            class=" mr-8 py-2.5 px-5 ms-3 text-sm font-medium text-primary focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-darkgray dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-darkgray">
                                            Batalkan
                                        </button>
                                        <button data-modal-hide="popup-modal"
                                            class="text-white ml-8 bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                            href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Keluar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="w-full min-h-screen transition-all bg-white main">
            <div id="content" class="border-b">
                <div class="grid items-center grid-cols-2">
                    <div class="items-start ml-12 justify-self-start ">
                        <div class="max-w-lg mx-auto my-10 bg-white ">
                            <div class="flex items-center justify-between">
                                <img class="w-16 h-16 mx-auto rounded-full" src="https://picsum.photos/200"
                                    alt="Profile picture">
                                <div class="ml-4">
                                    <h2 class="text-lg font-bold text-left font-nunito text-darkblue">{{ Auth::user()->name }}
                                    </h2>
                                    <p class="font-sans text-left text-subheading">Ayo lebih produktif 👋 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grid justify-end grid-cols-3 col-span-1 gap-0">
                            <div class="flex flex-col items-center justify-center h-20 p-0 m-0 w-36">
                                <div class="h-20 bg-center bg-cover rounded-md w-36"
                                    style="background-image: url('{{ asset('images/todo-bg.png') }}')">
                                    <div class="flex items-center justify-center h-full p-6 w-36">
                                        <span class="mr-2 text-6xl font-medium text-white font-nunito">{{ $todoCount }}</span>
                                        <span class="font-sans text-sm font-medium text-white">To Do Task</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center h-20 p-0 m-0 w-36">
                                <div class="h-20 bg-center bg-cover rounded-md w-36"
                                    style="background-image: url('{{ asset('images/done-bg.png') }}')">
                                    <div class="flex items-center justify-center h-full p-6 w-36">
                                        <span class="mr-2 text-6xl font-medium text-white font-nunito">{{ $doneCount }}</span>
                                        <span class="font-sans text-sm font-medium text-white">Done Task</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center h-20 p-0 m-0 w-36">
                                <div class="h-20 bg-center bg-cover rounded-md w-36"
                                    style="background-image: url('{{ asset('images/overdue-bg.png') }}')">
                                    <div class="flex items-center justify-center h-full p-6 w-36">
                                        <span class="mr-2 text-6xl font-medium text-white font-nunito">{{ $overdueCount }}</span>
                                        <span class="font-sans text-sm font-medium text-white">Overdue Task</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div
                    class="relative flex items-center justify-between col-span-2 mx-10 mt-10 border border-t border-l border-r">
                    <div class="flex m-4">
                        <h1 class="font-bold font-nunito text-darkblue">
                            Done
                        </h1>
                    </div>
                </div>

                <div id="done" class="relative col-span-2 mx-10 overflow-y-auto border max-h-[550px]">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                        <tbody>
                            @foreach ($dones as $done)
                                <tr class="bg-white hover:bg-gray-50" id="index_{{ $done->id }}">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-{{ $done->id }}" type="checkbox"
                                                class="w-4 h-4 bg-white border-2 border-gray-400 rounded text-primary focus:ring-lightprimary-800-800 focus:ring-2 checkbox-todo"
                                                {{ $done->status === 'done' ? 'checked' : '' }}>
                                            <label for="checkbox-table-search-{{ $done->id }}"
                                                class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th class="px-6 py-4 font-medium text-gray-900">
                                        <h5
                                            class="mb-1 text-sm font-bold font-nunito tracking-tight text-gray-900 @if ($done->status === 'done') line-through @endif">
                                            {{ $done->title }}</h5>
                                        <div style="word-wrap: break-word; width: 550px">
                                            <p
                                                class="mb-2 font-sans text-xs font-normal text-darkgray @if ($done->status === 'done') line-through @endif">
                                                {{ $done->comment }}
                                            </p>
                                        </div>
                                        <div class="flex items-center justify-start">
                                            <p class="mr-2 font-sans text-xs font-bold text-lightprimary">
                                                {{ \Carbon\Carbon::parse($done->clock)->format('H:i A') }}
                                            </p>
                                            <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="#737373" />
                                            </svg>
                                            <p class="ml-2 font-sans text-xs font-normal text-subheading">{{ $done->date }}
                                            </p>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="clock_date"
                    class="relative col-span-1 pb-8 mb-6 mr-8 -mt-5 overflow-x-auto border -top-10 h-max">
                    <div class="flex items-center justify-between border-b">
                        <div class="flex m-4">
                            <h1 class="m-0.5 font-bold text-darkblue font-nunito">
                                Jam dan Tanggal Hari ini
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center justify-between px-12 m-4">
                        <iframe
                            src="https://free.timeanddate.com/clock/i9969c3o/n450/szw110/szh110/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd94/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee"
                            frameborder="0" width="110" height="110"></iframe>
                        <div id="custom-clock" class="font-nunito" style="color: #2B2E4A; font-size: 23px; margin-left:10px"></div>

                        <script>
                            function updateClock() {
                                var now = new Date();
                                var hours = now.getHours();
                                var minutes = now.getMinutes();
                                var amPm = hours >= 12 ? 'PM' : 'AM';

                                hours = hours % 12;
                                hours = hours ? hours : 12;
                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                var formattedTime = hours + ':' + minutes + ' ' + amPm;
                                document.getElementById('custom-clock').textContent = formattedTime;
                            }
                            setInterval(updateClock, 1000);
                            updateClock();
                        </script>
                    </div>
                    <div class="text-center">
                        <div inline-datepicker data-date="@php echo date("m/d/Y") @endphp"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    <!-- Todo -->
    <script src="{{ asset('js/todo.js') }}"></script>

</body>

</html>
