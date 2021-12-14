@extends('layouts.app')
@section('content')

    <main class="py-6">
        <div class="container mx-auto px-4   ">
            <div class="flex items-center justify-center">
                <div class="text-right md:w-1/2  bg-white rounded-lg ">
                    <header>
                        <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide
                text-xl font-semibold mb-2 py-1 bg-gray-100">تواصل معنا</h2>
                    </header>
                    @if(Session::has('success'))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">{{Session::get('success')}}</p>
                        </div>
                    @endif
                    <form action="{{ route('contact-send') }}" method="post" class="px-4 py-2">
                        @csrf
                        <div class="py-2">
                            <label for="email">الاسم</label>
                            <div class="pt-3">
                                <input type="text"
                                       name="title"
                                       class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                                @error('title')
                                <span class="block"
                                      style="color: red; margin-right: 10px">{{ $errors->first('title') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="py-2">
                            <label for="email">البريد الالكتروني</label>
                            <div class="pt-3">
                                <input type="email"
                                       name="email"
                                       class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                                @error('email')
                                <span class="block"
                                      style="color: red; margin-right: 10px">{{ $errors->first('email') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="py-2">
                            <label for="email">الرسالة</label>
                            <div class="pt-3">
                            <textarea name="message" id="" cols="30" rows="5"
                                      class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"></textarea>
                                @error('message')
                                <span class="block"
                                      style="color: red; margin-right: 10px">{{ $errors->first('message') }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="py-2 text-center">
                            <button class="bg-blue-900 text-sm text-white font-semibold rounded py-2 px-16 ml-2
                     hover:text-white border hover:border-gray-400">
                                إرسال
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
