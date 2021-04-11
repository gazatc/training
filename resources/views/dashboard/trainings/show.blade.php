@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/bootstrap-fileinput.css')}}">
        <link href="{{asset('dashboard_files/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"
              rel="stylesheet"/>
        <style>
            input, textarea {
                cursor: text !important;
            }
        </style>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>عرض التدريب
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/trainings') }}">التدريبات</a></li>
                        <li class="breadcrumb-item active">عرض</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>عرض</strong> التدريب</h2>
                        </div>

                        <div class="body">
                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>البيانات الرئيسية</h2>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>العنوان</b></small>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="العنوان" value="{{ $training->title }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-bottom: 15px">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>صاحب العمل</b></small>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="العنوان" value="{{ $training->employer->username }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>المجال</b></small>
                                        <input type="text" name="category" class="form-control"
                                               placeholder="المجال" value="{{ $training->category->name }}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>المحافظة</b></small>
                                        <input type="text" name="region" class="form-control"
                                               placeholder="المحافظة" value="{{ $training->region->name }}"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>وصف التدريب</b></small>
                                        <textarea name="description" rows="7" class="form-control no-resize description"
                                                  placeholder="وصف التدريب..."
                                                  disabled>{{ $training->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small style="margin-right: 15px"><b>المتطلبات</b></small>
                                        <textarea name="requirement" rows="7" class="form-control no-resize requirement"
                                                  placeholder="المتطلبات..."
                                                  disabled>{{ $training->requirement }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="header col-lg-12 col-md-12 col-sm-12">
                                <h2>آخر موعد للتقديم</h2>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="date" name="last_date" class="form-control"
                                               placeholder="آخر موعد للتقديم" value="{{ $training->last_date }}"
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
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
        <script>
            var height = $('.description')[0].scrollHeight;
            $('.description').css("height", height);

            var height2 = $('.requirement')[0].scrollHeight;
            $('.requirement').css("height", height2);
        </script>
    @endpush

@endsection