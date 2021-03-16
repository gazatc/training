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
                    <h2>إضافة تدريب
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/trainings') }}">التدريبات</a></li>
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
                            <h2><strong>إضافة</strong> تدريب</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.trainings.store')}}" method="POST">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="العنوان" value="{{ old('title', '') }}">
                                            @error('title')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('title') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix" style="margin-bottom: 15px">
                                    <div class="col-sm-4">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="employer" required>
                                            <option selected disabled>- اختيار صاحب عمل -</option>
                                            @foreach($employers as $employer)
                                                <option {{ old('employer', '' ) === $employer->id ? 'selected' : '' }} value="{{ $employer->id }}">
                                                    {{ $employer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('employer')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('employer') }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
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
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="description" rows="7" class="form-control no-resize"
                                                      placeholder="وصف التدريب...">{{ old('description', '') }}</textarea>
                                            @error('description')
                                            <span style="color: red;margin-right: 10px">{{ $errors->first('description') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="requirement" rows="7" class="form-control no-resize"
                                                      placeholder="المتطلبات...">{{ old('requirement', '') }}</textarea>
                                            @error('requirement')
                                            <span style="color: red;margin-right: 10px">{{ $errors->first('requirement') }}</span>
                                            @enderror
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
                                                   placeholder="آخر موعد للتقديم" value="{{ old('last_date', '') }}">
                                            @error('last_date')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('last_date') }}</span>
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