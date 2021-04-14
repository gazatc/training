@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/bootstrap-fileinput.css')}}">
        <style>
            input, textarea {
                cursor: text!important;
            }
        </style>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>عرض الباحث عن عمل
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/jobSeekers') }}">الباحثين عن عمل</a></li>
                        <li class="breadcrumb-item active">عرض</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>عرض</strong> الباحث عن عمل</h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>اسم المستخدم</b></small>
                                        <input type="text" name="username" class="form-control"
                                               placeholder="اسم المستخدم" value="{{ $jobSeeker->username }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الإيميل</b></small>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="الإيميل" value="{{ $jobSeeker->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الاسم الاول</b></small>
                                        <input type="text" name="firstName" class="form-control"
                                               placeholder="الاسم الاول" value="{{ $jobSeeker->firstName }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الاسم الاخير</b></small>
                                        <input type="text" name="lastName" class="form-control"
                                               placeholder="الاسم الاخير" value="{{ $jobSeeker->lastName }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>بيانات الحساب <span style="color: red">*</span></h2>
                            </div>

                            <div class="form-group last">
                                <small style="margin-right: 15px; display: block"><b>الصورة</b></small>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail"
                                         style="width: 200px; height: 150px;">
                                        <img src="{{ $jobSeeker->information->avatar }}"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-bottom: 15px">
                                <div class="col-sm-6">
                                    <small style="margin-right: 15px;"><b>المحافظة</b></small>
                                    <input type="text" name="lastName" class="form-control"
                                           placeholder="المحافظة" value="{{ $jobSeeker->information->region->name }}"
                                           disabled>
                                </div>
                                <div class="col-sm-6">
                                    <small style="margin-right: 15px;"><b>المجال</b></small>
                                    <input type="text" name="lastName" class="form-control"
                                           placeholder="المجال" value="{{ $jobSeeker->information->category->name }}"
                                           disabled>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>الجوال</b></small>
                                        <input type="text" name="phone" class="form-control"
                                               placeholder="الجوال" value="{{ $jobSeeker->information->phone }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>العمر</b></small>
                                        <input type="number" name="age" class="form-control"
                                               placeholder="العمر" value="{{ $jobSeeker->information->age }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>المستوى الدراسي</b></small>
                                        <input type="text" name="degree" class="form-control"
                                               placeholder="المستوى الدراسي"
                                               value="{{ $jobSeeker->information->degree }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>نبذة</b></small>
                                        <textarea name="bio" rows="4" class="form-control no-resize bio"
                                                  placeholder="نبذة..."
                                                  disabled>{{ $jobSeeker->information->bio }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>المهارات</b></small>
                                        <textarea name="skills" rows="4" class="form-control no-resize skills"
                                                  placeholder="المهارات..."
                                                  disabled>{{ $jobSeeker->information->skills }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>بيانات مواقع التواصل</h2>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>website</b></small>
                                        <input type="text" name="web" class="form-control"
                                               placeholder="website" value="{{ @$jobSeeker->socials->web }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>linkedin</b></small>
                                        <input type="text" name="linkedin" class="form-control"
                                               placeholder="linkedin" value="{{ @$jobSeeker->socials->linkedin }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>facebook</b></small>
                                        <input type="text" name="facebook" class="form-control"
                                               placeholder="facebook" value="{{ @$jobSeeker->socials->facebook }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>twitter</b></small>
                                        <input type="text" name="twitter" class="form-control"
                                               placeholder="twitter" value="{{ @$jobSeeker->socials->twitter }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>instagram</b></small>
                                        <input type="text" name="instagram" class="form-control"
                                               placeholder="instagram" value="{{ @$jobSeeker->socials->instagram }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>whatsapp</b></small>
                                        <input type="text" name="whatsapp" class="form-control"
                                               placeholder="whatsapp" value="{{ @$jobSeeker->socials->whatsapp }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>behance</b></small>
                                        <input type="text" name="behance" class="form-control"
                                               placeholder="behance" value="{{ @$jobSeeker->socials->behance }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px;"><b>github</b></small>
                                        <input type="text" name="github" class="form-control"
                                               placeholder="github" value="{{ @$jobSeeker->socials->github }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('dashboard_files/rtl/assets/js/bootstrap-fileinput.js')}}"></script>
        <script>
            var height = $('.bio')[0].scrollHeight;
            $('.bio').css("height", height);

            var height2 = $('.skills')[0].scrollHeight;
            $('.skills').css("height", height2);
        </script>
    @endpush

@endsection