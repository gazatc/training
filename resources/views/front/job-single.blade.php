@extends('layouts.app')
@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Job detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            تفاصيل الوظيفة</h2>
                        <div class="px-2 py-4">
                            <div>
                                <img class="m-auto rounded w-36 h-36"
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     alt="">
                                <div class="flex justify-center mt-2 font-semibold text-xl">{{$job->title}}</div>
                                <div class="text-base mt-1">
                                    <a href="" class="flex items-center justify-center">
                                        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 25 25">--}}
                                        {{--                                        <path fill="#2b3344"--}}
                                        {{--                                              d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path>--}}
                                        {{--                                    </svg>--}}
                                        <span class="text-blue-500 mr-1">{{$job->employer->name}}</span>

                                        @if($job->employer->verified == 1)
                                            <svg class="text-green-500 fill-current w-5 h-5 mr-1"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </a>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div class="text-base space-y-0.5">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64">
                                        <path fill="#222"
                                              d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path>
                                    </svg>
                                    <span class="mr-1">{{$job->employer->information->category->name}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64">
                                        <path
                                            d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path>
                                    </svg>
                                    <span class="mr-1">{{$job->employer->information->region->name}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 32 32">
                                        <path
                                            d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path>
                                    </svg>
                                    <span class="mr-1">{{$job->getJobTypeTextAttribute()}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                         enable-background="new 0 0 48 48"
                                         viewBox="0 0 48 48">
                                        <path
                                            d="M33 15.2c-.7-3.1-2.9-5.4-5.6-6.5.9-.9 1.4-2.1 1.4-3.4 0-2.6-2.1-4.8-4.8-4.8s-4.8 2.1-4.8 4.8c0 1.3.6 2.5 1.4 3.4-2.8 1.1-4.9 3.5-5.6 6.5l-.3 1.2h18.5L33 15.2zM21.2 5.3c0-1.5 1.2-2.8 2.8-2.8s2.8 1.2 2.8 2.8S25.5 8.1 24 8.1 21.2 6.8 21.2 5.3zM17.4 14.4c1.1-2.6 3.7-4.4 6.6-4.4s5.5 1.7 6.6 4.4H17.4zM47.5 42c-.7-3.1-2.9-5.4-5.6-6.5.9-.9 1.4-2.1 1.4-3.4 0-2.6-2.1-4.8-4.8-4.8s-4.8 2.1-4.8 4.8c0 1.3.6 2.5 1.4 3.4-2.8 1.1-4.9 3.5-5.6 6.5l-.3 1.2h18.5L47.5 42zM35.7 32c0-1.5 1.2-2.8 2.8-2.8s2.8 1.2 2.8 2.8-1.2 2.8-2.8 2.8S35.7 33.6 35.7 32zM31.8 41.2c1.1-2.6 3.7-4.4 6.6-4.4s5.5 1.7 6.6 4.4H31.8zM18.5 42c-.7-3.1-2.9-5.4-5.6-6.5.9-.9 1.4-2.1 1.4-3.4 0-2.6-2.1-4.8-4.8-4.8S4.7 29.4 4.7 32c0 1.3.6 2.5 1.4 3.4-2.8 1.1-4.9 3.5-5.6 6.5l-.3 1.2h18.5L18.5 42zM6.7 32c0-1.5 1.2-2.8 2.8-2.8s2.8 1.2 2.8 2.8-1.2 2.8-2.8 2.8S6.7 33.6 6.7 32zM2.9 41.2c1.1-2.6 3.7-4.4 6.6-4.4s5.5 1.7 6.6 4.4H2.9zM17.5 7.9L16.9 6C8.4 9.1 2.7 17.1 2.7 26.2c0 .8 0 1.7.1 2.5l2-.2c-.1-.7-.1-1.5-.1-2.2C4.7 18 9.8 10.7 17.5 7.9zM32 46l-.7-1.9C26.5 46 21.1 46 16.4 43.9l-.8 1.8c2.7 1.1 5.5 1.7 8.4 1.7C26.8 47.5 29.5 47 32 46z"/>
                                        <path d="M45.2,28.3c0.1-0.7,0.1-1.5,0.1-2.2c0-9.2-5.8-17.3-14.6-20.2l-0.6,1.9c7.9,2.6,13.2,10,13.2,18.3c0,0.7,0,1.3-0.1,2
		                                L45.2,28.3z"/>
                                    </svg>
                                    <span class="mr-1">{{$job->getForTextAttribute()}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                         enable-background="new 0 0 32 32"
                                         viewBox="0 0 32 32">
                                        <path fill="none" stroke="#000" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"
                                              d="M17.5,13h-2c-0.828,0-1.5,0.672-1.5,1.5v0c0,0.828,0.672,1.5,1.5,1.5h1c0.828,0,1.5,0.672,1.5,1.5v0c0,0.828-0.672,1.5-1.5,1.5H14"/>
                                        <line x1="16" x2="16" y1="11.5" y2="13" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                        <line x1="16" x2="16" y1="20.5" y2="19" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                        <circle cx="16" cy="16" r="11" fill="none" stroke="#000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                                        <line x1="16" x2="16" y1="25" y2="29" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                        <line x1="3" x2="7" y1="16" y2="16" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                        <line x1="16" x2="16" y1="7" y2="3" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                        <line x1="25" x2="29" y1="16" y2="16" fill="none" stroke="#000"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              stroke-width="2"/>
                                    </svg>
                                    <span class="mr-1">{{$job->getSalaryTypeTextAttribute()}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" data-name="Layer 1"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M19,5.38l-7-3.5L5,5.38V22H19ZM12,12a3,3,0,0,1,1,5.82V19H11V17.82A3,3,0,0,1,9,15h2a1,1,0,1,0,1-1,3,3,0,0,1-1-5.82V7h2V8.18A3,3,0,0,1,15,11H13a1,1,0,1,0-1,1Z"/>
                                    </svg>
                                    <span class="mr-1">{{$job->salary_amount}}</span>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div>
                                <h3 class="inline font-semibold">آخر موعد للتقديم : </h3><span
                                    class="text-sm">{{$job->last_date}}</span>
                                @if(Session::has('success'))
                                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                        <p class="font-bold">{{Session::get('success')}}</p>
                                    </div>
                                @endif
                                @if($job->last_date >= today()->toDateString())
                                    <form action="{{route('job.apply',$job)}}" method="post">
                                        @csrf
                                        <button
                                            class="mt-2 flex items-center justify-center bg-green-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-green-700 focus:ring-opacity-50">
                                            <span>التقدم للوظيفة</span>
                                        </button>
                                    </form>
                                @else
                                    <button disabled
                                            class="mt-2 flex items-center justify-center bg-red-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-opacity-50">
                                        <span>انتهى التقديم</span>
                                    </button>
                                @endif
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
                                <p>
                                    {{$job->description}}
                                </p>
                            </div>
                        </div>
                        {{--End Single Description--}}
                        {{--Start Job Requirement--}}
                        <div class="justify-between">
                            <h2 class="text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                متطلبات الوظيفة
                            </h2>
                            <div class="py-2 px-6 text-justify">
                                <p>
                                    {{$job->requirement}}
                                </p>
                            </div>
                        </div>
                        {{--End Single Requirement--}}

                        @if($job->employer->id != auth()->guard('employer')->id())
                            {{--Start Inquire about the job--}}
                            <div class="justify-between text-center">
                                <h2 class="text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                    استفسار عن الوظيفة
                                </h2>
                                <div class="py-2 px-6 text-justify">
                                    <form action="{{route('job.inquire.store',$job)}}" method="post" class="text-center">
                                        @csrf
                                        <label for="text">
                                    <textarea name="message" id="" cols="50"
                                              rows="3"
                                              class="border border-gray-300 w-11/12 md:w-1/2 text-sm rounded-sm
                                              bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"></textarea>
                                        </label>
                                        <div class="py-2">
                                            <button class=" text-sm text-white w-11/12 md:w-1/2 font-semibold rounded py-2 px-16 ml-2 bg-blue-900
                     hover:text-white border hover:border-gray-400">
                                                إرسال
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--End Inquire about the job--}}
                        @endif
                    </div>
                </div>
                {{--End Job Description & Requirement--}}
            </div>
        </div>
    </main>
@endsection
