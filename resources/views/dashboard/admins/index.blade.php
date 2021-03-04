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
                    <h2>كل المشرفين
                        <small class="text-muted">مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    @if(auth()->guard('admin')->user()->hasPermission('create_admins'))
                        <a href="{{route('dashboard.admins.create')}}">
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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">المشرفين</a></li>
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
                            <h2><strong>المشرفين </strong><span>({{$admins->total()}})</span></h2>
                        </div>
                        @include('layouts.dashboard._message')
                        <div class="body">
                            <div class="col-12" style="padding-right: 0px">
                                <form action="{{ route('dashboard.admins.index') }}" method="GET">
                                    <div class="row clearfix">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control"
                                                       placeholder="بحث..." value="{{ request()->search }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    name="role">
                                                <option value="">- كل الصلاحيات -</option>
                                                @foreach($roles as $role)
                                                    <option {{ request()->role == $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-sm-12 button-custom">
                                            <div class="form-group">
                                                <button type="submit" class="form-control btn-primary" style="color: white; border:none ">بحث</button>
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
                                            <th>الصورة</th>
                                            <th>الاسم</th>
                                            <th>الايميل</th>
                                            <th>الصلاحيات</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($admins as $admin)
                                            <tr>
                                                <td>{{ ($admins->currentPage()-1) * $admins->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    <span class="list-icon">
                                                        <img class="patients-img"
                                                             src="{{  $admin->avatar }}"
                                                             alt=""
                                                             style="width: 50px; height: 50px">
                                                    </span>
                                                </td>
                                                <td><span class="list-name">{{ $admin->name }}</span></td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    @foreach($admin->roles as $role)
                                                        <span class="badge badge-info">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('update_admins'))
                                                        <a href="{{route('dashboard.admins.edit', $admin)}}">
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

                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_admins'))
                                                        <form action="{{ route('dashboard.admins.destroy', $admin) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_admin"
                                                                    title="Delete" value="{{$admin->id}}">
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
                                                <td colspan="6" class="text-center">لا يوجد بيانات لعرضها...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$admins->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{  asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_admin").click(function (e) {
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