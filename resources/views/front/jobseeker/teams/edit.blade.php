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
                                    إنشاء فريق
                                </h2>
                            </div>
                            <form action="{{route('teams.update',$team)}}" method="post">
                                @csrf
                                <div class=" ">
                                    <div class="py-2 px-6 ">
                                        <div class="mt-2 text-justify">
                                            <div class="block my-2">
                                                <label for="">اسم الفريق </label>
                                            </div>
                                            <input name="name"
                                                   class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                   placeholder="الاسم" value="{{$team->name}}"
                                                   type="text">
                                            @error('name')
                                            <span
                                                style="color: red; margin-right: 10px">{{ $errors->first('name') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="py-2 px-6 ">
                                        <div class="mt-2 text-justify">
                                            <div class="block my-2">
                                                <label for="">نبذة عن الفريق</label>
                                            </div>
                                            <textarea name="bio"
                                                      class="border border-gray-300 w-full  text-sm rounded-sm px-3 py-2 focus:outline-none focus:border-blue-900"
                                                      placeholder="وصف الفريق" rows="5"
                                            >{{$team->bio}}</textarea>
                                            @error('bio')
                                            <span
                                                style="color: red; margin-right: 10px">{{ $errors->first('bio') }}</span>
                                            @enderror
                                        </div>
                                    </div>

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
