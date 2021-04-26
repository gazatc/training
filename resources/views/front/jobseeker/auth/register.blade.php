@extends('layouts.app')
@section('content')
    <div class="text-center bg-white rounded-lg md:w-1/2 m-auto ">
        <header>
            <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide
                text-xl font-semibold mb-2 py-1 bg-gray-100">تسجيل كباحث عن عمل / متدرب</h2>
        </header>

        <form action="{{route('job-sekeer.register')}}" method="post" class="px-4 py-2" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
            <div>
                <header class="text-right bg-blue-200 py-2 px-2 rounded">
                    <p class="text-xl font-semibold">بيانات الرئيسية</p>
                </header>
                <div class="py-1">
                    <label for="username">اسم المستخدم</label>
                    <div class="pt-3">
                        <input type="text" required name="username"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-1">
                    <label for="email">البريد الالكتروني</label>
                    <div class="pt-3">
                        <input type="text" required name="email"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-1">
                    <label for="firstName">الاسم الاول</label>
                    <div class="pt-3">
                        <input type="text" required name="firstName"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-1">
                    <label for="lastName">الاسم الاخير</label>
                    <div class="pt-3">
                        <input type="text" required name="lastName"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>

                <div class="py-1">
                    <label for="password">كلمة المرور</label>
                    <div class="pt-3">
                        <input type="password" required name="password"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-2">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <div class="pt-3">
                        <input type="password" required name="password_confirmation"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>


            </div>
            <div>
                <header class="text-right  bg-blue-200 py-2 px-2 rounded">
                    <p class="text-xl font-semibold">بيانات الحساب</p>
                </header>
                <div class="py-3">
                    <div class="flex w-full  items-center justify-center bg-grey-lighter">
                        <label
                            class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-white hover:text-blue-900">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                            </svg>
                            <span class="mt-2 text-base leading-normal">اختيار صورة</span>
                            <input type='file' name="avatar" class="hidden"/>
                        </label>
                    </div>
                </div>
                <div class="py-1">
                    <label for="region">المحافظة</label>
                    <div class="pt-3">
                        <select required name="region"
                            class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>اختر المحافظة</option>
                            @foreach($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="py-1">
                    <label for="category">المجال</label>
                    <div class="pt-3">
                        <select required name="category"
                            class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>كل المجالات</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="py-1">
                    <label for="phone">رقم الهاتف</label>
                    <div class="pt-3">
                        <input type="text" required name="phone"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-1">
                    <label for="age">العمر</label>
                    <div class="pt-3">
                        <input type="number"minlength="1" maxlength="3" required name="age"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>
                <div class="py-1">
                    <label for="degree">المستوى الدراسي</label>
                    <div class="pt-3">
                        <input type="text" required name="degree"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>

                <div class="py-2">
                    <label for="email">نبذة</label>
                    <div class="pt-3">
                            <textarea  name="bio" id="" cols="30" required rows="5"
                                      class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"></textarea>
                    </div>
                </div>
                <div class="py-2">
                    <label for="email">مهارات</label>
                    <div class="pt-3">
                            <textarea  name="skills" id="" cols="30" required rows="5"
                                      class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"></textarea>
                    </div>
                </div>

            </div>


            <div class="py-2">
                <input type="checkbox" class="px-2" required>أوافق على الشروط والأحكام وسياسة الخصوصية
            </div>
            <div class="py-2">
                <button class=" text-sm text-white font-semibold rounded py-2 px-16 ml-2 bg-blue-900
                     hover:text-white border hover:border-gray-400">
                    تسجيل
                </button>
            </div>
        </form>
    </div>
@endsection
