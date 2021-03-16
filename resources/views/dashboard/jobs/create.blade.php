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
                    <h2>إضافة وظيفة
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/jobs') }}">الوظائف</a></li>
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
                            <h2><strong>إضافة</strong> وظيفة</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.jobs.store')}}" method="POST">
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
                                <div class="row clearfix" style="margin-bottom: 15px">
                                    <div class="col-sm-4">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="jobType" required>
                                            <option selected disabled>- نوع الوظيفة -</option>
                                            <option value="1">دوام كامل</option>
                                            <option value="2">دوام جزئي</option>
                                            <option value="3">عن بعد</option>
                                        </select>
                                        @error('jobType')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('jobType') }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="for" required>
                                            <option selected disabled>- الفئة المستهدفة -</option>
                                            <option value="1">أشخاص</option>
                                            <option value="2">فرق</option>
                                        </select>
                                        @error('for')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('for') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="salary_type" required>
                                            <option selected disabled>- نوع الراتب -</option>
                                            <option value="1">ثابت</option>
                                            <option value="2">بالساعة</option>
                                        </select>
                                        @error('salary_type')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('salary_type') }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="number" name="salary_amount" class="form-control"
                                                   step="0.01" min="0.01"
                                                   placeholder="الراتب" value="{{ old('salary_amount', '') }}">
                                            @error('salary_amount')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('salary_amount') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="description" rows="7" class="form-control no-resize"
                                                      placeholder="الوصف الوظيفي...">{{ old('description', '') }}</textarea>
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