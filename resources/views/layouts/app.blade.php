<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>وظائف غزة</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <style>
        * {
            font-family: cairo;
            scroll-behavior: smooth;
        }

    </style>
</head>
<body dir="rtl" class="bg-gray-200">
<header class="bg-blue-900">
    <nav class="container text-white mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
        <div class="flex flex-col lg:flex-row items-center">
            <a class="flex" href="{{route('jobs')}}">
                <svg id="bold" class="text-white fill-current w-8 h-8" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="m15 6.5c-.552 0-1-.448-1-1v-1.5h-4v1.5c0 .552-.448 1-1 1s-1-.448-1-1v-1.5c0-1.103.897-2 2-2h4c1.103 0 2 .897 2 2v1.5c0 .552-.448 1-1 1z"></path>
                    <path
                            d="m12.71 15.38c-.18.07-.44.12-.71.12s-.53-.05-.77-.14l-11.23-3.74v7.63c0 1.52 1.23 2.75 2.75 2.75h18.5c1.52 0 2.75-1.23 2.75-2.75v-7.63z"></path>
                    <path
                            d="m24 7.75v2.29l-11.76 3.92c-.08.03-.16.04-.24.04s-.16-.01-.24-.04l-11.76-3.92v-2.29c0-1.52 1.23-2.75 2.75-2.75h18.5c1.52 0 2.75 1.23 2.75 2.75z"></path>
                </svg>
                <span class="font-semibold text-xl mr-2">وظائف غزة</span>
            </a>
            <ul class="flex mr-0 lg:mr-16 mt-6 lg:mt-0 font-light space-x-8">
                <li><a href="{{route('jobs')}}"
                       class="ml-8 hover:text-yellow-300 {{ (request()->is('/')) ? 'text-yellow-300 font-semibold' : '' }}">الوظائف</a>
                </li>
                <li><a href="{{route('trains')}}"
                       class="hover:text-yellow-300 {{ (request()->is('trainings')) ? 'text-yellow-300 font-semibold' : '' }}">التدريب</a>
                </li>
                <li><a href="{{route('employers')}}"
                       class="hover:text-yellow-300 {{ (request()->is('employers')) ? 'text-yellow-300 font-semibold' : '' }}">أصحاب
                        العمل</a></li>
                <li><a href="{{route('jobSeekers')}}"
                       class="hover:text-yellow-300 {{ (request()->is('jobSeekers')) ? 'text-yellow-300 font-semibold' : '' }}">الباحثين
                        عن عمل</a></li>
                <li><a href="{{route('contact-us')}}"
                       class="hover:text-yellow-300 {{ (request()->is('contact-us')) ? 'text-yellow-300 font-semibold' : '' }}">تواصل
                        معنا</a></li>
            </ul>
        </div>

        {{-- Start Inbox --}}
        {{--            <a href="" class="relative ml-4 p-1 rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">--}}
        {{--                <span class="sr-only">View notifications</span>--}}
        {{--                <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-red-400 z-2"></div>--}}
        {{--                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
        {{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>--}}
        {{--                </svg>--}}
        {{--            </a>--}}
        {{-- End Inbox --}}
        <div class="flex items-center mt-6 lg:mt-0">
            @if(auth()->guard('employer')->check())
                <div class=" flex justify-center cursor-pointer">
                    <div>
                        <details class="relative inline-block text-left cursor-pointer"
                                 x-data="{ isVisible: true }" @click.away="isVisible = false"
                        >

                            <summary class="bg-blue-900 flex justify-center items-center ">
                                <span class="ml-2 font-semibold text-sm">{{auth()->guard('employer')->user()->name}}</span>
                                <img class="h-8 w-8 rounded-full"
                                     @if(!empty(auth()->guard('employer')->user()->information->avatar))
                                     src="{{auth()->guard('employer')->user()->information->avatar}}"
                                     @else
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     @endif
                                     alt="">
                            </summary>

                            <div role="menu"
                                 class="z-40 origin-top-right text-center absolute  mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">

                                <div class="py-1" role="none">
                                    <a href="{{route('employer.profile.index')}}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">الملف
                                        الشخصي</a>

                                    <a href="{{route('job.index')}}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        الوظائف </a>
                                    <a href="{{route('training.index')}}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        التدريبات </a>
                                    <a href="{{route('employer.logout')}}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">تسجيل
                                        الخروج</a>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
                {{--Start Profile dropdown --}}
                {{--                <div class="ml-3 relative">--}}
                {{--                    <div>--}}
                {{--                        <button class="items-center flex text-sm rounded-full focus:outline-none focus:ring-2--}}
                {{--                            focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"--}}
                {{--                                id="user-menu" aria-haspopup="true" aria-expanded="true" >--}}
                {{--                            <span class="sr-only">Open user menu</span>--}}
                {{--                            <span class="ml-2 font-semibold text-sm">{{auth()->guard('employer')->user()->name}}</span>--}}
                {{--                            <img class="h-8 w-8 rounded-full"--}}
                {{--                                 @if(!empty(auth()->guard('employer')->user()->information->avatar))--}}
                {{--                                 src="{{auth()->guard('employer')->user()->information->avatar}}"--}}
                {{--                                 @else--}}
                {{--                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"--}}
                {{--                                 @endif--}}
                {{--                                 alt="">--}}
                {{--                        </button>--}}
                {{--                    </div>--}}
                {{--                    <!----}}
                {{--                      Profile dropdown panel, show/hide based on dropdown state.--}}

                {{--                      Entering: "transition ease-out duration-100"--}}
                {{--                        From: "transform opacity-0 scale-95"--}}
                {{--                        To: "transform opacity-100 scale-100"--}}
                {{--                      Leaving: "transition ease-in duration-75"--}}
                {{--                        From: "transform opacity-100 scale-100"--}}
                {{--                        To: "transform opacity-0 scale-95"--}}
                {{--                    -->--}}
                {{--                    <div--}}
                {{--                        class=" origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"--}}
                {{--                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu">--}}
                {{--                        <a href="{{route('employer.profile.index')}}"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">الملف--}}
                {{--                            الشخصي</a>--}}

                {{--                        <a href="{{route('job.index')}}"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">--}}
                {{--                            الوظائف </a>--}}
                {{--                        <a href="{{route('training.index')}}"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">--}}
                {{--                            التدريبات </a>--}}
                {{--                        <a href="{{route('employer.logout')}}"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">تسجيل--}}
                {{--                            الخروج</a>--}}
                {{--                    </div>--}}


                {{--                </div>--}}
            @elseif(auth()->guard('jobSeeker')->check())
                <div class=" flex justify-center  ">
                    <div>
                        <details class="relative inline-block text-left cursor-pointer"
                                 x-data="{ isVisible: true }" @click.away="isVisible = false"
                        >

                            <summary class="bg-blue-900 flex justify-center items-center ">
                                <span class="ml-2 font-semibold text-sm">{{auth()->guard('jobSeeker')->user()->name}}</span>
                                <img class="h-8 w-8 rounded-full"
                                     @if(!empty(auth()->guard('jobSeeker')->user()->information->avatar))
                                     src="{{auth()->guard('jobSeeker')->user()->information->avatar}}"
                                     @else
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     @endif
                                     alt="">
                            </summary>

                            <div role="menu"
                                 class="origin-top-right text-center absolute z-40 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">

                                <div class="py-1" role="none">
                                    <a href="{{route('jobSeeker.profile.index')}}" role="menuitem" tabindex="-1"
                                       id="menu-item-1" --}}
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">الملف
                                        الشخصي</a>
                                    <a href="{{route('teams.index')}}" role="menuitem" tabindex="-1" id="menu-item-4"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                       role="menuitem">
                                        الفرق</a>
                                    <a href="{{route('jobSeeker.application.job.index')}}" role="menuitem" tabindex="-1"
                                       id="menu-item-2"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                       role="menuitem">
                                        طلبات الوظائف
                                    </a>
                                    <a href="{{route('jobSeeker.application.training.index')}}" role="menuitem"
                                       tabindex="-1" id="menu-item-3"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                       role="menuitem">
                                        طلبات التدريب </a>
                                    <a href="{{route('jobSeeker.inquire.job.index')}}" role="menuitem"
                                       tabindex="-1" id="menu-item-3"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                       role="menuitem">
                                        استفسارات الوظائف </a>
                                    <a href="{{route('jobSeeker.inquire.training.index')}}" role="menuitem"
                                       tabindex="-1" id="menu-item-3"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                       role="menuitem">
                                        استفسارات التدريب </a>
                                    <a href="{{route('jobSeeker.logout')}}" role="menuitem" tabindex="-1"
                                       id="menu-item-5"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">تسجيل
                                        الخروج</a>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
                {{--            End Profile dropdown--}}
                {{--                <div class="ml-3 relative">--}}
                {{--                    <div>--}}
                {{--                        <button open x-data x-ref="dropdown" @click.away="$refs.dropdown.removeAttribute('open');"--}}
                {{--                                class="items-center flex text-sm rounded-full focus:outline-none focus:ring-2--}}
                {{--                            focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"--}}
                {{--                            id="menu-button" aria-expanded="true" aria-haspopup="true"--}}
                {{--                        >--}}
                {{--                            <span class="sr-only">Open user menu</span>--}}
                {{--                            <span class="ml-2 font-semibold text-sm">{{auth()->guard('jobSeeker')->user()->name}}</span>--}}
                {{--                            <img class="h-8 w-8 rounded-full"--}}
                {{--                                 @if(!empty(auth()->guard('jobSeeker')->user()->information->avatar))--}}
                {{--                                 src="{{auth()->guard('jobSeeker')->user()->information->avatar}}"--}}
                {{--                                 @else--}}
                {{--                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"--}}
                {{--                                 @endif--}}
                {{--                                 alt="">--}}
                {{--                        </button>--}}
                {{--                    </div>--}}
                {{--                    <div role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">--}}
                {{--                    <div role="none"--}}
                {{--                        class="dropdown-menu origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"--}}
                {{--                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu">--}}
                {{--                        <a href="{{route('jobSeeker.profile.index')}}" role="menuitem" tabindex="-1" id="menu-item-1"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">الملف--}}
                {{--                            الشخصي</a>--}}
                {{--                        <a href="{{route('jobSeeker.application.job.index')}}" role="menuitem" tabindex="-1" id="menu-item-2"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"--}}
                {{--                           role="menuitem">--}}
                {{--                            طلبات الوظائف--}}
                {{--                        </a>--}}
                {{--                        <a href="{{route('jobSeeker.application.training.index')}}" role="menuitem" tabindex="-1" id="menu-item-3"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"--}}
                {{--                           role="menuitem">--}}
                {{--                            طلبات التدريب </a>--}}
                {{--                        <a href="{{route('teams.index')}}" role="menuitem" tabindex="-1" id="menu-item-4"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"--}}
                {{--                           role="menuitem">--}}
                {{--                            الفرق</a>--}}
                {{--                        <a href="{{route('jobSeeker.logout')}}" role="menuitem" tabindex="-1" id="menu-item-5"--}}
                {{--                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">تسجيل--}}
                {{--                            الخروج</a>--}}
                {{--                    </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            @else

                {{--            Start Login & Register--}}
                <a href="{{route('jobSeeker.login_form')}}"
                   class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 ml-2 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">
                    تسجيل دخول الباحثين عن عمل
                </a>
                <a href="{{route('employer.login_form')}}"
                   class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">
                    تسجيل دخول أصحاب العمل
                </a>
                {{--            End Login & Register--}}
            @endif
        </div>
    </nav>
</header>

@if(auth()->guard('jobSeeker')->check() && auth()->guard('jobSeeker')->user()->verified == 0)
    @if(auth()->guard('jobSeeker')->check() && auth()->guard('jobSeeker')->user()->verify()->exists())
        <div class="flex items-center pr-16 bg-yellow-100 border-t border-b border-yellow-500 text-green-700 px-4 py-3"
             role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2  fill-current" viewBox="0 0 32 32">
                <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M14.5,23.5v-1.09003c0-0.83002,0.66998-1.5,1.5-1.5s1.5,0.66998,1.5,1.5V23.5c0,0.82996-0.66998,1.5-1.5,1.5S14.5,24.32996,14.5,23.5z M17.5,18.03998c0,0.82001-0.66998,1.5-1.5,1.5s-1.5-0.67999-1.5-1.5V8.5C14.5,7.66998,15.16998,7,16,7s1.5,0.66998,1.5,1.5V18.03998z">
                </path>
            </svg>
            <p class="text-sm font-bold">لقد تم ارسال طلب التوثيق, سيتم مراجعته في غضون الايام المقبلة</p></div>
    @else
        <div class="flex items-center pr-16 bg-yellow-100 border-t border-b border-yellow-500 text-red-700 px-4 py-3"
             role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2  fill-current" viewBox="0 0 32 32">
                <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M14.5,23.5v-1.09003c0-0.83002,0.66998-1.5,1.5-1.5s1.5,0.66998,1.5,1.5V23.5c0,0.82996-0.66998,1.5-1.5,1.5S14.5,24.32996,14.5,23.5z M17.5,18.03998c0,0.82001-0.66998,1.5-1.5,1.5s-1.5-0.67999-1.5-1.5V8.5C14.5,7.66998,15.16998,7,16,7s1.5,0.66998,1.5,1.5V18.03998z">
                </path>
            </svg>
            <p class="text-sm font-bold">حتى تتمكن من التقدم للوظائف والتدريب الرجاء <a
                        href="{{route('jobSeeker.verify.create')}}" class="underline"> توثيق حسابك</a></p>
        </div>
    @endif
@endif

@if(auth()->guard('employer')->check() && auth()->guard('employer')->user()->verified == 0)
    @if(auth()->guard('employer')->check() && auth()->guard('employer')->user()->verify()->exists())
        <div class="flex items-center pr-16 bg-yellow-100 border-t border-b border-yellow-500 text-green-700 px-4 py-3"
             role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2  fill-current" viewBox="0 0 32 32">
                <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M14.5,23.5v-1.09003c0-0.83002,0.66998-1.5,1.5-1.5s1.5,0.66998,1.5,1.5V23.5c0,0.82996-0.66998,1.5-1.5,1.5S14.5,24.32996,14.5,23.5z M17.5,18.03998c0,0.82001-0.66998,1.5-1.5,1.5s-1.5-0.67999-1.5-1.5V8.5C14.5,7.66998,15.16998,7,16,7s1.5,0.66998,1.5,1.5V18.03998z">
                </path>
            </svg>
            <p class="text-sm font-bold">لقد تم ارسال طلب التوثيق, سيتم مراجعته في غضون الايام المقبلة</p></div>
        </div>
    @else
        <div class="flex items-center pr-16 bg-yellow-100 border-t border-b border-yellow-500 text-red-700 px-4 py-3"
             role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2  fill-current" viewBox="0 0 32 32">
                <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M14.5,23.5v-1.09003c0-0.83002,0.66998-1.5,1.5-1.5s1.5,0.66998,1.5,1.5V23.5c0,0.82996-0.66998,1.5-1.5,1.5S14.5,24.32996,14.5,23.5z M17.5,18.03998c0,0.82001-0.66998,1.5-1.5,1.5s-1.5-0.67999-1.5-1.5V8.5C14.5,7.66998,15.16998,7,16,7s1.5,0.66998,1.5,1.5V18.03998z">
                </path>
            </svg>
            <p class="text-sm font-bold">حتى تتمكن من نشر الوظائف والتدريب الرجاء <a
                        href="{{route('employer.verify.create')}}" class="underline"> توثيق حسابك</a></p>
        </div>
    @endif
@endif

<main class="py-6">
    <div class="container mx-auto px-4">

        @yield('content')

    </div>
</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js'></script>
<script type="module" src="./script.js"></script>
<script src="{{asset('js/component01.js')}}"></script>
</body>
</html>


