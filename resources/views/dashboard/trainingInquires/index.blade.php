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
                    <h2>استفسارات التدريبات
                        <small class="text-muted">مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i>لوحة
                                التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/trainingInquires') }}">استفسارات التدريبات</a>
                        </li>
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
                            <h2><strong>استفسارات التدريبات </strong><span>({{$inquires->total()}})</span></h2>
                        </div>
                        @include('layouts.dashboard._message')
                        <div class="body">
                            <div class="col-12" style="padding-right: 0px">
                                <form action="{{ route('dashboard.trainingInquires.index') }}" method="GET">
                                    <div class="row clearfix">
                                        <div class="col-md-5 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    data-live-search="true"
                                                    name="training">
                                                <option value="">- كل التدريبات -</option>
                                                @foreach($trainings as $training)
                                                    <option {{ request()->training == $training->id ? 'selected' : '' }} value="{{ $training->id }}">
                                                        {{ $training->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <select class="form-control z-index show-tick nominate_beneficiary"
                                                    data-live-search="true"
                                                    name="jobSeeker">
                                                <option value="">- كل الباحثين عن عمل -</option>
                                                @foreach($jobSeekers as $jobSeeker)
                                                    <option {{ request()->jobSeeker == $jobSeeker->id ? 'selected' : '' }} value="{{ $jobSeeker->id }}">
                                                        {{ $jobSeeker->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-sm-12 button-custom">
                                            <div class="form-group">
                                                <button type="submit" class="form-control btn-primary"
                                                        style="color: white; border:none ">بحث
                                                </button>
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
                                            <th>التدريب</th>
                                            <th>الباحث عن عمل</th>
                                            <th>الاستفسار</th>
                                            <th>الاجابة</th>
                                            <th>تاريخ الارسال</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($inquires as $inquire)
                                            <tr>
                                                <td>{{ ($inquires->currentPage()-1) * $inquires->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    <a target="_blank"
                                                       href="{{ route('dashboard.trainings.show', $inquire->inquirable->id) }}">{{ $inquire->inquirable->title }}</a>
                                                </td>
                                                <td>
                                                    <a target="_blank"
                                                       href="{{ route('dashboard.jobSeekers.show', $inquire->jobSeeker->id) }}">{{ $inquire->jobSeeker->username }}</a>
                                                </td>
                                                <td>
                                                    <button title="show overview"
                                                            value="{{$inquire->message}}"
                                                            class="btn btn-icon btn-neutral btn-icon-mini show_message">
                                                        <i class="zmdi zmdi-reader"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    @if(isset($inquire->reply))
                                                        <button title="show overview"
                                                                value="{{$inquire->reply}}"
                                                                class="btn btn-icon btn-neutral btn-icon-mini show_reply">
                                                            <i class="zmdi zmdi-reader"></i>
                                                        </button>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $inquire->created_at }}</td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_inquires'))
                                                        <form action="{{ route('dashboard.trainingInquires.destroy', $inquire) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_inquire"
                                                                    title="Delete" value="{{$inquire->id}}">
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
                                                <td colspan="7" class="text-center">لا يوجد بيانات لعرضها...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$inquires->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{  asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_inquire").click(function (e) {
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

            $(".show_message").click(function () {
                var message = $(this).val();
                swal({
                    title: "<spna style='color: #8CD4F5'>الاستفسار</span>",
                    text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: text!important;' readonly>" + message + "</textarea>",
                    html: true
                });
            });
            $(".show_reply").click(function () {
                var reply = $(this).val();
                swal({
                    title: "<spna style='color: #8CD4F5'>الرد</span>",
                    text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: text!important;' readonly>" + reply + "</textarea>",
                    html: true
                });
            });
        </script>
    @endpush

@endsection