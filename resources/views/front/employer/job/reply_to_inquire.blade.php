@extends('layouts.app')

@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4 ">
            @if(Session::has('success'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">{{Session::get('success')}}</p>
                </div>
            @endif
            <form action="{{route('job.submit_reply_to_this_inquire',$inquire)}}" class="px-4 py-2" method="post">
                @csrf
                <div class="py-2">
                   <span>اسم المرسل: </span>
                    <span class="block">
                        {{$inquire->jobSeeker->name}}
                    </span>
                </div>

                <div class="py-2">
                    <span>الرسالة المرسلة:</span>
                    <span class="block">
                        {{$inquire->message}}
                    </span>
                </div>
                <div class="py-2">
                    <label for="reply">الرد على الرسالة</label>
                    <div class="pt-3">
                        <textarea name="reply" id="reply" cols="30" rows="5" class="border border-gray-300 @error('password') border-red-500 @enderror w-full md:w-1/2 text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">{{$inquire->reply}}</textarea>
                    </div>
                </div>

                <div class="py-2">
                    <button class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-10 ml-2 hover:bg-blue-900
                     hover:text-white border hover:border-white">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
