@extends('layouts.app')
@section('content')
    <div class="text-center bg-white rounded-lg md:w-1/2 m-auto ">
        <header>
            <h2 class="rounded-t-lg text-gray-800 uppercase text-center tracking-wide
                text-xl font-semibold mb-2 py-1 bg-gray-100">إضافة عمل </h2>
        </header>

        @if(Session::has('failed'))
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                <p class="font-bold">{{Session::get('failed')}}</p>
            </div>
        @endif
        <form action="{{route('job.store',auth()->guard('employer')->user())}}" method="post" class="px-4 py-2" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
            <div>

                <div class="py-1">
                    <label for="title">العنوان</label>
                    <div class="pt-3">
                        <input type="text" required name="title"
                               value="{{old('title')}}"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('title')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('title') }}</span>
                    @enderror
                </div>


                <div class="py-1">
                    <label for="region">المحافظة</label>
                    <div class="pt-3">
                        <select required name="region"
                                class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>اختر المحافظة</option>
                            @foreach($regions as $region)
                                <option value="{{$region->id}}" {{old('region') == $region->id ? 'selected' : ''}}>{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('region')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('region') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="category">المجال</label>
                    <div class="pt-3">
                        <select required name="category"
                                class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option class="text-gray-500" value="" disabled selected>كل المجالات</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('category') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="category">نوع الوظيفة</label>
                    <div class="pt-3">
                        <select required name="jobType"

                                class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option selected disabled>- نوع الوظيفة -</option>
                            <option value="1" {{old('jobType') == 1 ? 'selected' : ''}}>دوام كامل</option>
                            <option value="2" {{old('jobType') == 2 ? 'selected' : ''}}>دوام جزئي</option>
                            <option value="3" {{old('jobType') == 3 ? 'selected' : ''}}>عن بعد</option>
                        </select>

                    </div>
                    @error('jobType')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('jobType') }}</span>
                    @enderror
                </div>

                <div class="py-1">
                    <label for="category">الفئة المستهدفة</label>
                    <div class="pt-3">
                        <select  name="for" required

                                class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option selected disabled>- الفئة المستهدفة -</option>
                            <option value="1" {{old('for') == 1 ? 'selected' : ''}}>أشخاص</option>
                            <option value="2" {{old('for') == 2 ? 'selected' : ''}}>فرق</option>
                        </select>

                    </div>
                    @error('for')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('for') }}</span>
                    @enderror
                </div>

                <div class="py-1">
                    <label for="category">نوع الراتب</label>
                    <div class="pt-3">
                        <select  name="salary_type" required

                                class="border border-gray-300 w-full text-sm rounded-sm px-2 py-1.5 focus:outline-none focus:border-blue-900">
                            <option selected disabled>- نوع الراتب -</option>
                            <option value="1" {{old('salary_type') == 1 ? 'selected' : ''}}>ثابت</option>
                            <option value="2" {{old('salary_type') == 2 ? 'selected' : ''}}>بالساعة</option>
                        </select>

                    </div>
                    @error('salary_type')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('salary_type') }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="title">الراتب</label>
                    <div class="pt-3">
                        <input type="number" name="salary_amount" required  step="0.01" min="0.01"
                               value="{{old('salary_amount')}}"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('salary_amount')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('salary_amount') }}</span>
                    @enderror
                </div>

                <div class="py-2">
                    <label for="email">الوصف الوظيفي...</label>
                    <div class="pt-3">
                            <textarea  name="description" id="" cols="30" required rows="5"
                                       class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <span style="color: red;margin-right: 10px">{{ $errors->first('description') }}</span>
                    @enderror
                </div>

                <div class="py-2">
                    <label for="email">المتطلبات...</label>
                    <div class="pt-3">
                            <textarea  name="requirement" id="" cols="30" required rows="5"
                                       class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">{{old('requirement')}}</textarea>
                    </div>
                    @error('requirement')
                    <span style="color: red;margin-right: 10px">{{ $errors->first('requirement') }}</span>
                    @enderror
                </div>

                <div class="py-1">
                    <label for="title">اخر موعد للتقديم</label>
                    <div class="pt-3">
                        <input type="date" name="last_date" required  step="0.01" min="0.01"
                               value="{{old('last_date')}}"
                               class="border border-gray-300 w-full text-sm rounded-sm bg-gray-100 px-3 py-1.5 focus:outline-none focus:border-blue-900">
                    </div>
                    @error('last_date')
                    <span style="color: red; margin-right: 10px">{{ $errors->first('last_date') }}</span>
                    @enderror
                </div>




            <div class="py-2">
                <button class=" text-sm text-white font-semibold rounded py-2 px-16 ml-2 bg-blue-900
                     hover:text-white border hover:border-gray-400">
                    إضافة
                </button>
            </div>
        </form>
    </div>
@endsection
