@extends('layouts.app')
@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Job detail--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            تفاصيل التدريب</h2>
                        <div class="px-2 py-4">
                            <div>
                                <img class="m-auto rounded w-36 h-36"
                                     @if(!empty($training->employer->information->avatar))
                                     src="{{$training->employer->information->avatar}}"
                                     @else
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                     @endif
                                     alt="">
                                <div class="flex justify-center mt-2 font-semibold text-xl">{{$training->title}}</div>
                                <div class="text-base mt-1">
                                    <a href="" class="flex items-center justify-center">

                                        <span class="text-blue-500 mr-1">{{$training->employer->name}}</span>
                                        @if($training->employer->verified == 1)
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
                                    <span class="mr-1">{{$training->employer->information->category->name}}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64">
                                        <path
                                            d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path>
                                    </svg>
                                    <span class="mr-1">{{$training->employer->information->region->name}}</span>
                                </div>
                            </div>

                            <hr class="my-2">
                            <div>
                                <h3 class="inline font-semibold">آخر موعد للتقديم : </h3><span
                                    class="text-sm">{{$training->last_date}}</span>
                                @if(Session::has('success'))
                                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                         role="alert">
                                        <p class="font-bold">{{Session::get('success')}}</p>
                                    </div>
                                @endif
                                @if(auth()->guard('jobSeeker')->check())
                                @if($training->hasAttemptToThisTraining(auth()->guard('jobSeeker')->user()))
                                    <button
                                        class="mt-2 flex items-center justify-center bg-green-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-green-700 focus:ring-opacity-50">
                                        <span>تم ارسال طلب مسبقا </span>
                                    </button>
                                @else
                                    @if($training->last_date >= today()->toDateString())
                                        <form action="{{route('training.apply',$training)}}" method="post">
                                            @csrf
                                            <button
                                                class="mt-2 flex items-center justify-center bg-green-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-green-700 focus:ring-opacity-50">
                                                <span>التقدم للتدريب</span>
                                            </button>
                                        </form>
                                    @else
                                        <button disabled
                                                class="mt-2 flex items-center justify-center bg-red-700 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-opacity-50">
                                            <span>انتهى التقديم</span>
                                        </button>
                                    @endif
                                @endif

                                @else
                                    <span class="block text-red-600 pt-3">يرجى تسجيل الدخول للتقديم</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Job detail--}}

                {{--Start Job Description & Requirement--}}
                <div class="w-full lg:w-3/4">
                    @if(Session::has('success-message'))
                        <div
                            class="bg-blue-100 border-t border-b mt-6 lg:mt-0 lg:mr-8  border-blue-500 text-blue-700 px-4 py-3"
                            role="alert">
                            <p class="font-bold">{{Session::get('success-message')}}</p>
                        </div>
                    @endif
                    @if(Session::has('field'))
                        <div
                            class="bg-red-100 border-t border-b mt-6 lg:mt-0 lg:mr-8  border-red-500 text-red-700 px-4 py-3"
                            role="alert">
                            <p class="font-bold">{{Session::get('field')}}</p>
                        </div>
                    @endif
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="justify-between">
                            <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold mb-2 py-2 px-6 bg-gray-100 flex justify-between items-center">
                                <h2 class="">
                                    وصف التدريب
                                </h2>
                            </div>
                            <div class="py-2 px-6 text-justify">
                                <p>
                                    {{$training->description}}
                                </p>
                            </div>
                        </div>
                        {{--End Single Description--}}
                        {{--Start Job Requirement--}}
                        <div class="justify-between">
                            <h2 class="text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                متطلبات التدريب
                            </h2>
                            <div class="py-2 px-6 text-justify">
                                <p>
                                    {{$training->requirement}}
                                </p>
                            </div>
                        </div>
                        {{--End Single Requirement--}}

                        {{--Start Inquire about the job--}}
                        <div class="justify-between text-center">
                            <h2 class="text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold mb-2 py-2 px-6 bg-gray-100">
                                استفسار عن التدريب
                            </h2>
                            <div class="py-2 px-6 text-justify">
                                <form action="{{route('training.inquire.store',$training)}}" method="post"
                                      class="text-center">
                                    @csrf
                                    <label for="text">
                                    <textarea name="message" id="" cols="50"
                                              rows="3"
                                              class="border border-gray-300 w-1/2 text-sm rounded-sm
                                              bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"></textarea>
                                    </label>
                                    @error('message')
                                    <span class="block"
                                          style="color: red; margin-right: 10px">{{ $errors->first('message') }}</span>
                                    @enderror
                                    <div class="py-2">
                                        <button class=" text-sm text-white font-semibold rounded py-2 px-16 ml-2 bg-blue-900
                     hover:text-white border hover:border-gray-400">
                                            إرسال
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{--End Inquire about the job--}}
                    </div>
                </div>
                {{--End Job Description & Requirement--}}
            </div>
        </div>
    </main>
@endsection
