@extends('layouts.app')
@section('content')
    <div class="text-center bg-white rounded-lg md:w-1/2 m-auto ">
        <header>
            <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide
                text-xl font-semibold mb-2 py-1 bg-gray-100">تسجيل كباحث عن عمل</h2>
        </header>

        <form action="{{route('jobSeeker.register')}}" method="post" class="px-4 py-2" enctype="multipart/form-data">
            @csrf
            {{--@if ($errors->any())--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<div>{{$error}}</div>--}}
                {{--@endforeach--}}
            {{--@endif--}}
            <div>
                <header class="text-right bg-blue-200 py-2 px-2 rounded">
                    <p class="text-xl font-semibold">البيانات الرئيسية</p>
                </header>
                <div class="py-1">
                    <label for="username">اسم المستخدم</label>
                    <div class="pt-3">
                        <input type="text" required name="username"
                               class="border @error('username') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900"
                                value="{{ old('username') }}"
                        >
                    </div>
                    @error('username')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('username') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="email">البريد الالكتروني</label>
                    <div class="pt-3">
                        <input type="text" required name="email"
                               value="{{ old('email') }}"
                               class="border @error('email') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('email')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="firstName">الاسم الاول</label>
                    <div class="pt-3">
                        <input type="text" required name="firstName"
                               value="{{ old('firstName') }}"
                               class="border @error('firstName') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('firstName')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('firstName') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="lastName">الاسم الاخير</label>
                    <div class="pt-3">
                        <input type="text" required name="lastName"
                               value="{{ old('lastName') }}"
                               class="border @error('lastName') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('lastName')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('lastName') }}</span>
                    @enderror
                </div>

                <div class="py-1">
                    <label for="password">كلمة المرور</label>
                    <div class="pt-3">
                        <input type="password" required name="password"
                               class="border @error('password') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('password')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('password') }}</span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <div class="pt-3">
                        <input type="password" required name="password_confirmation"
                               class="border @error('password') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                </div>


            </div>
            <div>
                <header class="text-right  bg-blue-200 py-2 px-2 rounded">
                    <p class="text-xl font-semibold">بيانات الحساب</p>
                </header>
                <div class="py-3" x-data="imageViewer()">
                    <div class="flex w-full  items-center justify-center bg-grey-lighter">
                        <label
                                class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-white hover:text-blue-900">
                            <template x-if="!imageUrl">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"></path>
                                </svg>
                            </template>
                            <template x-if="imageUrl">
                                <img :src="imageUrl"  alt="">
                            </template>
                            <span class="mt-2 text-base leading-normal">اختيار صورة</span>
                            <input type='file' name="avatar" class="hidden" accept="image/*" @change="fileChosen"/>
                        </label>
                        @error('avatar')
                        <span class="block"
                              style="color: red; margin-right: 10px">{{ $errors->first('avatar') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="py-1">
                    <label for="region">المحافظة</label>
                    <div class="pt-3">
                        <select required name="region"
                            class="border @error('region') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>اختر المحافظة</option>
                            @foreach($regions as $region)
                                <option value="{{$region->id}}" {{old('region') == $region->id ? 'selected' : ''}}>{{$region->name}}</option>
                            @endforeach
                        </select>
                        @error('region')
                        <span class="block"
                              style="color: red; margin-right: 10px">{{ $errors->first('region') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="py-1">
                    <label for="category">المجال</label>
                    <div class="pt-3">
                        <select required name="category"
                            class="border @error('category') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>كل المجالات</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="block"
                              style="color: red; margin-right: 10px">{{ $errors->first('category') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="py-1">
                    <label for="phone">رقم الهاتف</label>
                    <div class="pt-3">
                        <input type="text" required name="phone"
                               value="{{ old(('phone')) }}"
                               class="border @error('phone') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('phone')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('phone') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="age">العمر</label>
                    <div class="pt-3">
                        <input type="number"minlength="1" maxlength="3" required name="age"
                               value="{{ old(('age')) }}"
                               class="border @error('age') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('age')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('age') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="degree">المستوى الدراسي</label>
                    <div class="pt-3">
                        <input type="text" required name="degree"
                               value="{{ old(('degree')) }}"
                               class="border @error('degree') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('degree')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('degree') }}</span>
                    @enderror
                </div>

                <div class="py-2">
                    <label for="email">النبذة</label>
                    <div class="pt-3">
                            <textarea  name="bio" id="" cols="30" required rows="5"
                                      class="border @error('bio') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">{{ old(('bio')) }}</textarea>
                    </div>
                    @error('bio')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('bio') }}</span>
                    @enderror
                </div>
                <div class="py-2">
                    <label for="email">المهارات</label>
                    <div class="pt-3">
                            <textarea  name="skills" id="" cols="30" required rows="5"
                                      class="border @error('skills') border-red-500 @enderror border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">{{ old(('skills')) }}</textarea>
                    </div>
                    @error('skills')
                    <span class="block"
                          style="color: red; margin-right: 10px">{{ $errors->first('skills') }}</span>
                    @enderror
                </div>

            </div>


            <div class="py-2">
                <input type="checkbox" class="px-2 ml-2" required>أوافق على الشروط والأحكام وسياسة الخصوصية
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
