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
                    <h2>تعديل المشرفين
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">المشرفين</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>تعديل</strong> المشرفين</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.admins.update', $admin)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{ $admin->name }}">
                                            @error('name')
                                                <span style="color: red; margin-left: 10px">{{ $errors->first('name') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Email" value="{{ $admin->email }}">
                                            @error('email')
                                                <span style="color: red;margin-left: 10px">{{ $errors->first('email') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="{{ $admin->avatar }}"
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
                                                           value="{{ $admin->avatar }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                حذف </a>
                                        </div>
                                        @error('avatar')
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('avatar') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>بيانات تسجيل الدخول</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Password">
                                            @error('password')
                                                <span style="color: red; margin-left: 10px">{{ $errors->first('password') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   placeholder="Password Confirmation">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>الصلاحيات</h2>
                                </div>

                                <div class="col-sm-6" style="padding-right: 0px">
                                    <select class="form-control z-index show-tick nominate_beneficiary"
                                            name="role" required>
                                        <option selected disabled>- اختيار صلاحية -</option>
                                        @foreach($roles as $role)
                                            <option {{ $admin->roles->last()->id === $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span style="color: red; margin-right: 10px">{{ $errors->first('role') }}</span>
                                    @enderror
                                </div>

                                <br>
                                <br>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Edit</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple">Cancel
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