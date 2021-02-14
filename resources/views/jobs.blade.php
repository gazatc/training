<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <style>
        * {
            font-family: cairo
        }
    </style>
</head>
<body dir="rtl" class="bg-gray-200">
    <header class="bg-blue-900">
        <nav class="container text-white mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a class="flex" href="">
                    <svg id="bold" class="text-white fill-current w-8 h-8" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="m15 6.5c-.552 0-1-.448-1-1v-1.5h-4v1.5c0 .552-.448 1-1 1s-1-.448-1-1v-1.5c0-1.103.897-2 2-2h4c1.103 0 2 .897 2 2v1.5c0 .552-.448 1-1 1z"></path>
                        <path d="m12.71 15.38c-.18.07-.44.12-.71.12s-.53-.05-.77-.14l-11.23-3.74v7.63c0 1.52 1.23 2.75 2.75 2.75h18.5c1.52 0 2.75-1.23 2.75-2.75v-7.63z"></path>
                        <path d="m24 7.75v2.29l-11.76 3.92c-.08.03-.16.04-.24.04s-.16-.01-.24-.04l-11.76-3.92v-2.29c0-1.52 1.23-2.75 2.75-2.75h18.5c1.52 0 2.75 1.23 2.75 2.75z"></path>
                    </svg>
                    <span class="font-semibold text-xl mr-2">وظائف غزة</span>
                </a>
                <ul class="flex mr-0 lg:mr-16 mt-6 lg:mt-0 font-light">
                    <li><a href="#" class="ml-8 hover:text-yellow-300 text-yellow-300 font-semibold">الوظائف</a></li>
                    <li><a href="#" class="ml-8 hover:text-yellow-300">التدريب</a></li>
                    <li><a href="#" class="hover:text-yellow-300">الشركات</a></li>
                </ul>
            </div>

            <div class="flex items-center mt-6 lg:mt-0">
                {{-- Start Inbox --}}
                <a href="" class="relative ml-4 p-1 rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-red-400 z-2"></div>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </a>
                {{-- End Inbox --}}
                {{--Start Profile dropdown --}}
                <div class="ml-3 relative">
                    <div>
                        <button class="items-center flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <span class="ml-2 font-semibold text-sm">عبدالله شبلاق</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>
                    <!--
                      Profile dropdown panel, show/hide based on dropdown state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">الملف الشخصي</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">تسجيل الخروج</a>
                    </div>
                </div>
                {{--End Profile dropdown --}}

                {{--Start Login & Register --}}
                {{--<a href="#"--}}
                   {{--class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 ml-2 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">--}}
                    {{--تسجيل دخول--}}
                {{--</a>--}}
                {{--<a href="#"--}}
                   {{--class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">--}}
                    {{--دخول أصحاب العمل--}}
                {{--</a>--}}
                {{--End Login & Register --}}
            </div>
        </nav>
    </header>

    <main class="py-6">
        <div class="container mx-auto px-4">
            <div class="flex justify-center border border-blue-900 py-6 bg-blue-900 rounded-lg">
                <span class="text-yellow-300 text-2xl font-semibold">» الوظائف «</span>
            </div>

            <div class="flex flex-wrap mt-6">
                {{--Start Filter--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-1 bg-gray-100">البحث</h2>
                        <form action="" class="px-2 py-2">
                            <input class="border border-gray-300 w-full text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                   placeholder="إبحث عن وظيفة..."
                                   type="text">

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                النوع:
                            </h2>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center ml-4">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5 bg-red-500" checked><span class="mr-2 text-sm text-gray-700">دوام كامل</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">دوام جزئي</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">عن بعد</span>
                                </label>
                            </div>

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                المجال:
                            </h2>
                            <div class="flex flex-col">
                                <select class="border border-gray-300 w-full text-sm rounded-sm px-2 focus:outline-none focus:border-blue-900">
                                    <option class="text-gray-500" value="" selected>كل المجالات</option>
                                    <option value="">العلوم الانسانية</option>
                                    <option value="">التسويق والمبيعات</option>
                                    <option value="">العلاقات العامة والاتصال</option>
                                    <option value="">الصحافة والاعلام</option>
                                    <option value="">العمليات والدعم اللوجستي</option>
                                    <option value="">القانون والمحاماة</option>
                                    <option value="">تكنولوجيا المعلومات</option>
                                    <option value="">الفندقة والسياحة</option>
                                    <option value="">الطب والتمريض والصحة العامة</option>
                                    <option value="">تصميم وجرافيك</option>
                                    <option value="">اللغات والترجمة</option>
                                    <option value="">المحاسبة والعلوم المالية</option>
                                    <option value="">الهندسة</option>
                                    <option value="">التعليم والتدريب</option>
                                    <option value="">الثقافة والفنون</option>
                                    <option value="">الإدارة والأعمال</option>
                                    <option value="">مجالات متنوع</option>
                                </select>
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5" checked><span class="mr-2 text-sm text-gray-700">العلوم الانسانية</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">التسويق والمبيعات</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">العلاقات العامة والاتصال</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الصحافة والاعلام</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">العمليات والدعم اللوجستي</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">القانون والمحاماة</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">تكنولوجيا المعلومات</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الفندقة والسياحة</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الطب والتمريض والصحة العامة</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">تصميم وجرافيك</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">اللغات والترجمة</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">المحاسبة والعلوم المالية</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الهندسة</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">التعليم والتدريب</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الثقافة والفنون</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">الإدارة والأعمال</span>--}}
                                {{--</label>--}}
                                {{--<label class="inline-flex items-center">--}}
                                    {{--<input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">مجالات متنوعة</span>--}}
                                {{--</label>--}}
                            </div>

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                المحافظة:
                            </h2>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">شمال غزة</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">غزة</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">دير البلح</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">خانيونس</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox h-3.5 w-3.5"><span class="mr-2 text-sm text-gray-700">رفح</span>
                                </label>
                            </div>

                            <hr class="my-2">

                            <button class="flex items-center justify-center bg-blue-900 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-opacity-50">
                                <svg class="w-5 h-5 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                                <span>بحث</span>
                            </button>
                        </form>
                    </div>
                </div>
                {{--End Filter--}}

                {{--Start Jobs Menu--}}
                <div class="w-full lg:w-3/4">
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100 rounded-t-lg">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                        {{--Start Single Job--}}
                        <div class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100 rounded-b-lg">
                            <div class="flex">
                                <img class="rounded w-24 h-24" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="mr-4">
                                    <div class="font-semibold text-xl">عنوان الوظيفة</div>
                                    <span class="text-xs mr-1">1, Jan</span>
                                    <div class="text-xs mt-1">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                            <span class="mr-1">Transknow</span>
                                        </div>
                                    </div>
                                    <div class="flex text-xs mt-2">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>                                            <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                            <span class="mr-1">شمال غزة</span>
                                        </div>
                                        <div class="flex mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                            <span class="mr-1">دوام كامل</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900 fill-current" viewBox="0 0 60 60"><path d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path><polygon points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon></svg>
                                <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                            </div>
                            <button class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                <span>مزيد من التفاصيل</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24"><path d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path></svg>
                            </button>
                        </div>
                        {{--End Single Job--}}
                    </div>
                </div>
                {{--End Jobs Menu--}}
            </div>
        </div>
    </main>
</body>
</html>
