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
                    <h2>طلبات توثيق أصحاب العمل
                        <small class="text-muted">مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>الطلبات </strong><span>({{$employers->total()}})</span></h2>
                        </div>
                        @include('layouts.dashboard._message')
                        <div class="body">
                            <div class="col-6" style="padding-right: 0px">
                                <form action="{{ route('dashboard.verifyAccounts.employersApplication') }}" method="GET">
                                    <div class="input-group" style="margin-bottom: 0px;">
                                        <input type="text" class="form-control" placeholder="البحث..."
                                               name="search" value="{{ request()->search }}" style="padding-top: 0px; padding-bottom: 0px">
                                        <button class="input-group-addon" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
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
                                            <th>اسم المستخدم</th>
                                            <th>رقم الهوية</th>
                                            <th>الهوية</th>
                                            <th>الشخص مع الهوية</th>
                                            <th>وثائق الشركة</th>
                                            <th>التوثيق</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($employers as $employer)
                                            <tr>
                                                <td>{{ ($employers->currentPage()-1) * $employers->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    <span class="list-icon">
                                                        <img class="patients-img"
                                                             src="{{ $employer->information->avatar }}"
                                                             alt=""
                                                             style="width: 50px; height: 50px">
                                                    </span>
                                                </td>
                                                <td><a target="_blank" href="{{ route('dashboard.employers.show', $employer->id) }}">{{ $employer->username }}</a></td>
                                                <td>{{ $employer->verify->PID }}</td>
                                                <td><a target="_blank" href="{{ $employer->verify->PID_image }}">عرض</a></td>
                                                <td><a target="_blank" href="{{ $employer->verify->PID_user_image }}">عرض</a></td>
                                                <td><a target="_blank" href="{{ $employer->verify->document }}">عرض</a></td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('verify_verifyAccounts'))
                                                        <form action="{{ route('dashboard.verifyAccounts.verifyEmployer', $employer) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            <div class="checkbox">
                                                                <input id="checkbox_{{ $employer->id }}" class="verify_checkbox" type="checkbox" {{ $employer->verified ? 'checked' : '' }}>
                                                                <label for="checkbox_{{ $employer->id }}">{{ $employer->verified ? 'موثق' : 'غير موثق' }}</label>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="checkbox">
                                                            <input id="checkbox" type="checkbox" disabled {{ $employer->verified ? 'checked' : '' }}>
                                                            <label for="checkbox">{{ $employer->verified ? 'موثق' : 'غير موثق' }}</label>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_verifyAccounts'))
                                                        <form action="{{ route('dashboard.verifyAccounts.deleteEmployerVerify', $employer->verify) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_employer"
                                                                    title="Delete" value="{{$employer->id}}">
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
                                                <td colspan="9" class="text-center">لا يوجد بيانات لعرضها...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$employers->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{  asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
        <script src="{{asset('dashboard_files/rtl/assets/js/jquery.blockUI.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_employer").click(function (e) {
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

                $('body').on('change', '.verify_checkbox', function(e) {
                    e.preventDefault();

                    $.blockUI({ message: `<b style="padding:10px 0px"><img src='{{asset('dashboard_files/busy.gif')}}' /> Just a moment...</b>` });

                    var that = $(this);
                    that.closest('form').submit();
                });
            });
        </script>
    @endpush

@endsection