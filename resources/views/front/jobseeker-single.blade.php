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
                                    @if($jobSeeker->verified == 1)

                                        <svg
                                                class="text-green-500 fill-current w-6 h-6 absolute bottom-0 left-0 -ml-2 -mb-2"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                  clip-rule="evenodd"></path>
                                            <title>حساب موثق</title>
                                        </svg>
                                    @endif
                                </div>
                                <span
                                        class="flex justify-center text-blue-500 mt-2 text-xl mr-1">{{$jobSeeker->name}}</span>
                                <span
                                        class="flex justify-center mt-2 font-semibold text-sm">{{$jobSeeker->information->category->name}}</span>
                            </div>

                            <hr class="my-2">
                            <div class="text-base rounded-lg font-semibold bg-gray-100">
                                <a href="#bio"
                                   class="flex rounded py-2 hover:bg-gray-200 border-r-4 border-blue-900 text-blue-900">
                                    <span class="mr-1 w-full text-right px-4">المعلومات الشخصية</span>

                                </a>
                                <hr>
                                <a href="#cv" class="flex rounded py-2 hover:bg-gray-200">
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
                                <h2 class="" id="bio">
                                    المعلومات الشخصية
                                </h2>

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
                                        @if(empty($jobSeeker->socials->web) &&
                                            empty($jobSeeker->socials->linkedin) &&
                                            empty($jobSeeker->socials->facebook)&&
                                            empty($jobSeeker->socials->twitter)&&
                                            empty($jobSeeker->socials->instagram)&&
                                            empty($jobSeeker->socials->whatsapp)&&
                                            empty($jobSeeker->socials->behance)&&
                                            empty($jobSeeker->socials->github))
                                        <span class="">  لا يوجد</span>
                                        @endif
                                        @if(!empty($jobSeeker->socials->web))
                                            <a href="{{$jobSeeker->socials->web}}" target="_blank"
                                               class="flex p-3 justify-center bg-gray-600 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 92">
                                                    <path id="XMLID_1666_"
                                                          d="M46 0C20.6 0 0 20.6 0 46s20.6 46 46 46 46-20.6 46-46S71.4 0 46 0zm3.7 83.8c-.2 0-.4 0-.7.1V62.2c5.2-.1 9.9-.2 14.2-.5-3.8 11.7-10.9 19.5-13.5 22.1zm-7.4 0c-2.7-2.7-9.7-10.5-13.5-22.1 4.2.3 9 .5 14.2.5v21.7c-.2 0-.4-.1-.7-.1zM8 46c0-2.5.3-5 .7-7.4 2.2-.4 6.4-1 12.3-1.6-.5 2.9-.8 5.9-.8 9.1 0 3.2.3 6.2.7 9-5.8-.6-10.1-1.2-12.3-1.6-.3-2.5-.6-5-.6-7.5zm18.3 0c0-3.4.4-6.6 1-9.6 4.6-.3 9.8-.6 15.7-.6v20.4c-5.8-.1-11.1-.3-15.8-.7-.5-2.9-.9-6.1-.9-9.5zM49.6 8.2c2.7 2.7 9.6 10.7 13.5 22.1-4.2-.3-8.9-.5-14.1-.5V8.1c.2 0 .4.1.6.1zM43 8.1v21.7c-5.2.1-9.9.2-14.1.5 3.8-11.4 10.8-19.4 13.4-22.1.3 0 .5-.1.7-.1zm6 48.1V35.8c5.8.1 11.1.3 15.7.6.6 3 1 6.2 1 9.6 0 3.4-.3 6.6-.9 9.6-4.6.3-9.9.5-15.8.6zM70.9 37c5.9.6 10.1 1.2 12.3 1.6.5 2.4.8 4.9.8 7.4s-.3 5-.7 7.4c-2.2.4-6.4 1-12.3 1.6.5-2.9.7-5.9.7-9.1 0-3-.3-6.1-.8-8.9zm10.5-4.8c-2.8-.4-6.8-.9-11.9-1.4-2.4-8.6-6.6-15.5-10.1-20.4 10.1 3.8 18.1 11.8 22 21.8zM32.6 10.4c-3.6 4.8-7.7 11.7-10.1 20.3-5 .4-9 1-11.9 1.4 3.9-9.9 12-17.9 22-21.7zm-22 49.4c2.8.4 6.8.9 11.8 1.4 2.4 8.6 6.4 15.5 10 20.3-10-3.9-17.9-11.8-21.8-21.7zm49 21.7c3.6-4.8 7.6-11.6 10-20.2 5-.4 9-1 11.8-1.4-3.9 9.8-11.8 17.7-21.8 21.6z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->linkedin))
                                            <a href="{{$jobSeeker->socials->linkedin}}" target="_blank"
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
                                            <a href="{{$jobSeeker->socials->facebook}}" target="_blank"
                                               class="flex p-3 justify-center bg-blue-600 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 32 32" xml:space="preserve"><path
                                                            d="M11.848 32h6.612V15.998h4.411l.584-5.514H18.46l.007-2.761c0-1.437.137-2.209 2.2-2.209h2.757V0h-4.412c-5.299 0-7.164 2.675-7.164 7.174v3.311H8.545V16h3.303v16z"
                                                            id="Full_copy"></path></svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->twitter))
                                            <a href="{{$jobSeeker->socials->twitter}}" target="_blank"
                                               class="flex p-3 justify-center bg-blue-400 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 30 24">
                                                    <path
                                                            d="m29.55 2.85c-.841 1.224-1.848 2.26-3.004 3.106l-.036.025q.018.262.018.787c-.004 1.736-.264 3.41-.745 4.987l.032-.122c-.534 1.773-1.272 3.32-2.206 4.724l.04-.065c-.989 1.509-2.132 2.808-3.435 3.927l-.024.02c-1.372 1.153-2.978 2.083-4.73 2.704l-.108.033c-1.765.648-3.803 1.022-5.928 1.022-.045 0-.09 0-.134 0h.007c-.038 0-.082 0-.127 0-3.41 0-6.584-1.015-9.234-2.76l.063.039c.419.048.904.075 1.396.075h.07-.004c.037 0 .082.001.126.001 2.807 0 5.386-.975 7.417-2.606l-.023.018c-2.639-.05-4.861-1.777-5.65-4.157l-.012-.043c.342.057.738.091 1.141.094h.003c.567 0 1.116-.075 1.637-.216l-.044.01c-1.412-.284-2.615-1.034-3.47-2.08l-.008-.011c-.858-1.011-1.379-2.331-1.379-3.773 0-.028 0-.056.001-.084v.004-.075c.788.452 1.726.732 2.727.768h.011c-.822-.553-1.487-1.279-1.953-2.129l-.016-.031c-.46-.835-.731-1.83-.731-2.889 0-1.126.306-2.18.84-3.084l-.015.028c1.5 1.839 3.337 3.341 5.425 4.427l.095.045c2.022 1.067 4.402 1.743 6.927 1.864l.038.001c-.093-.415-.147-.892-.149-1.382v-.001c.004-3.345 2.717-6.055 6.062-6.055 1.74 0 3.309.733 4.415 1.908l.003.003c1.448-.284 2.735-.792 3.893-1.492l-.053.03c-.455 1.431-1.4 2.596-2.635 3.323l-.028.015c1.294-.148 2.475-.479 3.569-.967l-.077.031z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->instagram))
                                            <a href="{{$jobSeeker->socials->instagram}}" target="_blank"
                                               class="flex p-3 justify-center bg-red-400 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M12,6.865A5.135,5.135,0,1,0,17.135,12,5.135,5.135,0,0,0,12,6.865Zm0,8.469A3.334,3.334,0,1,1,15.334,12,3.334,3.334,0,0,1,12,15.334Zm6.539-8.672a1.2,1.2,0,1,1-1.2-1.2h0A1.2,1.2,0,0,1,18.539,6.662ZM21.476,5.45a4.917,4.917,0,0,0-1.154-1.772,4.894,4.894,0,0,0-1.77-1.153,7.318,7.318,0,0,0-2.428-.464C15.058,2.012,14.717,2,12,2s-3.057.011-4.124.061a7.326,7.326,0,0,0-2.427.464A4.9,4.9,0,0,0,3.679,3.678,4.882,4.882,0,0,0,2.525,5.45a7.332,7.332,0,0,0-.464,2.427C2.011,8.943,2,9.284,2,12s.011,3.057.061,4.123a7.332,7.332,0,0,0,.464,2.427,4.882,4.882,0,0,0,1.154,1.772A4.915,4.915,0,0,0,5.45,21.475a7.337,7.337,0,0,0,2.427.464C8.944,21.988,9.285,22,12,22s3.057-.011,4.123-.061a7.333,7.333,0,0,0,2.428-.464,5.113,5.113,0,0,0,2.925-2.925,7.306,7.306,0,0,0,.464-2.427c.049-1.067.06-1.407.06-4.123s-.011-3.057-.06-4.123A7.326,7.326,0,0,0,21.476,5.45ZM20.141,16.041A5.52,5.52,0,0,1,19.8,17.9a3.31,3.31,0,0,1-1.9,1.9,5.546,5.546,0,0,1-1.857.344c-1.054.048-1.371.058-4.042.058s-2.986-.01-4.04-.058A5.546,5.546,0,0,1,6.1,19.8a3.1,3.1,0,0,1-1.15-.748,3.092,3.092,0,0,1-.748-1.15,5.494,5.494,0,0,1-.344-1.857C3.812,14.987,3.8,14.671,3.8,12s.01-2.986.058-4.041A5.552,5.552,0,0,1,4.205,6.1a3.1,3.1,0,0,1,.748-1.15A3.072,3.072,0,0,1,6.1,4.2,5.494,5.494,0,0,1,7.96,3.86C9.014,3.811,9.331,3.8,12,3.8s2.987.011,4.042.059A5.552,5.552,0,0,1,17.9,4.2a3.31,3.31,0,0,1,1.9,1.9,5.494,5.494,0,0,1,.344,1.857C20.19,9.014,20.2,9.33,20.2,12S20.19,14.986,20.141,16.041Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->whatsapp))
                                            <a href="{{$jobSeeker->socials->whatsapp}}" target="_blank"
                                               class="flex p-3 justify-center bg-green-400 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-5 h-5 text-white fill-current" viewBox="0 0 24 24">
                                                    <path d="M16.6,14c-0.2-0.1-1.5-0.7-1.7-0.8c-0.2-0.1-0.4-0.1-0.6,0.1
	c-0.2,0.2-0.6,0.8-0.8,1c-0.1,0.2-0.3,0.2-0.5,0.1c-0.7-0.3-1.4-0.7-2-1.2c-0.5-0.5-1-1.1-1.4-1.7c-0.1-0.2,0-0.4,0.1-0.5
	c0.1-0.1,0.2-0.3,0.4-0.4c0.1-0.1,0.2-0.3,0.2-0.4c0.1-0.1,0.1-0.3,0-0.4c-0.1-0.1-0.6-1.3-0.8-1.8C9.4,7.3,9.2,7.3,9,7.3
	c-0.1,0-0.3,0-0.5,0C8.3,7.3,8,7.5,7.9,7.6C7.3,8.2,7,8.9,7,9.7c0.1,0.9,0.4,1.8,1,2.6c1.1,1.6,2.5,2.9,4.2,3.7
	c0.5,0.2,0.9,0.4,1.4,0.5c0.5,0.2,1,0.2,1.6,0.1c0.7-0.1,1.3-0.6,1.7-1.2c0.2-0.4,0.2-0.8,0.1-1.2C17,14.2,16.8,14.1,16.6,14
	 M19.1,4.9C15.2,1,8.9,1,5,4.9c-3.2,3.2-3.8,8.1-1.6,12L2,22l5.3-1.4c1.5,0.8,3.1,1.2,4.7,1.2h0c5.5,0,9.9-4.4,9.9-9.9
	C22,9.3,20.9,6.8,19.1,4.9 M16.4,18.9c-1.3,0.8-2.8,1.3-4.4,1.3h0c-1.5,0-2.9-0.4-4.2-1.1l-0.3-0.2l-3.1,0.8l0.8-3l-0.2-0.3
	C2.6,12.4,3.8,7.4,7.7,4.9S16.6,3.7,19,7.5C21.4,11.4,20.3,16.5,16.4,18.9"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->behance))
                                            <a href="{{$jobSeeker->socials->behance}}" target="_blank"
                                               class="flex p-3 justify-center bg-indigo-400 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-5 h-5 text-white fill-current" viewBox="0 0 24 24">
                                                    <path d="M22.1084,15.03169a.99748.99748,0,0,0-1.21582.72265,2.99839,2.99839,0,0,1-5.90088-.7539v-1h7a.99974.99974,0,0,0,1-1,5,5,0,1,0-10,0v2a4.99837,4.99837,0,0,0,9.83935,1.24609A.999.999,0,0,0,22.1084,15.03169Zm-4.1167-5.03125a3.01119,3.01119,0,0,1,2.11816.87207,3.04438,3.04438,0,0,1,.69867,1.12793H15.176A2.99509,2.99509,0,0,1,17.9917,10.00044Zm-2-3h4a1,1,0,0,0,0-2h-4a1,1,0,0,0,0,2Zm-6.082,4.71716a3.98653,3.98653,0,0,0-2.918-6.71716h-5a.99973.99973,0,0,0-1,1v13a.99974.99974,0,0,0,1,1h5.5a4.492,4.492,0,0,0,2.418-8.28284ZM2.9917,7.00044h4a2,2,0,1,1,0,4h-4Zm4.5,11h-4.5v-5h4.5a2.5,2.5,0,0,1,0,5Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($jobSeeker->socials->github))
                                            <a href="{{$jobSeeker->socials->github}}" target="_blank"
                                               class="flex p-3 justify-center bg-gray-400 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current" viewBox="0 0 24 24">
                                                    <path d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                @if($jobSeeker->teamLeader()->exists() || $jobSeeker->team()->exists())
                                    <hr class="my-4">
                                    @php
                                        $team = $jobSeeker->team()->first() !=NULL ? $jobSeeker->team()->first() : $jobSeeker->teamLeader()->first();
                                    @endphp
                                    {{--                                    {{dd($jobSeeker->team()->member)}}--}}
                                    <div>
                                        <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">الفريق<span
                                                    class="mr-2">({{$team->name}})</span></h2>
                                        <p class="mt-2 text-justify">
                                            {{$team->bio}}
                                        </p>
                                        <div class="flex mt-4 gap-x-3">
                                            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 mt-6 lg:mt-0">
                                                {{--  Start Single Employer--}}
                                                @foreach(collect([$team->leader])->merge($team->members) as $jobSeeker)
                                                    <div class="shadow-lg bg-white rounded-lg  hover:bg-gray-100">
                                                        <div class="px-2 py-4">

                                                            <div class="space-y-2">
                                                                <img class="m-auto rounded w-36 h-36"
                                                                     @if(!empty($jobSeeker->information->avatar))
                                                                     src="{{$jobSeeker->information->avatar}}"
                                                                     @else
                                                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                                                     @endif
                                                                     alt="">
                                                                <div class="text-base text-center mt-1">
                                                                    <a href="{{route('jobseeker.show',$jobSeeker)}}"
                                                                       class="flex items-center justify-center font-semibold">
                                                                        <span class="text-blue-500 mr-1">{{$jobSeeker->name}}</span>
                                                                    </a>
                                                                </div>
                                                                <div class="flex text-sm text-center justify-center items-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="w-5 h-5" viewBox="0 0 64 64">
                                                                        <path fill="#222"
                                                                              d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path>
                                                                    </svg>
                                                                    <span class="mr-1">@if($jobSeeker->teamLeader )
                                                                            مدير @else عضو @endif</span>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                @endforeach
                                                {{--                                                End Single Employer--}}

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{--End Single Description--}}
                    </div>
                    {{--End Single Description--}}

                    {{-- Start CV --}}
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        <div class="justify-between">
                            <h2 id="cv"
                                class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
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
                                                <p class="text-sm"> {{ date('Y', strtotime($edu->from))}}
                                                    - {{ date('Y', strtotime($edu->to))}}</p>
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
                                                <p class="text-sm">{{ date('Y', strtotime($exper->from))}}
                                                    - {{ date('Y', strtotime($exper->to))}}</p>
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
                                                <p class="text-sm">{{ date('Y', strtotime($train->from))}}
                                                    - {{ date('Y', strtotime($train->to))}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if(!empty($jobSeeker->information->CVFile))
                                    <a href="{{$jobSeeker->information->CVFile}}" target="_blank"
                                       class="flex items-center justify-center text-center rounded-lg my-5 bg-blue-900 text-white font-semibold text-lg px-4 py-2">
                                        <svg class="w-5 h-5 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 52 52">
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

                                        <span class="mr-2 b">عرض ملف السيرة الذاتية</span>
                                    </a>
                                @endif

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
