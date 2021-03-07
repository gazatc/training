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
                    <h2>توثيق الباحث عن عمل
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/employers') }}">الباحثين عن عمل</a></li>
                        <li class="breadcrumb-item active">توثيق</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>توثيق</strong> الباحث عن عمل</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.jobSeekers.verifyAccount', $jobSeeker)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية <span style="color: red">*</span></h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="PID" class="form-control"
                                                   placeholder="رقم الهوية الشخصية" value="{{ @$jobSeeker->verify->PID }}">
                                            @error('PID')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('PID') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>الوثائق المطلوية <span style="color: red">*</span></h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="PID_image">
                                                <b>صورة الهوية الشخصية</b>
                                                @isset($jobSeeker->verify->PID_image)
                                                    <a target="_blank" href="{{ $jobSeeker->verify->PID_image }}">عرض</a>
                                                @endisset
                                            </label>
                                            <input type="file" name="PID_image" class="form-control-file" id="PID_image">
                                            @error('PID_image')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('PID_image') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="PID_user_image">
                                                <b>صورة للشخص مع الهوية الشخصية</b>
                                                @isset($jobSeeker->verify->PID_user_image)
                                                    <a target="_blank" href="{{ $jobSeeker->verify->PID_user_image }}">عرض</a>
                                                @endisset
                                            </label>
                                            <input type="file" name="PID_user_image" class="form-control-file" id="PID_user_image">
                                            @error('PID_user_image')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('PID_user_image') }}</span>
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