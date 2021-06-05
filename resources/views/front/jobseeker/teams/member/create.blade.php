@extends('layouts.app')
@section('content')
    <main class="py-6">
        <div class="container mx-auto px-4">

            <div class="flex flex-wrap">

                {{--Start Job-seeker Description --}}
                <div class="w-full lg:w-full">
                    {{--Start Job Description--}}
                    <div class="shadow-lg bg-white rounded-lg border border-gray-300 mt-6 lg:mt-0 lg:mr-8">
                        {{--Start Job Description--}}
                        <div class="justify-between">
                            <div class="rounded-t-lg text-gray-800 font-bold uppercase tracking-wide
                        text-lg font-semibold mb-2 py-2 px-6 bg-gray-100 flex justify-between items-center">
                                <h2 class="">
                                    إضافة عضو
                                </h2>

                            </div>
                            <form action="{{route('teams.member.store')}}" method="post">
                                @csrf
                                <div class=" ">
                                    <div class="py-2 px-6 ">
                                        @if(Session::has('success'))
                                            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                                 role="alert">
                                                <p class="font-bold">{{Session::get('success')}}</p>
                                            </div>
                                        @endif
                                        @if(Session::has('fail'))
                                            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3"
                                                 role="alert">
                                                <p class="font-bold">{{Session::get('fail')}}</p>
                                            </div>
                                        @endif
                                        <div class="mt-2 text-justify">
                                            <div class="block my-2">
                                                <label for="">الرجاء ادخال اسم المستخدم او البريد الاكتروني </label>
                                            </div>
                                            <input name="user"
                                                   class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                   placeholder="" value=""
                                                   type="text">
                                        </div>
                                    </div>
                                    {{--  <div class="py-2 px-6 ">--}}
                                    {{--      <div class="mt-2 text-justify">--}}
                                    {{--          <div class="block my-2">--}}
                                    {{--              <label for="">نبذة عن الفريق</label>--}}
                                    {{--          </div>--}}
                                    {{--          <textarea name="bio"--}}
                                    {{--                    class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"--}}
                                    {{--                    placeholder="وصف الفريق" rows="5"--}}
                                    {{--          ></textarea>--}}
                                    {{--          @error('bio')--}}
                                    {{--          <span--}}
                                    {{--              style="color: red; margin-right: 10px">{{ $errors->first('bio') }}</span>--}}
                                    {{--          @enderror--}}
                                    {{--      </div>--}}
                                    {{--  </div>--}}
                                </div>
                                <div class="text-center my-5">
                                    <button type="submit" class="bg-blue-900 text-sm text-white font-semibold rounded py-2 w-1/2 ml-2 hover:bg-white
                                                                 hover:text-blue-900 border hover:border-white">
                                        حفظ
                                    </button>
                                </div>
                            </form>

                        </div>
                        {{--End Single Description--}}
                    </div>
                    {{--End Single Description--}}

                </div>
                {{--End Job-seeker Description --}}
            </div>
        </div>
    </main>
@endsection
