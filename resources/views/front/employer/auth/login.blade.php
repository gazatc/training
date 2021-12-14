@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center">
        <div class="text-center md:w-1/3  bg-white rounded-lg ">
            <header>
                <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide
                text-xl font-semibold mb-2 py-1 bg-gray-100">تسجيل الدخول</h2>
            </header>
            <form action="{{route('employer.login')}}" class="px-4 py-2" method="post">
                @csrf
                @error('email')
                <span style="color: red; margin-right: 10px">{{ $message }}</span>
                @enderror

                <div class="py-2">
                    <label for="email">البريد الالكتروني</label>
                    <div class="pt-3">
                        <input type="email" required name="email"
                               class="border border-gray-300 @error('email') border-red-500 @enderror w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-2">
                    <label for="password">كلمة المرور</label>
                    <div class="pt-3">
                        <input type="password" required name="password"
                               class="border border-gray-300 @error('email') border-red-500 @enderror w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-2">
                    <div>
                        <input type="checkbox"> تذكرني
                    </div>
                </div>
                <div class="py-2">
                    <button class="bg-white text-sm text-blue-900 font-semibold rounded py-2 px-10 ml-2 hover:bg-blue-900
                     hover:text-white border hover:border-white">
                        تسجيل الدخول
                    </button>
                </div>
            </form>
            <hr>
            <footer>
                <div class="h-32 py-5">
                    <p>ليس لديك حساب؟ </p>
                    <div class="mt-5">
                        <a href="{{route('employer.register_form')}}" class="bg-green-900 text-sm text-white font-semibold rounded py-2 px-10  hover:bg-white
                     hover:text-green-900 border hover:border-white">إنشاء حساب</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
