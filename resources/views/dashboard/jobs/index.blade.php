@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/>
        <link href="{{asset('dashboard_files/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"
              rel="stylesheet"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>كل الوظائف
                        <small class="text-muted">مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    @if(auth()->guard('admin')->user()->hasPermission('create_jobs'))
                        <a href="{{route('dashboard.jobs.create')}}">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                    @else
                        <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10 disabled"
                                style="cursor: no-drop"
                                type="button">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    @endif
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i>لوحة
                                التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/jobs') }}">الوظائف</a></li>
                        <li class="breadcrumb-item active">الكل</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>الوظائف </strong><span>({{$jobs->total()}})</span></h2>
                        </div>
                        @include('layouts.dashboard._message')
                        <div class="body">
                            <div class="col-12" style="padding-right: 0px">
                                <form action="{{ route('dashboard.jobs.index') }}" method="GET">
                                    <div class="row clearfix">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control"
                                                       placeholder="بحث..." value="{{ request()->search }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    name="employer">
                                                <option value="">- كل أصحاب العمل -</option>
                                                @foreach($employers as $employer)
                                                    <option {{ request()->employer == $employer->id ? 'selected' : '' }} value="{{ $employer->id }}">
                                                        {{ $employer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    name="category">
                                                <option value="">- كل المجالات -</option>
                                                @foreach($categories as $category)
                                                    <option {{ request()->category == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    name="region">
                                                <option value="">- كل المحافظات -</option>
                                                @foreach($regions as $region)
                                                    <option {{ request()->region == $region->id ? 'selected' : '' }} value="{{ $region->id }}">
                                                        {{ $region->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    name="type">
                                                <option value="">- النوع -</option>
                                                <option value="1" {{ request()->type == 1 ? 'selected' : '' }}>دوام كامل</option>
                                                <option value="2" {{ request()->type == 2 ? 'selected' : '' }}>دوام جزئي</option>
                                                <option value="3" {{ request()->type == 3 ? 'selected' : '' }}>عن بعد</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 col-sm-12 button-custom">
                                            <div class="form-group">
                                                <button type="submit" class="form-control btn-primary"
                                                        style="color: white; border:none ">بحث
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-12 button-custom">
                                            <div class="form-group">
                                                <a href="{{ route('dashboard.jobs.index') }}" class="form-control btn-primary"
                                                        style="color: white; border:none ">الغاء
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>صاحب العمل</th>
                                            <th>المجال</th>
                                            <th>المحافظة</th>
                                            <th>العنوان</th>
                                            <th>النوع</th>
                                            <th>نهاية التقديم</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($jobs as $job)
                                            <tr>
                                                <td>{{ ($jobs->currentPage()-1) * $jobs->perPage() + $loop->index + 1 }}</td>
                                                <td>{{ $job->employer->name }}</td>
                                                <td>{{ $job->category->name }}</td>
                                                <td>{{ $job->region->name }}</td>
                                                <td>{{ $job->title }}</td>
                                                <td>{{ $job->jobTypeText }}</td>
                                                <td>{{ $job->last_date }}</td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('update_jobs'))
                                                        <a href="{{route('dashboard.jobs.edit', $job)}}">
                                                            <button class="btn btn-icon btn-neutral btn-icon-mini"
                                                                    title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                    @else
                                                        <button class="btn btn-icon btn-neutral btn-icon-mini disabled"
                                                                style="cursor: no-drop"
                                                                title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    @endif

                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_jobs'))
                                                        <form action="{{ route('dashboard.jobs.destroy', $job) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_job"
                                                                    title="Delete" value="{{$job->id}}">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-icon btn-neutral btn-icon-mini disabled"
                                                                style="cursor: no-drop"
                                                                title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">لا يوجد بيانات لعرضها...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$jobs->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{  asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_job").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    swal({
                        title: "هل انت متأكد?",
                        text: "لن يمكنك استرجاعه بعد الحذف!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "نعم, قم بالحذف!",
                        cancelButtonText: "الغاء",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });
            });
        </script>
    @endpush

@endsection