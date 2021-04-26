@extends('layouts.app')
@section('content')
    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Job-seeker detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            بيانات الشخص
                        </h2>
                        <div class="px-2 py-4">
                            <div>
                                <div class="m-auto w-36 h-36 relative">
                                    <img class="rounded w-36 h-36"
                                         @if(!empty($jobSeeker->information->avatar))
                                             src="{{$jobSeeker->information->avatar}}"
                                         @else
                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                         @endif
                                         alt="">
                                    <svg
                                        class="text-green-500 fill-current w-6 h-6 absolute bottom-0 left-0 -ml-2 -mb-2"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                        <title>حساب موثق</title>
                                    </svg>
                                </div>
                                <span class="flex justify-center text-blue-500 mt-2 text-xl mr-1">{{$jobSeeker->name}}</span>
                                <span class="flex justify-center mt-2 font-semibold text-sm">{{$jobSeeker->information->category->name}}</span>
                            </div>

                            <hr class="my-2">
                            <div class="text-base rounded-lg font-semibold bg-gray-100">
                                <a href=""
                                   class="flex rounded py-2 hover:bg-gray-200 border-r-4 border-blue-900 text-blue-900">
                                    <span class="mr-1 w-full text-right px-4">المعلومات الشخصية</span>

                                </a>
                                <hr>
                                <a href="" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">السيرة الذاتية</span>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Job-seeker detail--}}

                {{--Start Job-seeker Description --}}
                <div class="w-full lg:w-3/4">
                    {{--Start Job Description--}}
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="justify-between">
                            <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold mb-2 py-2 px-6 bg-gray-100 flex justify-between items-center">
                                <h2 class="">
                                    المعلومات الشخصية
                                </h2>
                                <a href="" class="">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg"
                                         enable-background="new 0 0 32 32"
                                         viewBox="0 0 32 32">
                                        <path
                                            d="M26.71002,0.94c-0.59003-0.59003-1.53003-0.59003-2.12,0L13.20001,12.32996c-0.17999,0.17004-0.29999,0.39001-0.38,0.63l-1.85999,6.21002c-0.16003,0.53003-0.01001,1.09998,0.38,1.48999c0.27997,0.29004,0.66998,0.44,1.06,0.44c0.13995,0,0.28998-0.02002,0.42999-0.06l6.20996-1.85999c0.24005-0.08002,0.46002-0.20001,0.63-0.38L31.06,7.40997C31.34003,7.13,31.5,6.75,31.5,6.34998c0-0.39996-0.15997-0.77997-0.44-1.06L26.71002,0.94z"/>
                                        <path
                                            d="M30,14.5c-0.82861,0-1.5,0.67188-1.5,1.5v10c0,1.37891-1.12158,2.5-2.5,2.5H6c-1.37842,0-2.5-1.12109-2.5-2.5V6c0-1.37891,1.12158-2.5,2.5-2.5h10c0.82861,0,1.5-0.67188,1.5-1.5S16.82861,0.5,16,0.5H6C2.96729,0.5,0.5,2.96777,0.5,6v20c0,3.03223,2.46729,5.5,5.5,5.5h20c3.03271,0,5.5-2.46777,5.5-5.5V16C31.5,15.17188,30.82861,14.5,30,14.5z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="py-2 px-6 mb-2">
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">نبذة عني :</h2>
                                    <p class="mt-2 text-justify">
                                        {{$jobSeeker->information->bio}}
                                    </p>
                                </div>
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2 mt-4">المهارات
                                        :</h2>
                                    <p class="mt-2 text-justify">
                                        {{$jobSeeker->information->skills}}

                                    </p>
                                </div>

                                <hr class="my-4">
                                <div class="grid lg:grid-cols-3 grid-cols-1 gap-4">
                                    <div>
                                        <span class="text-base font-semibold">المجال : </span>
                                        <span class="text-sm">{{$jobSeeker->information->category->name}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">المستوى الدراسي : </span>
                                        <span class="text-sm">{{$jobSeeker->information->degree}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">العمر : </span>
                                        <span class="text-sm">{{$jobSeeker->information->age}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">المحافظة : </span>
                                        <span class="text-sm">{{$jobSeeker->information->region->name}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">الجوال : </span>
                                        <span class="text-sm">{{$jobSeeker->information->phone}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">الايميل : </span>
                                        <span class="text-sm">{{$jobSeeker->email}}</span>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">إبقَ على تواصل
                                        دائم
                                        من خلال : </h2>
                                    <div class="flex mt-4 gap-x-3">
                                        @if(empty($jobSeeker->socials->linkedin) &&
                                            empty($jobSeeker->socials->facebook)&&
                                            empty($jobSeeker->socials->web)&&
                                            empty($jobSeeker->socials->instagram))
                                            <span class="">  لا يوجد</span>
                                        @endif
                                        @if(!empty($jobSeeker->socials->linkedin))
                                            <a href="" target="_blank"
                                               class="flex p-3 justify-center bg-blue-900 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 32 32">
                                                    <path
                                                        d="M32 31.292V19.46c0-6.34-3.384-9.29-7.896-9.29-3.641 0-5.273 2.003-6.182 3.409v-2.924h-6.86c.091 1.937 0 20.637 0 20.637h6.86V19.767c0-.615.044-1.232.226-1.672.495-1.233 1.624-2.509 3.518-2.509 2.483 0 3.475 1.892 3.475 4.666v11.041H32v-.001zM3.835 7.838c2.391 0 3.882-1.586 3.882-3.567C7.673 2.247 6.227.707 3.881.707S0 2.246 0 4.271c0 1.981 1.489 3.567 3.792 3.567h.043zm3.43 23.454V10.655H.406v20.637h6.859z"
                                                        id="Flat_copy"></path>
                                                </svg>
                                            </a>
                                        @endif

                                        @if(!empty($jobSeeker->socials->facebook))

                                            <a href="" target="_blank"
                                               class="flex p-3 justify-center bg-blue-600 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 32 32" xml:space="preserve"><path
                                                        d="M11.848 32h6.612V15.998h4.411l.584-5.514H18.46l.007-2.761c0-1.437.137-2.209 2.2-2.209h2.757V0h-4.412c-5.299 0-7.164 2.675-7.164 7.174v3.311H8.545V16h3.303v16z"
                                                        id="Full_copy"></path></svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->twitter))

                                            <a href="" target="_blank"
                                               class="flex p-3 justify-center bg-blue-400 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 30 24">
                                                    <path
                                                        d="m29.55 2.85c-.841 1.224-1.848 2.26-3.004 3.106l-.036.025q.018.262.018.787c-.004 1.736-.264 3.41-.745 4.987l.032-.122c-.534 1.773-1.272 3.32-2.206 4.724l.04-.065c-.989 1.509-2.132 2.808-3.435 3.927l-.024.02c-1.372 1.153-2.978 2.083-4.73 2.704l-.108.033c-1.765.648-3.803 1.022-5.928 1.022-.045 0-.09 0-.134 0h.007c-.038 0-.082 0-.127 0-3.41 0-6.584-1.015-9.234-2.76l.063.039c.419.048.904.075 1.396.075h.07-.004c.037 0 .082.001.126.001 2.807 0 5.386-.975 7.417-2.606l-.023.018c-2.639-.05-4.861-1.777-5.65-4.157l-.012-.043c.342.057.738.091 1.141.094h.003c.567 0 1.116-.075 1.637-.216l-.044.01c-1.412-.284-2.615-1.034-3.47-2.08l-.008-.011c-.858-1.011-1.379-2.331-1.379-3.773 0-.028 0-.056.001-.084v.004-.075c.788.452 1.726.732 2.727.768h.011c-.822-.553-1.487-1.279-1.953-2.129l-.016-.031c-.46-.835-.731-1.83-.731-2.889 0-1.126.306-2.18.84-3.084l-.015.028c1.5 1.839 3.337 3.341 5.425 4.427l.095.045c2.022 1.067 4.402 1.743 6.927 1.864l.038.001c-.093-.415-.147-.892-.149-1.382v-.001c.004-3.345 2.717-6.055 6.062-6.055 1.74 0 3.309.733 4.415 1.908l.003.003c1.448-.284 2.735-.792 3.893-1.492l-.053.03c-.455 1.431-1.4 2.596-2.635 3.323l-.028.015c1.294-.148 2.475-.479 3.569-.967l-.077.031z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--End Single Description--}}
                    </div>
                    {{--End Single Description--}}

                    {{-- Start CV --}}
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        <div class="justify-between">
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                السيرة الذاتية
                            </h2>
                            <div class="py-2 px-6 mb-2">
                                <div>
                                    <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">التعليم :</h2>
                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->education as $edu)
                                            <li class="mt-2">
                                                <p class="text-base font-semibold">{{$edu->institution}}</p>
                                                <p class="text-base">{{$edu->institution}}</p>
                                                <p class="text-sm"> {{ date('Y', strtotime($edu->from))}} - {{ date('Y', strtotime($edu->to))}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">الخبرة :</h2>
                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->experience as $exper)
                                            <li class="mt-2">
                                                <p class="text-base font-semibold">{{$exper->name}}</p>
                                                <p class="text-base">{{$exper->company}}</p>
                                                <p class="text-sm">{{ date('Y', strtotime($exper->from))}} - {{ date('Y', strtotime($exper->to))}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">الدورات التدريبية
                                        :</h2>
                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->training as $train)
                                        <li class="mt-2">
                                            <p class="text-base font-semibold">{{$train->name}}</p>
                                            <p class="text-base">{{$train->institution}}</p>
                                            <p class="text-sm">{{ date('Y', strtotime($train->from))}} - {{ date('Y', strtotime($train->to))}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <a href=""
                                   class="flex items-center justify-center text-center rounded-lg mt-6 bg-blue-900 text-white font-semibold text-lg px-4 py-2">
                                    <svg class="w-5 h-5 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 52 52">
                                        <g fill="none" stroke="#FFF" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round" stroke-miterlimit="10">
                                            <path
                                                d="M29.808 2H10.086c-.885 0-1.603.718-1.603 1.603v44.794c0 .885.718 1.603 1.603 1.603h31.828c.885 0 1.603-.718 1.603-1.603V15.094"></path>
                                            <path
                                                d="M29.808 2v11.49c0 .886.718 1.604 1.603 1.604h12.106L29.808 2z"></path>
                                            <path d="M13.985 7.936h9.776v7.594h-9.776z"></path>
                                            <g>
                                                <path d="M26 21.444H37.96"></path>
                                                <path d="M14.041 28.783H37.96"></path>
                                                <path d="M14.041 36.123H37.96"></path>
                                                <path d="M14.041 43.462H37.96"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="mr-2">عرض ملف السيرة الذاتية</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    {{--End CV--}}
                </div>
                {{--End Job-seeker Description --}}
            </div>
        </div>
    </main>
@endsection
