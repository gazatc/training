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
                    <h2>التقديم لوظيفة
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/jobApplications') }}">المتقدمين للوظائف</a></li>
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
                            <h2><strong>التقديم</strong> لوظيفة</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.jobApplications.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="job" required>
                                            <option selected disabled>- اختيار الوظيفة -</option>
                                            @foreach($jobs as $job)
                                                <option {{ old('job', '' ) === $job->id ? 'selected' : '' }} value="{{ $job->id }}">
                                                    {{ $job->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('job')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('job') }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 15px">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="jobseeker" required>
                                            <option selected disabled>- اختيار الباحث عن عمل -</option>
                                            @foreach($jobSeekers as $jobSeeker)
                                                <option {{ old('jobseeker', '' ) === $jobSeeker->id ? 'selected' : '' }} value="{{ $jobSeeker->id }}">
                                                    {{ $jobSeeker->username }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jobseeker')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('jobseeker') }}</span>
                                        @enderror
                                    </div>
                                </div>

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