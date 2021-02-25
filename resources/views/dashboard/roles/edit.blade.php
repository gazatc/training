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
                    <h2>تعديل الصلاحيات
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">الصلاحيات</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>تعديل</strong> الصلاحيات</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.roles.update', $role)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="الإسم" value="{{ $role->name }}">
                                            @error('name')
                                                <span style="color: red; margin-right: 10px">{{ $errors->first('name') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>تحديد الصلاحيات</h2>
                                </div>

                                <table class="table m-b-0 table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 25%">القسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $category=>$operations)
                                        <tr>
                                            <td>{{ $category }}</td>
                                            <td>
                                                <select class="form-control z-index show-tick" name="permissions[]" data-live-search="true" multiple>
                                                    @foreach ($operations as $operate)
                                                        <option value="{{ $operate . '_' . $category }}"
                                                                {{ $role->hasPermission($operate . '_' . $category) ? 'selected' : '' }}>
                                                            {{ $operate }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        @error('permissions')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('permissions') }}</span>
                                        @enderror
                                    </tfoot>
                                </table>

                                <br>
                                <br>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">تعديل</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple">إالغاء</button>
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