@extends('layouts.app')
@section('content')
    <main class="py-6">
        <div class="container mx-auto px-4">
            <div class="flex justify-center border border-blue-900 py-6 bg-blue-900 rounded-lg">
                <span class="text-yellow-300 text-2xl font-semibold">» الوظائف «</span>
            </div>

            <div class="flex flex-wrap mt-6">
                {{--Start Filter--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-1 bg-gray-100">
                            البحث</h2>
                        <form action="{{route('jobs')}}" method="get" class="px-2 py-2">
                            <input type="text" name="employer" value="{{request()->employer}}" hidden>
                            <input
                                class="border border-gray-300 w-full text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                placeholder="إبحث عن وظيفة..."
                                value="{{ request()->search }}"
                                type="text" name="search">

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                الفئة المستهدفة:
                            </h2>
                            <div class="flex flex-col">

                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="target[]" value="1" class="form-checkbox h-3.5 w-3.5" {{ in_array(1, request()->target ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">اشخاص</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="target[]" value="2" class="form-checkbox h-3.5 w-3.5" {{ in_array(2, request()->target ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">فرق</span>
                                </label>
                            </div>
                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                النوع:
                            </h2>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center ml-4">
                                    <input type="checkbox" name="type[]" value="1" class="form-checkbox h-3.5 w-3.5 bg-red-500" {{ in_array(1, request()->type ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">دوام كامل</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="type[]" value="2" class="form-checkbox h-3.5 w-3.5" {{ in_array(2, request()->type ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">دوام جزئي</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="type[]" value="3" class="form-checkbox h-3.5 w-3.5" {{ in_array(3, request()->type ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">عن بعد</span>
                                </label>
                            </div>

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                المجال:
                            </h2>
                            <div class="flex flex-col">
                                <select name="category"
                                    class="border border-gray-300 w-full text-sm rounded-sm px-2 focus:outline-none focus:border-blue-900">
                                    <option class="text-gray-500"  disabled selected>كل المجالات</option>
                                    @foreach(\App\Category::all() as $category)
                                        <option value="{{$category->id}}" {{ request()->category == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                المحافظة:
                            </h2>
                            <div class="flex flex-col">
                                @foreach(\App\Region::all() as $region)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="region[]" value="{{$region->id}}" class="form-checkbox h-3.5 w-3.5" {{ in_array($region->id, request()->region ?? []) ? 'checked' : '' }}><span
                                        class="mr-2 text-sm text-gray-700">{{$region->name}}</span>
                                </label>
                                @endforeach

                            </div>

                            <hr class="my-2">

                            <button
                                class="flex items-center justify-center bg-blue-900 w-full text-sm text-white font-semibold rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-opacity-50">
                                <svg class="w-5 h-5 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24">
                                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                                    <path
                                        d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                </svg>
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
                        @foreach($jobs as $job)
                            <div
                                class="lg:flex items-center justify-between border-b py-4 px-6 hover:bg-gray-100 @if($loop->first)rounded-t-lg @elseif($loop->last) rounded-b-lg @endif">
                                <div class="flex">
                                    <img class="rounded w-24 h-24"
                                         @if(!empty($job->employer->information->avatar))
                                         src="{{$job->employer->information->avatar}}"
                                         @else
                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                         @endif
                                         alt="">
                                    <div class="mr-4">
                                        <div class="font-semibold text-xl">{{$job->title}}</div>
                                        <span
                                            class="text-xs mr-1">{{ date('Y/m/d', strtotime($job->created_at))}}</span>
                                        <div class="text-xs mt-1">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                     viewBox="0 0 25 25">
                                                    <path fill="#2b3344"
                                                          d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path>
                                                </svg>
                                                <a href="{{route('employer.show',$job->employer)}}"
                                                   class="mr-1 text-blue-500">{{$job->employer->name}}</a>
                                            </div>
                                        </div>
                                        <div class="flex text-xs mt-2">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                     viewBox="0 0 64 64">
                                                    <path fill="#222"
                                                          d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path>
                                                </svg>
                                                <span class="mr-1">{{$job->category->name}}</span>
                                            </div>
                                            <div class="flex mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                     viewBox="0 0 64 64">
                                                    <path
                                                        d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path>
                                                </svg>
                                                <span class="mr-1">{{$job->region->name}}</span>
                                            </div>
                                            <div class="flex mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                     viewBox="0 0 32 32">
                                                    <path
                                                        d="M14.5,12.071V8.5a.5.5,0,0,0-1,0v3.571A2,2,0,0,0,12,14a1.977,1.977,0,0,0,.284,1.01h0L8.646,18.646a.5.5,0,1,0,.707.707l3.637-3.636h0A1.978,1.978,0,0,0,14,16a2,2,0,0,0,.5-3.929ZM14,15a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm13.508,2.634A13.65,13.65,0,0,0,28,14,14,14,0,1,0,14,28a13.645,13.645,0,0,0,3.634-.492,7.5,7.5,0,1,0,9.874-9.874ZM14,27A13,13,0,1,1,27,14a12.681,12.681,0,0,1-.435,3.3A7.467,7.467,0,0,0,24.574,17,10.93,10.93,0,0,0,21.8,6.26a.454.454,0,0,0-.026-.038c-.011-.011-.026-.015-.038-.025a10.97,10.97,0,0,0-15.48,0c-.012.01-.027.014-.038.025A.454.454,0,0,0,6.2,6.26a10.97,10.97,0,0,0,0,15.48c.01.012.014.027.025.038s.026.015.038.025A10.933,10.933,0,0,0,17,24.575a7.466,7.466,0,0,0,.292,1.99A12.682,12.682,0,0,1,14,27Zm3.074-3.493a10,10,0,0,1-2.574.471V22.5a.5.5,0,0,0-1,0v1.476A9.9,9.9,0,0,1,7.3,21.4l.331-.331a.5.5,0,0,0-.707-.707L6.6,20.7a9.9,9.9,0,0,1-2.573-6.2H5.5a.5.5,0,0,0,0-1H4.024A9.9,9.9,0,0,1,6.6,7.3l.332.332a.5.5,0,0,0,.707-.707L7.3,6.6a9.9,9.9,0,0,1,6.2-2.573V5.5a.5.5,0,0,0,1,0V4.024A9.9,9.9,0,0,1,20.7,6.6l-.332.332a.5.5,0,1,0,.707.707L21.4,7.3a9.9,9.9,0,0,1,2.573,6.2H22.5a.5.5,0,0,0,0,1h1.479a10.014,10.014,0,0,1-.47,2.573A7.5,7.5,0,0,0,17.074,23.507ZM24.5,31A6.508,6.508,0,0,1,18,24.5c0-.2.012-.388.029-.58v0a6.507,6.507,0,0,1,5.88-5.888h.018c.189-.017.379-.029.573-.029a6.5,6.5,0,0,1,0,13ZM27,22.5a2.5,2.5,0,1,0-3.985,2,2.5,2.5,0,1,0,2.97,0A2.49,2.49,0,0,0,27,22.5Zm-1,4A1.5,1.5,0,1,1,24.5,25,1.5,1.5,0,0,1,26,26.5ZM24.5,24A1.5,1.5,0,1,1,26,22.5,1.5,1.5,0,0,1,24.5,24Z"></path>
                                                </svg>
                                                <span class="mr-1">
                                                    {{$job->getJobTypeTextAttribute()}}
                                                </span>
                                            </div>
                                            <div class="flex mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24">
                                                    <path d="M23,11H21.421A9.57,9.57,0,0,0,13,2.51V1a1,1,0,0,0-2,0V2.491A9.57,9.57,0,0,0,2.416,11H1a1,1,0,0,0,0,2H2.416A9.57,9.57,0,0,0,11,21.509V23a1,1,0,0,0,2,0V21.49A9.57,9.57,0,0,0,21.421,13H23a1,1,0,0,0,0-2ZM13,19.469V18a1,1,0,0,0-2,0v1.494A7.563,7.563,0,0,1,4.437,13H6a1,1,0,0,0,0-2H4.437A7.563,7.563,0,0,1,11,4.506V6a1,1,0,0,0,2,0V4.531A7.562,7.562,0,0,1,19.4,11H18a1,1,0,0,0,0,2h1.4A7.562,7.562,0,0,1,13,19.469Z"></path><path d="M12,9a3,3,0,1,0,3,3A3,3,0,0,0,12,9Zm0,4a1,1,0,1,1,1-1A1,1,0,0,1,12,13Z"></path>
                                                </svg>
                                                <span class="mr-1">
                                                    {{$job->getForTextAttribute()}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($job->hasAttemptToThisJob(@auth()->guard('jobSeeker')->user()))
                                    <div class="flex items-center justify-center mt-4 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4 text-green-900 fill-current"
                                             viewBox="0 0 60 60">
                                            <path
                                                d="M30,6C16.7666016,6,6,16.7666016,6,30s10.7666016,24,24,24s24-10.7666016,24-24S43.2333984,6,30,6z M30,52 C17.8691406,52,8,42.1308594,8,30S17.8691406,8,30,8s22,9.8691406,22,22S42.1308594,52,30,52z"></path>
                                            <polygon
                                                points="25.608 36.577 19.116 30.086 17.702 31.5 25.608 39.405 42.298 22.715 40.884 21.301"></polygon>
                                        </svg>
                                        <span class="text-sm text-green-900 font-semibold">تم التقدم للوظيفة</span>
                                    </div>
                                @endif
                                <form action="{{route('job.show',$job)}}" method="get">
                                    @csrf

                                    <button
                                        class="flex items-center w-full lg:w-auto mt-4 lg:mt-0 justify-center rounded bg-green-500 text-white font-semibold text-sm py-2 px-4 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                        <span>مزيد من التفاصيل</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="text-white font-bold fill-current w-5 h-5 mr-1" viewBox="0 0 24 24">
                                            <path
                                                d="M11.3,12l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-4.2,4.2l0,0c-0.4,0.4-0.4,1,0,1.4l4.2,4.2c0.2,0.2,0.4,0.3,0.7,0.3l0,0c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L11.3,12z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                        {{--End Single Job--}}
                        {{$jobs->links()}}
                    </div>
                </div>
                {{--End Jobs Menu--}}
            </div>
        </div>
    </main>

@endsection
