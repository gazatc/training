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

                                <a href=""
                                   class="flex rounded py-2 hover:bg-gray-200 border-r-4 border-blue-900 text-blue-900">
                                    <span class="mr-1 w-full text-right px-4">عن الشركة/المؤسسة</span>
                                </a>
                                <hr>
                                <a href="{{route('job.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">الوظائف</span>
                                </a>
                                <hr>
                                <a href="{{route('training.index')}}" class="flex rounded py-2 hover:bg-gray-200">
                                    <span class="mr-1 w-full text-right px-4">التدريب</span>
                                </a> <hr>
                                <a href="{{route('employer.verify.create')}}" class="flex rounded py-2 hover:bg-gray-200">
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
                        <div class="bg-blue-100 border-t border-b mt-6 lg:mt-0 lg:mr-8  border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">{{Session::get('success')}}</p>
                        </div>
                    @endif
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold   bg-gray-100 flex justify-between items-center">
                            <h2 class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide text-lg font-semibold   py-2 px-6 bg-gray-100">
                                عن الشركة/المؤسسة
                            </h2>
                            <a href="{{route('employer.profile.edit')}}" class=" py-2 px-6 hover:test-blue-500 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                            <div class="py-2 px-6 mb-2">
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">من نحن:</h2>
                                    <p class="mt-2 text-justify">
                                        {{$employer->information->bio}}
                                    </p>
                                </div>

                                <hr class="my-4">
                                <div class="grid lg:grid-cols-3 grid-cols-1 gap-4">
                                    <div>
                                        <span class="text-base font-semibold">المجال : </span>
                                        <span class="text-sm">{{$employer->information->category->name}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">النوع : </span>
                                        <span class="text-sm">{{$employer->information->type}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">تأسست عام : </span>
                                        <span class="text-sm">{{$employer->information->year}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">المحافظة : </span>
                                        <span class="text-sm">{{$employer->information->region->name}}</span>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <span class="text-base font-semibold">العنوان : </span>
                                        <span class="text-sm">{{$employer->information->address}}</span>
                                    </div>
                                    <div>
                                        <span class="text-base font-semibold">التلفون : </span>
                                        <span class="text-sm">{{$employer->information->phone}}</span>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <span class="text-base font-semibold">الايميل : </span>
                                        <span class="text-sm">{{$employer->email}}</span>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div>
                                    <h2 class="text-base font-semibold border-r-4 border-blue-900 pr-2">إبقَ على تواصل
                                        دائم معنا من خلال : </h2>
                                    <div class="flex mt-4 gap-x-3">

                                        @if(empty($employer->socials->web)
                                          && empty($employer->socials->linkedin)
                                          && empty($employer->socials->facebook)
                                          && empty($employer->socials->twitter) )
                                            <span>لا يوجد</span>
                                        @endif
                                        @if(!empty($employer->socials->web))
                                            <a href="{{$employer->socials->web}}" target="_blank"
                                               class="flex p-3 justify-center bg-gray-600 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 92">
                                                    <path id="XMLID_1666_"
                                                          d="M46 0C20.6 0 0 20.6 0 46s20.6 46 46 46 46-20.6 46-46S71.4 0 46 0zm3.7 83.8c-.2 0-.4 0-.7.1V62.2c5.2-.1 9.9-.2 14.2-.5-3.8 11.7-10.9 19.5-13.5 22.1zm-7.4 0c-2.7-2.7-9.7-10.5-13.5-22.1 4.2.3 9 .5 14.2.5v21.7c-.2 0-.4-.1-.7-.1zM8 46c0-2.5.3-5 .7-7.4 2.2-.4 6.4-1 12.3-1.6-.5 2.9-.8 5.9-.8 9.1 0 3.2.3 6.2.7 9-5.8-.6-10.1-1.2-12.3-1.6-.3-2.5-.6-5-.6-7.5zm18.3 0c0-3.4.4-6.6 1-9.6 4.6-.3 9.8-.6 15.7-.6v20.4c-5.8-.1-11.1-.3-15.8-.7-.5-2.9-.9-6.1-.9-9.5zM49.6 8.2c2.7 2.7 9.6 10.7 13.5 22.1-4.2-.3-8.9-.5-14.1-.5V8.1c.2 0 .4.1.6.1zM43 8.1v21.7c-5.2.1-9.9.2-14.1.5 3.8-11.4 10.8-19.4 13.4-22.1.3 0 .5-.1.7-.1zm6 48.1V35.8c5.8.1 11.1.3 15.7.6.6 3 1 6.2 1 9.6 0 3.4-.3 6.6-.9 9.6-4.6.3-9.9.5-15.8.6zM70.9 37c5.9.6 10.1 1.2 12.3 1.6.5 2.4.8 4.9.8 7.4s-.3 5-.7 7.4c-2.2.4-6.4 1-12.3 1.6.5-2.9.7-5.9.7-9.1 0-3-.3-6.1-.8-8.9zm10.5-4.8c-2.8-.4-6.8-.9-11.9-1.4-2.4-8.6-6.6-15.5-10.1-20.4 10.1 3.8 18.1 11.8 22 21.8zM32.6 10.4c-3.6 4.8-7.7 11.7-10.1 20.3-5 .4-9 1-11.9 1.4 3.9-9.9 12-17.9 22-21.7zm-22 49.4c2.8.4 6.8.9 11.8 1.4 2.4 8.6 6.4 15.5 10 20.3-10-3.9-17.9-11.8-21.8-21.7zm49 21.7c3.6-4.8 7.6-11.6 10-20.2 5-.4 9-1 11.8-1.4-3.9 9.8-11.8 17.7-21.8 21.6z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if(!empty($employer->socials->linkedin))

                                            <a href="{{$employer->socials->linkedin}}" target="_blank"
                                               class="flex p-3 justify-center bg-blue-900 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                    <path
                                                        d="M32 31.292V19.46c0-6.34-3.384-9.29-7.896-9.29-3.641 0-5.273 2.003-6.182 3.409v-2.924h-6.86c.091 1.937 0 20.637 0 20.637h6.86V19.767c0-.615.044-1.232.226-1.672.495-1.233 1.624-2.509 3.518-2.509 2.483 0 3.475 1.892 3.475 4.666v11.041H32v-.001zM3.835 7.838c2.391 0 3.882-1.586 3.882-3.567C7.673 2.247 6.227.707 3.881.707S0 2.246 0 4.271c0 1.981 1.489 3.567 3.792 3.567h.043zm3.43 23.454V10.655H.406v20.637h6.859z"
                                                        id="Flat_copy"></path>
                                                </svg>
                                            </a>
                                        @endif

                                        @if(!empty($employer->socials->facebook))

                                            <a href="{{$employer->socials->facebook}}" target="_blank"
                                               class="flex p-3 justify-center bg-blue-600 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                     xml:space="preserve"><path
                                                        d="M11.848 32h6.612V15.998h4.411l.584-5.514H18.46l.007-2.761c0-1.437.137-2.209 2.2-2.209h2.757V0h-4.412c-5.299 0-7.164 2.675-7.164 7.174v3.311H8.545V16h3.303v16z"
                                                        id="Full_copy"></path></svg>
                                            </a>
                                        @endif
                                        @if(!empty($employer->socials->twitter))

                                            <a href="{{$employer->socials->twitter}}" target="_blank"
                                               class="flex p-3 justify-center bg-blue-400 rounded-xl">
                                                <svg class="w-5 h-5 text-white fill-current"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 24">
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
                </div>
                {{--End Employer Description --}}
            </div>
        </div>
    </main>
@endsection
