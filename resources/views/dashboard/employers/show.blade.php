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
                    <h2>عرض صاحب العمل
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/employers') }}">أصحاب العمل</a></li>
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
                            <h2><strong>عرض</strong> صاحب العمل</h2>
                        </div>

                        <div class="body">

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>البيانات الرئيسية </h2>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <small style="margin-right: 15px"><b>اسم المستخدم</b></small>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                               placeholder="اسم المستخدم" value="{{ $employer->username }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الإسم</b></small>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="الإسم" value="{{ $employer->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الإيميل</b></small>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="الإيميل" value="{{ $employer->email }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>بيانات الحساب </h2>
                            </div>

                            <div class="form-group last">
                                <small style="margin-right: 15px; display: block"><b>الصورة</b></small>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail"
                                         style="width: 200px; height: 150px;">
                                        <img src="{{ $employer->information->avatar }}"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-bottom: 15px">
                                <div class="col-sm-6">
                                    <small style="margin-right: 15px"><b>المحافظة</b></small>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="المحافظة" value="{{ $employer->information->region->name }}"
                                           disabled>
                                </div>
                                <div class="col-sm-6">
                                    <small style="margin-right: 15px"><b>المجال</b></small>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="المحافظة" value="{{ $employer->information->category->name }}"
                                           disabled>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>الهاتف / الجوال</b></small>
                                        <input type="text" name="phone" class="form-control"
                                               placeholder="الهاتف / الجوال"
                                               value="{{ $employer->information->phone }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>نوع الشركة / المؤسسة</b></small>
                                        <input type="text" name="type" class="form-control"
                                               placeholder="نوع الشركة / المؤسسة"
                                               value="{{ $employer->information->type }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>تأسست عام</b></small>
                                        <input type="number" name="year" class="form-control"
                                               placeholder="تأسست عام" value="{{ $employer->information->year }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>العنوان</b></small>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="العنوان" value="{{ $employer->information->address }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>من نحن</b></small>
                                        <textarea style="word-break: break-all;" name="bio" class="form-control"
                                                  placeholder="من نحن..." disabled>{{ $employer->information->bio }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>بيانات مواقع التواصل</h2>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>website</b></small>
                                        <input type="text" name="web" class="form-control"
                                               placeholder="website" value="{{ @$employer->socials->web }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>linkedin</b></small>
                                        <input type="text" name="linkedin" class="form-control"
                                               placeholder="linkedin" value="{{ @$employer->socials->linkedin }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>facebook</b></small>
                                        <input type="text" name="facebook" class="form-control"
                                               placeholder="facebook" value="{{ @$employer->socials->facebook }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>twitter</b></small>
                                        <input type="text" name="twitter" class="form-control"
                                               placeholder="twitter" value="{{ @$employer->socials->twitter }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>instagram</b></small>
                                        <input type="text" name="instagram" class="form-control"
                                               placeholder="instagram" value="{{ @$employer->socials->instagram }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>whatsapp</b></small>
                                        <input type="text" name="whatsapp" class="form-control"
                                               placeholder="whatsapp" value="{{ @$employer->socials->whatsapp }}" disabled>
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
            var height = $('textarea')[0].scrollHeight;
            $('textarea').css("height", height);
        </script>
    @endpush

@endsection