@extends('layouts.app')
@section('content')
    <main class="py-6">
        <div class="container mx-auto px-4">
            <div class="flex justify-center border border-blue-900 py-6 bg-blue-900 rounded-lg">
                <span class="text-yellow-300 text-2xl font-semibold">» الباحثين عن عمل «</span>
            </div>

            <div class="flex flex-wrap mt-6">
                {{--Start Filter--}}
                <div class="w-full lg:w-1/4">
                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-1 bg-gray-100">
                            البحث
                        </h2>
                        <form action="{{route('jobSeekers')}}" method="get" class="px-2 py-2">
                            <input
                                    class="border border-gray-300 w-full text-sm rounded-sm px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                    placeholder="إبحث عن باحث عن عمل..."
                                    value="{{ request()->search }}"
                                    type="text" name="search">

                            <hr class="my-2">

                            <h2 class="text-blue-900 border-r-4 pr-1 border-blue-900 uppercase text-right text-base tracking-wide font-semibold my-2">
                                المجال:
                            </h2>
                            <div class="flex flex-col">
                                <select name="category"
                                        class="border border-gray-300 w-full text-sm rounded-sm px-2 focus:outline-none focus:border-blue-900">
                                    <option class="text-gray-500" disabled selected>كل المجالات</option>
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
                                        <input type="checkbox" name="region[]" value="{{$region->id}}"
                                               class="form-checkbox h-3.5 w-3.5" {{ in_array($region->id, request()->region ?? []) ? 'checked' : '' }}><span
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

                {{--Start Employers Menu--}}
                <div class="w-full lg:w-3/4">
                    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Single Employer--}}
                        @forelse($jobSeekers as $jobSeeker)

                            <div class="shadow-lg bg-white rounded-lg border border-gray-300 hover:bg-gray-100">

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
                                                {{--<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 25 25"><path fill="#2b3344" d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path></svg>--}}
                                                <span class="text-blue-500 mr-1">{{$jobSeeker->name}}</span>
                                                @if($jobSeeker->verified == 1)
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
                                        <div class="flex text-sm text-center justify-center items-center">
                                            {{--<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64"><path fill="#222" d="M49.24,24.26V39.74a9.51,9.51,0,0,1-9.5,9.5H24.26a9.51,9.51,0,0,1-9.5-9.5V24.26a9.51,9.51,0,0,1,9.5-9.5H39.74A9.51,9.51,0,0,1,49.24,24.26Z"></path></svg>--}}
                                            <span class="mr-1">{{$jobSeeker->information->category->name}}</span>
                                        </div>
                                        <div class="flex text-center text-sm items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 64 64">
                                                <path
                                                        d="M 32 10.328125 C 23.715733 10.328125 17 17.043817 17 25.328125 C 17 31.933454 26.537074 46.441396 30.402344 52.050781 C 31.274069 53.315902 32.72598 53.315827 33.597656 52.050781 C 37.462869 46.441509 47 31.933529 47 25.328125 C 47 17.043817 40.284274 10.328125 32 10.328125 z M 32 17.328125 A 7.9999992 7.9999992 0 0 1 40 25.328125 A 7.9999992 7.9999992 0 0 1 32 33.328125 A 7.9999992 7.9999992 0 0 1 24 25.328125 A 7.9999992 7.9999992 0 0 1 32 17.328125 z "></path>
                                            </svg>
                                            <span class="">{{$jobSeeker->information->region->name}}</span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @empty

                            {{--End Single Employer--}}
                    </div>
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        <div class="text-center py-2">
                            <p>لا يوجد باحثين عن عمل حاليا</p>
                        </div>
                    </div>
                    @endforelse

                </div>
                <div dir="ltr" class="mt-3 px-8">
                    {{$jobSeekers->appends(request()->query())->links('pagination::tailwind')}}
                </div>
                {{--End Employers Menu--}}
            </div>
        </div>
    </main>
@endsection
