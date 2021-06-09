@extends('layouts.app')
@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">
                {{--Start Employer detail--}}
                <div class="w-full lg:w-1/4">

                    <div class="bg-white rounded-lg border border-gray-300 shadow-lg">

                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide text-xl font-semibold mb-2 py-2 bg-gray-100">
                            بيانات الشركة/المؤسسة
                        </h2>
                        <div class="px-2 py-4">
                            <div>
                                <div class="m-auto w-36 h-36 relative">
                                    <img class="rounded w-36 h-36"
                                         @if(!empty($employer->information->avatar))
                                         src="{{$employer->information->avatar}}"
                                         @else
                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXp7vG6vsG3u77s8fTCxsnn7O/f5OfFyczP09bM0dO8wMPk6ezY3eDd4uXR1tnJzdBvAX/cAAACVElEQVR4nO3b23KDIBRA0ShGU0n0//+2KmO94gWZ8Zxmr7fmwWEHJsJUHw8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwO1MHHdn+L3rIoK6eshsNJ8kTaJI07fERPOO1Nc1vgQm2oiBTWJ+d8+CqV1heplLzMRNonED+4mg7L6p591FC+133/xCRNCtd3nL9BlxWP++MOaXFdEXFjZ7r8D9l45C8y6aG0cWtP/SUGhs2d8dA/ZfGgrzYX+TVqcTNRRO9l+fS5eSYzQs85psUcuzk6igcLoHPz2J8gvzWaH/JLS+95RfOD8o1p5CU5R7l5LkfKEp0mQ1UX7hsVXqDpRrifILD/3S9CfmlUQFhQfuFu0STTyJ8gsP3PH7GVxN1FC4t2sbBy4TNRTu7LyHJbqaqKFw+/Q0ncFloo7CjRPwMnCWqKXQZ75El4nKC9dmcJaou9AXOE5UXbi+RGeJygrz8Uf+GewSn9uXuplnWDZJ7d8f24F/s6iq0LYf9olbS3Q8i5oKrRu4S9ybwaQ/aCkqtP3I28QDgeoK7TBya/aXqL5COx67PTCD2grtdOwH+pQV2r0a7YVBgZoKwwIVFQYG6ikMDVRTGByopjD8ATcKb0UhhRTe77sKs2DV7FKSjId18TUEBYVyLhUThWfILHTDqmI85/2RWWjcE/bhP6OD7maT3h20MHsA47JC3PsW0wcwLhv9t0OOPOIkCn21y2bXXwlyylxiYMPk1SuCSmpfK8bNQvIrpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwNX4BCbAju9/X67UAAAAASUVORK5CYII="
                                         @endif
                                         alt=""
                                    >
                                    <svg
                                        class="text-green-500 fill-current w-6 h-6 absolute bottom-0 left-0 -ml-2 -mb-2"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                        <title>حساب موثق</title>
                                    </svg>
                                </div>
                                <div class="text-xl mt-2">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 25 25">
                                            <path fill="#2b3344"
                                                  d="M21.5,21H20V7.5A.49.49,0,0,0,19.66,7L16,5.47V21H15V3.5a.5.5,0,0,0-.5-.5h-9a.5.5,0,0,0-.5.5V21H3.5a.5.5,0,0,0,0,1h18a.5.5,0,0,0,0-1Zm-4-12h1a.5.5,0,0,1,.5.5.51.51,0,0,1-.5.5h-1a.51.51,0,0,1-.5-.5A.5.5,0,0,1,17.5,9Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3h1a.51.51,0,0,1,.5.5.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5A.51.51,0,0,1,17.5,15Zm0,3h1a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1ZM11,6h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1Zm0,3h1a.5.5,0,1,1,0,1H11a.5.5,0,0,1,0-1ZM7.94,6H9A.5.5,0,0,1,9,7h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm0,3H9a.5.5,0,0,1,0,1h-1a.5.5,0,0,1,0-1Zm2.56,6V19h-1v2h-1V18.47A.5.5,0,0,1,9,18h2a.5.5,0,0,1,.5.5V21Z"></path>
                                        </svg>
                                        <span class="text-blue-500 mr-1">{{$employer->name}}</span>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-center mt-2 font-semibold text-sm">{{$employer->information->category->name}}</div>
                            </div>

                            <hr class="my-2">
                            <div class="text-base rounded-lg font-semibold bg-gray-100">

                                <a href="{{route('employer.profile.index',$employer)}}"
                                   class="flex rounded py-2 hover:bg-gray-200  ">
                                    <span class="mr-1 w-full text-right px-4">عن الشركة/المؤسسة</span>
                                </a>
                                <hr>
                                <a href="{{route('job.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">الوظائف</span>
                                </a>
                                <hr>
                                <a href="{{route('training.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">التدريب</span>
                                </a>
                                <hr>
                                <a href="{{route('employer.verify.create')}}"
                                   class="flex rounded border-r-4 text-blue-900 border-blue-900 py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">طلبات توثيق الحساب</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Employer detail--}}

                {{--Start Employer Description --}}
                <div class="w-full lg:w-3/4">
                    @if(Session::has('success'))
                        <div
                            class="bg-blue-100 border-t border-b mt-6 lg:mt-0 lg:mr-8  border-blue-500 text-blue-700 px-4 py-3"
                            role="alert">
                            <p class="font-bold">{{Session::get('success')}}</p>
                        </div>
                    @endif
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold   bg-gray-100 flex justify-between items-center">
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold   py-2 px-6 bg-gray-100">
                                توثيق صاحب العمل
                            </h2>
                            {{--                            <a href="{{route('employer.profile.edit')}}" class=" py-2 px-6 hover:test-blue-500 ">--}}
                            {{--                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">--}}
                            {{--                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />--}}
                            {{--                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />--}}
                            {{--                                </svg>--}}
                            {{--                            </a>--}}
                        </div>
                        <div class="py-2 px-6 mb-2">
                            <form action="{{route('employer.verify.store',$employer)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div>

                                    <div class="mt-2 text-justify">
                                        <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">البيانات
                                            الرئيسية:</h2>

                                        <div class="block my-2">
                                            <label for="">رقم الهوية</label>
                                        </div>
                                        <input name="PID"
                                               class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                               placeholder="رقم الهوية" required value="{{@$employer->verify->PID}}"
                                               type="number">


                                        {{--                                        PID_image--}}
                                        {{--                                        PID_user_image--}}
                                        {{--                                        document--}}
                                        @error('PID')
                                        <span
                                            style="color: red; margin-right: 10px">{{ $errors->first('PID') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="">
                                    <div>
                                        <div class="mt-2 text-justify">
                                            <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">الوثائق
                                                المطلوية:</h2>

                                            <div class="block my-2">
                                                <label for="">صورة الهوية الشخصية</label>
                                            </div>
                                            <input name="PID_image"
                                                   class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                   placeholder="رقم الهوية" required value=""
                                                   type="file">
                                            @error('PID_image')
                                            <span
                                                style="color: red; margin-right: 10px">{{ $errors->first('PID_image') }}</span>
                                            @enderror
                                            @if(!empty($employer->verify->PID_image))
                                                <div class="py-2">
                                                    <span>الهوية السابقة: </span>
                                                    <a href="{{$employer->verify->PID_image}}"
                                                       target="_blank" class="text-blue-500 hover:text-blue-900">اضغط هنا</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-2 text-justify">

                                            <div class="block my-2">
                                                <label for="">صورة للشخص مع الهوية الشخصية</label>
                                            </div>
                                            <input name="PID_user_image"
                                                   class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                   placeholder="صورة للشخص مع الهوية الشخصية" required value=""
                                                   type="file">
                                            @error('PID_user_image')
                                            <span
                                                style="color: red; margin-right: 10px">{{ $errors->first('PID_user_image') }}</span>
                                            @enderror
                                            @if(!empty($employer->verify->PID_user_image))
                                                <div class="py-2">
                                                    <span>صورة للشخص مع الهوية الشخصية السابقة: </span>
                                                    <a href="{{$employer->verify->PID_user_image}}"
                                                       target="_blank" class="text-blue-500 hover:text-blue-900">اضغط هنا</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-2 text-justify">

                                            <div class="block my-2">
                                                <label for="">صورة وثيقة للشركة او المؤسسة</label>
                                            </div>
                                            <input name="document"
                                                   class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                   placeholder="صورة وثيقة للشركة او المؤسسة" required value=""
                                                   type="file">
                                            @error('document')
                                            <span
                                                style="color: red; margin-right: 10px">{{ $errors->first('document') }}</span>
                                            @enderror
                                            @if(!empty($employer->verify->document))
                                                <div class="py-2">
                                                    <span>صورة وثيقة للشركة او المؤسسة: </span>
                                                    <a href="{{$employer->verify->document}}"
                                                       target="_blank" class="text-blue-500 hover:text-blue-900">اضغط هنا</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="bg-blue-900 text-sm text-white font-semibold rounded py-2 w-1/2 ml-2 hover:bg-white
                     hover:text-blue-900 border hover:border-white">
                                        حفظ
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    {{--End Single Description--}}
                </div>
            </div>
            {{--End Employer Description --}}
        </div>
        </div>
    </main>
@endsection
