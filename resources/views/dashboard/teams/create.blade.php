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
                    <h2>إضافة فريق
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/teams') }}">الفرق</a></li>
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
                            <h2><strong>إضافة</strong> فريق</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.teams.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>البيانات الرئيسية</h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="إسم الفريق" value="{{ old('name', '') }}">
                                            @error('name')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('name') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="team_leader" required>
                                            <option selected disabled>- قائد الفريق -</option>
                                            @foreach($jobSeekers as $jobSeeker)
                                                <option {{ old('team_leader', '' ) === $jobSeeker->id ? 'selected' : '' }} value="{{ $jobSeeker->id }}">
                                                    {{ $jobSeeker->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('team_leader')
                                        <span style="color: red; margin-right: 10px">{{ $errors->first('team_leader') }}</span>
                                        @enderror
                                    </div>
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

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>أعضاء الفريق</h2>
                                </div>
                                @error('members.*')
                                    <span style="color: red; margin-right: 10px">{{ $errors->first('members.*') }}</span>
                                @enderror
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>
                                                    <button class="btn btn-success btn-sm btn-icon btn-round d-none d-md-inline-block float-right m-l-10 add_member"
                                                            type="button">
                                                        <i class="zmdi zmdi-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="member_data">
                                            <tr>
                                                <td>
                                                    <select class="form-control z-index show-tick nominate_beneficiary"
                                                            data-live-search="true"
                                                            name="members[0][id]" required>
                                                        <option selected disabled>- باحث عن عمل -</option>
                                                        @foreach($jobSeekers as $jobSeeker)
                                                            <option value="{{ $jobSeeker->id }}">
                                                                {{ $jobSeeker->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm btn-icon btn-round d-none d-md-inline-block float-right m-l-10 delete_member"
                                                            type="button">
                                                        <i class="zmdi zmdi-minus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
        <script>
            $(document).ready(function () {
                var count = 1;
                $('.add_member').on('click', function(e) {
                    e.preventDefault();

                    var html = `<tr>
                                    <td>
                                        <select id="select_${count}" class="form-control z-index show-tick nominate_beneficiary"
                                                data-live-search="true"
                                                name="members[${count}][id]" required>
                                            <option selected disabled>- باحث عن عمل -</option>
                                            @foreach($jobSeekers as $jobSeeker)
                                                <option value="{{ $jobSeeker->id }}">
                                                    {{ $jobSeeker->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-icon btn-round d-none d-md-inline-block float-right m-l-10 delete_member"
                                                type="button">
                                            <i class="zmdi zmdi-minus"></i>
                                        </button>
                                    </td>
                                </tr>`;
                    $('.member_data').append(html);
                    $('#select_'+count).selectpicker('refresh');
                    $('#select_'+count).selectpicker('render');
                    count++;
                });
                $('body').on('click', '.delete_member', function (e) {
                    e.preventDefault();

                    $(this).closest('tr').remove();
                    count--;

                    CalculateNextRowCount();
                });
                function CalculateNextRowCount() {
                    while ($(`[name="members[${count}]"]`).length) {
                        count++;
                    }
                }
            });
        </script>
    @endpush

@endsection