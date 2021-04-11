@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/bootstrap-fileinput.css')}}">
        <link href="{{asset('dashboard_files/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"
              rel="stylesheet"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>إضافة باحث عن عمل
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/jobSeekers') }}">الباحثين عن عمل</a></li>
                        <li class="breadcrumb-item active">إضافة</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>إضافة</strong> باحث عن عمل</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.jobSeekers.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية <span style="color: red">*</span></h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="اسم المستخدم" value="{{ old('username', '') }}">
                                            @error('username')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('username') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="الإيميل" value="{{ old('email', '') }}">
                                            @error('email')
                                            <span style="color: red;margin-right: 10px">{{ $errors->first('email') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="firstName" class="form-control"
                                                   placeholder=" الاسم الاول" value="{{ old('firstName', '') }}">
                                            @error('firstName')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('firstName') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="lastName" class="form-control"
                                                   placeholder=" الاسم الاخير" value="{{ old('lastName', '') }}">
                                            @error('lastName')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('lastName') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="كلمة المرور">
                                            @error('password')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('password') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   placeholder="تأكيد كلمة المرور">
                                        </div>
                                    </div>
                                </div>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>بيانات الحساب <span style="color: red">*</span></h2>
                                </div>

                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> اختيار صورة </span>
                                                    <span class="fileinput-exists"> تغيير </span>
                                                    <input type="file" name="avatar"
                                                           value="{{ old('avatar', '') }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                حذف </a>
                                        </div>
                                        @error('avatar')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('avatar') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix" style="margin-bottom: 15px">
                                    <div class="col-sm-6">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="region" required>
                                            <option selected disabled>- اختيار محافطة -</option>
                                            @foreach($regions as $region)
                                                <option {{ old('region', '' ) === $region->id ? 'selected' : '' }} value="{{ $region->id }}">
                                                    {{ $region->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('region') }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="category" required>
                                            <option selected disabled>- اختيار مجال -</option>
                                            @foreach($categories as $category)
                                                <option {{ old('category', '' ) === $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('category') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                   placeholder="الجوال" value="{{ old('phone', '') }}">
                                            @error('phone')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('phone') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="number" name="age" class="form-control"
                                                   placeholder="العمر" value="{{ old('age', '') }}">
                                            @error('age')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('age') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="degree" class="form-control"
                                                   placeholder="المستوى الدراسي" value="{{ old('degree', '') }}">
                                            @error('degree')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('degree') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="bio" rows="4" class="form-control no-resize"
                                                      placeholder="نبذة...">{{ old('bio', '') }}</textarea>
                                            @error('bio')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('bio') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="skills" rows="4" class="form-control no-resize"
                                                      placeholder="المهارات...">{{ old('skills', '') }}</textarea>
                                            @error('skills')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('skills') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>بيانات مواقع التواصل</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="web" class="form-control"
                                                   placeholder="website" value="{{ old('web', '') }}">
                                            @error('web')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('web') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="linkedin" class="form-control"
                                                   placeholder="linkedin" value="{{ old('linkedin', '') }}">
                                            @error('linkedin')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('linkedin') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="facebook" class="form-control"
                                                   placeholder="facebook" value="{{ old('facebook', '') }}">
                                            @error('facebook')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('facebook') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="twitter" class="form-control"
                                                   placeholder="twitter" value="{{ old('twitter', '') }}">
                                            @error('twitter')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('twitter') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="instagram" class="form-control"
                                                   placeholder="instagram" value="{{ old('instagram', '') }}">
                                            @error('instagram')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('instagram') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="whatsapp" class="form-control"
                                                   placeholder="whatsapp" value="{{ old('whatsapp', '') }}">
                                            @error('whatsapp')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('whatsapp') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="behance" class="form-control"
                                                   placeholder="behance" value="{{ old('behance', '') }}">
                                            @error('behance')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('behance') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="url" name="github" class="form-control"
                                                   placeholder="github" value="{{ old('github', '') }}">
                                            @error('github')
                                                <span style="color: red;margin-right: 10px">{{ $errors->first('github') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">إضافة</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple">إلغاء
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('dashboard_files/rtl/assets/js/bootstrap-fileinput.js')}}"></script>
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    @endpush

@endsection