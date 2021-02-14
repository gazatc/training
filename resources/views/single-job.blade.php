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
    <header class="bg-blue-900 border-b border-gray-800">
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
                <a href="#"
                   class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 ml-2 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">
                    تسجيل دخول
                </a>
                <a href="#"
                   class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-4 hover:bg-blue-900 hover:text-yellow-300 border hover:border-yellow-300">
                    دخول أصحاب العمل
                </a>
            </div>
        </nav>
    </header>

    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Job detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">تفاصيل الوظيفة</h2>
                        <div class="px-2 py-4">
                            <div>
                                <img class="m-auto rounded w-36 h-36" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="flex justify-center mt-2 font-semibold text-xl">عنوان الوظيفة</div>
                                <div class="text-base mt-1">
                                    <a href="" class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>
                                        <span class="text-blue-500 mr-1">Transknow</span>
                                        <svg class="text-green-500 fill-current w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div class="text-base space-y-0.5">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>
                                    <span class="mr-1">الطب والتمريض والصحة العامة</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64"><path d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path></svg>
                                    <span class="mr-1">شمال غزة</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 32 32"><path d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path></svg>
                                    <span class="mr-1">دوام كامل</span>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div>
                                <h3 class="inline font-semibold">آخر موعد للتقديم : </h3><span class="text-sm">11 - 2 - 2021</span>
                                <button class="mt-2 flex items-center justify-center bg-green-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-green-700 focus:ring-opacity-50">
                                    <span>التقدم للوظيفة</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Job detail--}}

                {{--Start Job Description & Requirement--}}
                <div class="w-full lg:w-3/4">
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="justify-between">
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                الوصف الوظيفي
                            </h2>
                            <div class="py-2 px-6 text-justify">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur dolorum, incidunt quae quos tempora tempore vel! Atque, dolores error nihil nostrum quaerat reprehenderit sit. Aliquam amet aperiam, aspernatur at aut consectetur, cumque deserunt dolorem eius eveniet excepturi facere harum hic illo iste laboriosam laudantium minus molestiae necessitatibus, neque non odit officia porro quos repudiandae saepe sapiente soluta veritatis vitae voluptatem. Ab accusamus adipisci aspernatur consectetur consequatur consequuntur culpa, cupiditate doloremque dolores esse est fuga impedit inventore iusto laudantium mollitia, nesciunt numquam quam quas ratione repudiandae ut velit vero voluptatem voluptatibus. Adipisci alias amet assumenda atque, corporis ducimus eaque id, magni nihil porro quibusdam quo sequi voluptate. Ad animi atque aut beatae consectetur consequatur cum deserunt doloremque doloribus earum eligendi enim et eveniet ex fugiat id impedit ipsum laudantium minus natus numquam officiis omnis perspiciatis praesentium quaerat quasi quo quod recusandae rerum sequi suscipit tempora totam vel velit veritatis voluptate, voluptatem? Adipisci consequatur eaque harum ipsum mollitia natus necessitatibus nihil, tempore! Enim illo minima quaerat quisquam tempora! Ab asperiores aspernatur consectetur dolore eos esse est illum in incidunt iste laboriosam molestias nostrum, numquam odit quam qui quos reprehenderit repudiandae sapiente tempora totam ullam veritatis! Consequatur ducimus magni perspiciatis quos veniam.</p>
                            </div>
                        </div>
                        {{--End Single Description--}}
                        {{--Start Job Requirement--}}
                        <div class="justify-between">
                            <h2 class="text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                متطلبات الوظيفة
                            </h2>
                            <div class="py-2 px-6 text-justify">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur dolorum, incidunt quae quos tempora tempore vel! Atque, dolores error nihil nostrum quaerat reprehenderit sit. Aliquam amet aperiam, aspernatur at aut consectetur, cumque deserunt dolorem eius eveniet excepturi facere harum hic illo iste laboriosam laudantium minus molestiae necessitatibus, neque non odit officia porro quos repudiandae saepe sapiente soluta veritatis vitae voluptatem. Ab accusamus adipisci aspernatur consectetur consequatur consequuntur culpa, cupiditate doloremque dolores esse est fuga impedit inventore iusto laudantium mollitia, nesciunt numquam quam quas ratione repudiandae ut velit vero voluptatem voluptatibus. Adipisci alias amet assumenda atque, corporis ducimus eaque id, magni nihil porro quibusdam quo sequi voluptate. Ad animi atque aut beatae consectetur consequatur cum deserunt doloremque doloribus earum eligendi enim et eveniet ex fugiat id impedit ipsum laudantium minus natus numquam officiis omnis perspiciatis praesentium quaerat quasi quo quod recusandae rerum sequi suscipit tempora totam vel velit veritatis voluptate, voluptatem? Adipisci consequatur eaque harum ipsum mollitia natus necessitatibus nihil, tempore! Enim illo minima quaerat quisquam tempora! Ab asperiores aspernatur consectetur dolore eos esse est illum in incidunt iste laboriosam molestias nostrum, numquam odit quam qui quos reprehenderit repudiandae sapiente tempora totam ullam veritatis! Consequatur ducimus magni perspiciatis quos veniam.</p>
                            </div>
                        </div>
                        {{--End Single Requirement--}}
                    </div>
                </div>
                {{--End Job Description & Requirement--}}
            </div>
        </div>
    </main>
</body>
</html>
