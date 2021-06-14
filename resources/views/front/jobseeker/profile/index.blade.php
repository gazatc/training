@extends('layouts.app')
@section('content')
    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Job-seeker detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            بيانات الباحث عن عمل
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
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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
                                <a href=""
                                   class="flex rounded py-2 hover:bg-gray-200 border-r-4 border-blue-900 text-blue-900">
                                    <span class="mr-1 w-full text-right px-4">المعلومات الشخصية</span>

                                </a>
                                <hr>
                                <a href="#cv_file" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">السيرة الذاتية</span>
                                </a>
                                <hr>
                                <a href="{{route('jobSeeker.verify.create')}}"
                                   class="flex rounded  py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">طلبات توثيق الحساب</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Job-seeker detail--}}

                {{--Start Job-seeker Description --}}
                <div class="w-full lg:w-3/4">
                    @if(Session::has('success'))
                        <div
                            class="bg-blue-100 border-t border-b mt-6 lg:mt-0 lg:mr-8  border-blue-500 text-blue-700 px-4 py-3"
                            role="alert">
                            <p class="font-bold">{{Session::get('success')}}</p>
                        </div>
                    @endif
                    {{--Start Job Description--}}
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="justify-between">
                            <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold mb-2 py-2 px-6 bg-gray-100 flex justify-between items-center">
                                <h2 class="">
                                    المعلومات الشخصية
                                </h2>
                                <a href="{{route('jobSeeker.profile.edit')}}" class=" py-2  hover:test-blue-500 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-blue-500"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"/>
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
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">
                                        إبقَ على تواصل دائم من خلال :
                                    </h2>
                                    <div class="flex mt-4 gap-x-3">
                                        @if(empty($jobSeeker->socials->linkedin) &&
                                            empty($jobSeeker->socials->facebook)&&
                                            empty($jobSeeker->socials->web)&&
                                            empty($jobSeeker->socials->instagram))
                                            <span class="">  لا يوجد</span>
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
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                السيرة الذاتية
                            </h2>
                            <div class="py-2 px-6 mb-2">
                                <div>
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">التعليم :</h2>
                                        <a href="{{route('jobSeeker.profile.education.create')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-blue-500"
                                                 fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </a>

                                    </div>
                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->education as $edu)
                                            <li class="mt-2">
                                                <p class="text-base font-semibold flex justify-between">
                                                    <span>{{$edu->institution}}</span>
                                                    <span class="flex gap-5">
                                                  <a href="{{route('jobSeeker.profile.education.edit',$edu->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-blue-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                            </svg>
                                                  </a>
                                                  <a href="{{route('jobSeeker.profile.education.destroy',$edu->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-red-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24"
                                                           stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                  </a>

                                                    </span>
                                                </p>
                                                <p class="text-base">{{$edu->degree}}</p>
                                                <p class="text-sm"> {{ date('Y', strtotime($edu->from))}}
                                                    - {{ date('Y', strtotime($edu->to))}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">الخبرة :</h2>
                                        <a href="{{route('jobSeeker.profile.experience.create')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-blue-500"
                                                 fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </a>

                                    </div>
                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->experience as $exper)
                                            <div>
                                                <li class="mt-2">
                                                    <p class="text-base font-semibold flex justify-between">
                                                        <span>{{$exper->name}}</span>
                                                        <span class="flex gap-5">
                                                  <a href="{{route('jobSeeker.profile.experience.edit',$exper->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-blue-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                            </svg>
                                                  </a>
                                                  <a href="{{route('jobSeeker.profile.experience.destroy',$exper->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-red-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24"
                                                           stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                  </a>

                                                    </span>
                                                    </p>
                                                    <p class="text-base">{{$exper->company}}</p>
                                                    <p class="text-sm">{{ date('Y', strtotime($exper->from))}}
                                                        - {{ date('Y', strtotime($exper->to))}}</p>
                                                </li>

                                        @endforeach
                                    </ul>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold border-r-4 border-blue-900 pr-2">الدورات
                                            التدريبية
                                            :</h2>
                                        <a href="{{route('jobSeeker.profile.training.create')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-blue-500"
                                                 fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </a>

                                    </div>

                                    <ul class="list-disc mr-10">
                                        @foreach($jobSeeker->training as $train)
                                            <li class="mt-2">
                                                <p class="text-base font-semibold flex justify-between">
                                                    <span>{{$train->name}}</span>
                                                    <span class="flex gap-5">
                                                  <a href="{{route('jobSeeker.profile.training.edit',$train->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-blue-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                            </svg>
                                                  </a>
                                                  <a href="{{route('jobSeeker.profile.training.destroy',$train->id)}}">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                           class="h-6 w-6 text-red-500 opacity-50 hover:opacity-100"
                                                           fill="none" viewBox="0 0 24 24"
                                                           stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                  </a>

                                                    </span>
                                                </p>
                                                <p class="text-base">{{$train->institution}}</p>
                                                <p class="text-sm">{{ date('Y', strtotime($train->from))}}
                                                    - {{ date('Y', strtotime($train->to))}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>


                                <hr class="my-2">
                                <h2 class="text-lg font-semibold border-r-4 mt-6 border-blue-900 pr-2" id="cv_file">
                                    ملف السيرة الذاتية
                                    :</h2>
                                @if(!empty($jobSeeker->information->CVFile))
                                    <a href="{{$jobSeeker->information->CVFile}}" target="_blank"
                                       class="flex items-center justify-center text-center rounded-lg my-5 bg-blue-900 text-white font-semibold text-lg px-4 py-2">
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

                                        <span class="mr-2 b">عرض ملف السيرة الذاتية</span>
                                    </a>
                                @endif


                                <form action="{{route('jobSeeker.profile.upload_cv',$jobSeeker)}}"
                                      class="text-center flex items-center justify-center gap-20" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="my-5">
                                        <input type="file" name="CVFile"
                                               class="border border-gray-300   text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900">
                                    </div>
                                    <div>
                                        <button type="submit" class="bg-blue-900 text-sm text-white font-semibold rounded py-2 px-10 ml-2 hover:bg-white
                                        hover:text-blue-900 border hover:border-white">
                                            حفظ
                                        </button>
                                    </div>
                                </form>
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
