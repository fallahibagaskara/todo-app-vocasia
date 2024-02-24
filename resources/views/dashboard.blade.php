<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

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
            class="h-screen px-3 overflow-x-hidden transition-transform duration-300 ease-in-out border-r-2 border-gray-200 bg-gray-50 md:block w-30 md:w-60 lg:w-60"
            x-show="sidenav" @click.away="sidenav = false">
            <div class="mt-10 space-y-6 md:space-y-10">
                <div id="logo" class="space-y-3">
                    <img src="{{ asset('images/vocasia.png') }}" alt="Vocasia Logo" class="w-full px-4 mx-auto" />
                </div>
                <div id="menu" class="flex flex-col space-y-2">
                    <a href=""
                        class="px-2 py-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:bg-gray-800 hover:text-white hover:text-base">
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
                    <a href=""
                        class="px-2 py-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:bg-gray-800 hover:text-white hover:scale-105">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 22 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="11" fill="#DBA7A9" />
                            <path
                                d="M6.71429 14.5114H15.2857C15.6786 14.5114 16 14.8463 16 15.2557C16 15.6651 15.6786 16 15.2857 16H6.71429C6.32143 16 6 15.6651 6 15.2557C6 14.8463 6.32143 14.5114 6.71429 14.5114ZM10.2929 12.9483C10.0243 13.2245 9.66165 13.3788 9.28424 13.3774C8.90683 13.376 8.54529 13.2191 8.27857 12.9408L6.71429 11.3108C6.32143 10.9014 6.32857 10.2389 6.73571 9.84444C7.12143 9.45739 7.73571 9.47227 8.10714 9.85932L9.28571 11.0875L13.8786 6.30145C14.2643 5.89952 14.8857 5.89952 15.2714 6.30145L15.3 6.33122C15.6857 6.73316 15.6857 7.38816 15.2929 7.7901L10.2929 12.9483Z"
                                fill="#BA181B" />
                        </svg>
                        <span class="ml-2">Done</span>
                    </a>
                    <a href=""
                        class="px-2 py-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:bg-gray-800 hover:text-white hover:scale-105">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 18 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="7" y="1" width="4" height="18" fill="#BA181B" />
                            <path
                                d="M16 2H11.82C11.4 0.84 10.3 0 9 0C7.7 0 6.6 0.84 6.18 2H2C0.9 2 0 2.9 0 4V18C0 19.1 0.9 20 2 20H16C17.1 20 18 19.1 18 18V4C18 2.9 17.1 2 16 2ZM9 13C8.45 13 8 12.55 8 12V5C8 4.45 8.45 4 9 4C9.55 4 10 4.45 10 5V12C10 12.55 9.55 13 9 13ZM10 16C10 16.55 9.55 17 9 17C8.45 17 8 16.55 8 16C8 15.45 8.45 15 9 15C9.55 15 10 15.45 10 16Z"
                                fill="#DBA7A9" />
                        </svg>
                        <span class="ml-2">Overdue</span>
                    </a>



                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="px-2 py-2 text-sm font-medium text-gray-100 transition duration-150 ease-in-out rounded-md hover:text-gray-100 hover:scale-105" type="button">
                    {{-- CEK LAGI ICONNYA --}}
                    <div class="flex items-center">
                        <svg class="inline-block w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 27 27"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4966 5.90625H5.90625V21.0938H13.5" stroke="#BA181B" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.2969 17.2969L21.0938 13.5L17.2969 9.70312" stroke="#BA181B" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.125 13.4966H21.0937" stroke="#BA181B" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p style="margin-left: 13px" > Logout </p>
                    </div>
                    <!-- Logout Modal -->
                </button>
                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 text-center md:p-5">
                                <p style="font-size: 23px ; font-weight: 700 ; margin-bottom: 20px ;color:#BA181B">
                                    Keluar
                                </p>
                                <h3 class="mb-5" style="font-size: 17px ; font-weight: 400; margin-bottom: 50px ; ">Apakah Anda yakin ingin keluar?</h3>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                <button data-modal-hide="popup-modal" type="button" class=" mr-8 py-2.5 px-5 ms-3 text-sm font-medium text-red-700 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Batalkan
                                </button>
                                <button data-modal-hide="popup-modal" class="text-white ml-8 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
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
                <div class="grid items-center grid-cols-3">

                    <div class="max-w-lg mx-auto my-10 bg-white">
                        <div class="flex items-center justify-between">
                            <img class="w-16 h-16 mx-auto rounded-full" src="https://picsum.photos/200"
                                alt="Profile picture">
                            <div class="ml-4">
                                <h2 class="text-lg font-bold text-left">{{ Auth::user()->name }}</h2>
                                <p class="text-left text-gray-500">Ayo lebih produktif 👋 </p>
                            </div>
                        </div>
                    </div>

                    <!-- Col 1 Sidebar -->
                    <div class="grid grid-cols-3 col-span-2">
                        <div class="flex flex-col items-center justify-center h-20 w-36">
                            <div class="h-20 bg-center bg-cover rounded-md w-36"
                                style="background-image: url('{{ asset('images/todo-bg.png') }}')">
                                <div class="flex items-center justify-center h-full p-6 w-36">
                                    <span class="mr-2 text-6xl font-medium text-white">3</span>
                                    <span class="text-sm font-medium text-white">To Do Task</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center h-20 w-36">
                            <div class="h-20 bg-center bg-cover rounded-md w-36"
                                style="background-image: url('{{ asset('images/done-bg.png') }}')">
                                <div class="flex items-center justify-center h-full p-6 w-36">
                                    <span class="mr-2 text-6xl font-medium text-white">2</span>
                                    <span class="text-sm font-medium text-white">Done Task</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center h-20 w-36">
                            <div class="h-20 bg-center bg-cover rounded-md w-36"
                                style="background-image: url('{{ asset('images/overdue-bg.png') }}')">
                                <div class="flex items-center justify-center h-full p-6 w-36">
                                    <span class="mr-2 text-6xl font-medium text-white">7</span>
                                    <span class="text-sm font-medium text-white">Overdue Task</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
                    <!-- Col 2 Todo -->
                <div class="grid grid-cols-3">
                <div id="todo" class="relative col-span-2 m-10 overflow-x-auto border">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                        <div class="flex items-center justify-between border-b">
                            <div class="flex m-4">
                                <h1 class="font-semibold">
                                    To Do Today
                                </h1>
                            </div>
                            <div class="flex m-4">
                                <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class="text-red-700 font-semibold bg-red-100 hover:bg-red-200 focus:ring-4 focus:outline-none focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                    + Tambah
                                </button>
                            </div>
                        </div>
                        <tbody>
                            <tr class="bg-white hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-3" type="checkbox"
                                            class="w-4 h-4 text-gray-600 bg-white border-2 border-gray-400 rounded focus:ring-red-500-800-800 focus:ring-2">
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <h5 class="mb-1 text-sm font-bold tracking-tight text-gray-900">Mengerjakan mini
                                        project
                                        vocasia</h5>
                                    <p class="mb-2 text-xs font-normal text-gray-700">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing elit quis consequat wuediu liania...</p>
                                    <div class="flex justify-start">
                                        <p class="mr-2 text-xs font-bold text-red-500">09:30 AM</p>
                                        <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="#737373" />
                                        </svg>
                                        <p class="ml-2 text-xs font-normal text-gray-700">Selasa, 5 Maret 2022</p>
                                    </div>
                                </th>
                                <td class="flex items-center px-6 py-9">
                                    <a href="#" class="font-medium hover:underline">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.474 5.40807L18.592 7.52507L16.474 5.40807ZM17.836 3.54307L12.109 9.27007C11.8131 9.56557 11.6113 9.94205 11.529 10.3521L11 13.0001L13.648 12.4701C14.058 12.3881 14.434 12.1871 14.73 11.8911L20.457 6.16407C20.6291 5.99197 20.7656 5.78766 20.8588 5.56281C20.9519 5.33795 20.9998 5.09695 20.9998 4.85357C20.9998 4.61019 20.9519 4.36919 20.8588 4.14433C20.7656 3.91948 20.6291 3.71517 20.457 3.54307C20.2849 3.37097 20.0806 3.23446 19.8557 3.14132C19.6309 3.04818 19.3899 3.00024 19.1465 3.00024C18.9031 3.00024 18.6621 3.04818 18.4373 3.14132C18.2124 3.23446 18.0081 3.37097 17.836 3.54307V3.54307Z"
                                                stroke="#737373" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19 15V18C19 18.5304 18.7893 19.0391 18.4142 19.4142C18.0391 19.7893 17.5304 20 17 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V7C4 6.46957 4.21071 5.96086 4.58579 5.58579C4.96086 5.21071 5.46957 5 6 5H9"
                                                stroke="#737373" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="#" class="font-medium hover:underline ms-3">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z"
                                                fill="#737373" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-3" type="checkbox"
                                            class="w-4 h-4 text-gray-600 bg-white border-2 border-gray-400 rounded focus:ring-red-500-800-800 focus:ring-2">
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <h5 class="mb-1 text-sm font-bold tracking-tight text-gray-900">Mengerjakan mini
                                        project
                                        vocasia</h5>
                                    <p class="mb-2 text-xs font-normal text-gray-700">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing elit quis consequat wuediu liania...</p>
                                    <div class="flex justify-start">
                                        <p class="mr-2 text-xs font-bold text-red-500">09:30 AM</p>
                                        <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="#737373" />
                                        </svg>
                                        <p class="ml-2 text-xs font-normal text-gray-700">Selasa, 5 Maret 2022</p>
                                    </div>
                                </th>
                                <td class="flex items-center px-6 py-9">
                                    <a href="#" class="font-medium hover:underline">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.474 5.40807L18.592 7.52507L16.474 5.40807ZM17.836 3.54307L12.109 9.27007C11.8131 9.56557 11.6113 9.94205 11.529 10.3521L11 13.0001L13.648 12.4701C14.058 12.3881 14.434 12.1871 14.73 11.8911L20.457 6.16407C20.6291 5.99197 20.7656 5.78766 20.8588 5.56281C20.9519 5.33795 20.9998 5.09695 20.9998 4.85357C20.9998 4.61019 20.9519 4.36919 20.8588 4.14433C20.7656 3.91948 20.6291 3.71517 20.457 3.54307C20.2849 3.37097 20.0806 3.23446 19.8557 3.14132C19.6309 3.04818 19.3899 3.00024 19.1465 3.00024C18.9031 3.00024 18.6621 3.04818 18.4373 3.14132C18.2124 3.23446 18.0081 3.37097 17.836 3.54307V3.54307Z"
                                                stroke="#737373" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19 15V18C19 18.5304 18.7893 19.0391 18.4142 19.4142C18.0391 19.7893 17.5304 20 17 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V7C4 6.46957 4.21071 5.96086 4.58579 5.58579C4.96086 5.21071 5.46957 5 6 5H9"
                                                stroke="#737373" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="#" class="font-medium hover:underline ms-3">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z"
                                                fill="#737373" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Col 3 Clock Animation -->
                <div id="clock_date" class="col-span-1">
                    <div>
                        <p class="text2" style="color:#2B2E4A; text-align: center ; padding: 10px 40px; font-size: 20px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:700">Jam dan Tanggal Hari ini</p>
                    </div>
                    <div class="flex items-center justify-center">
                        <iframe
                        src="https://free.timeanddate.com/clock/i9969c3o/n450/szw110/szh110/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd94/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee"
                        frameborder="0" width="110" height="110"></iframe>
                        <div id="custom-clock" style="color: #2B2E4A; font-size: 25px; margin-left:10px"></div>

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

                        {{-- <div>
                            <iframe src="https://free.timeanddate.com/clock/i9969d9p/n450/tlid38/th2/ts1" frameborder="0"
                            width="60" height="18"></iframe>
                        </div> --}}
                    </div>
                    <div inline-datepicker data-date="@php echo date("m/d/Y") @endphp"></div>
                </div>
            </div>


            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Task
                            </h3>
                            <button type="button"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="col-span-2">
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Task</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Judul Task" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="comment"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar
                                        Task</label>
                                    <textarea name="comment" id="comment" rows="4"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Komentar Task" required=""></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="clock"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam
                                        Task</label>
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input name="clock_hour" id="clock_hour" type="number"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="00">
                                        </div>
                                        <span class="mx-4 text-gray-500">:</span>
                                        <div class="relative">
                                            <input name="clock_minute" id="clock_minute" type="number"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="00">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label for="date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Task</label>
                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide type="text" name="date"
                                            id="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Tambahkan
                                </button>
                        </form>
                    </div>
                </div>
            </div>


    </div>

    </main>

    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</body>

</html>
