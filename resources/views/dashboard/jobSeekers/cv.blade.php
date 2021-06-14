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
                    <h2>السيرة الذاتية للباحث عن عمل
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/employers') }}">الباحثين عن عمل</a></li>
                        <li class="breadcrumb-item active">السيرة الذاتية</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>السيرة الذاتية</strong> الباحث عن عمل</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="body">
                            <form action="{{route('dashboard.jobSeekers.saveCV', $jobSeeker)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>التعليم <span style="color: red">*</span></h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="tab-content m-t-10">
                                            <div class="tab-pane table-responsive active">
                                                <table class="table m-b-0 table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>الجهة / المؤسسة</th>
                                                        <th>الدرجة العلمية</th>
                                                        <th>من</th>
                                                        <th>الى</th>
                                                        <th>
                                                            <button class="btn btn-sm btn-success btn-round add_education"
                                                                    title="Add">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="education_data">
                                                    @forelse($education as $edu)
                                                        <tr>
                                                            <td>
                                                                <input type="text"
                                                                       name="education[{{ $loop->index }}][institution]"
                                                                       class="form-control"
                                                                       value="{{ $edu->institution }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       name="education[{{ $loop->index }}][degree]"
                                                                       class="form-control" value="{{ $edu->degree }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date"
                                                                       name="education[{{ $loop->index }}][from]"
                                                                       class="form-control" value="{{ $edu->from }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date"
                                                                       name="education[{{ $loop->index }}][to]"
                                                                       class="form-control" value="{{ $edu->to }}" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_education"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="education[0][institution]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="education[0][degree]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="education[0][from]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="education[0][to]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_education"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>الخبرة <span style="color: red">*</span></h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="tab-content m-t-10">
                                            <div class="tab-pane table-responsive active">
                                                <table class="table m-b-0 table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>المسمى الوظيفي</th>
                                                        <th>الجهة / المؤسسة</th>
                                                        <th>من</th>
                                                        <th>الى</th>
                                                        <th>
                                                            <button class="btn btn-sm btn-success btn-round add_experience"
                                                                    title="Add">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="experience_data">
                                                    @forelse($experience as $exp)
                                                        <tr>
                                                            <td>
                                                                <input type="text"
                                                                       name="experience[{{ $loop->index }}][name]"
                                                                       class="form-control" value="{{ $exp->name }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       name="experience[{{ $loop->index }}][company]"
                                                                       class="form-control" value="{{ $exp->company }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date"
                                                                       name="experience[{{ $loop->index }}][from]"
                                                                       class="form-control" value="{{ $exp->from }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date"
                                                                       name="experience[{{ $loop->index }}][to]"
                                                                       class="form-control" value="{{ $exp->to }}" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_experience"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="experience[0][name]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="experience[0][company]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="experience[0][from]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="experience[0][to]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_experience"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>التدريب <span style="color: red">*</span></h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="tab-content m-t-10">
                                            <div class="tab-pane table-responsive active">
                                                <table class="table m-b-0 table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>اسم الدورة</th>
                                                        <th>الجهة / المؤسسة</th>
                                                        <th>من</th>
                                                        <th>الى</th>
                                                        <th>
                                                            <button class="btn btn-sm btn-success btn-round add_training"
                                                                    title="Add">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="training_data">
                                                    @forelse($training as $trn)
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="training[{{ $loop->index }}][name]"
                                                                       class="form-control" value="{{ $trn->name }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="training[{{ $loop->index }}][institution]"
                                                                       class="form-control" value="{{ $trn->institution }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="training[{{ $loop->index }}][from]"
                                                                       class="form-control" value="{{ $trn->from }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="training[{{ $loop->index }}][to]"
                                                                       class="form-control" value="{{ $trn->to }}" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_training"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="training[0][name]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="training[0][institution]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="training[0][from]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="date" name="training[0][to]"
                                                                       class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger btn-round delete_training"
                                                                        title="Remove">
                                                                    <i class="zmdi zmdi-minus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>ملف السيرة الذاتية <span style="color: red">*</span></h2>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="PID_image">
                                                <b>ملف السيرة الذاتية (PDF)</b>
                                                @isset($jobSeeker->information->CVFile)
                                                    <a target="_blank" href="{{ $jobSeeker->information->CVFile }}">عرض</a>
                                                @endisset
                                            </label>
                                            <input type="file" name="CVFile" class="form-control-file" id="CVFile">
                                            @error('CVFile')
                                            <span style="color: red; margin-right: 10px">{{ $errors->first('CVFile') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">حفظ</button>
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


                var Edu_count = "{{$education->count()}}";
                $('.add_education').on('click', function (e) {
                    e.preventDefault();

                    var html = `<tr>
                                    <td>
                                        <input type="text" name="education[${Edu_count}][institution]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="education[${Edu_count}][degree]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="date" name="education[${Edu_count}][from]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="date" name="education[${Edu_count}][to]" class="form-control" required>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger btn-round delete_education"
                                                title="Remove">
                                            <i class="zmdi zmdi-minus"></i>
                                        </button>
                                    </td>
                                </tr>`;

                    $('.education_data').append(html);
                    Edu_count++;
                });
                $('body').on('click', '.delete_education', function (e) {
                    e.preventDefault();

                    $(this).closest('tr').remove();

                    Edu_count--;
                    CalculateNextRowCount("education", "institution");
                });

                var Exp_count = "{{$experience->count()}}";
                $('.add_experience').on('click', function (e) {
                    e.preventDefault();

                    var html = `<tr>
                                   <td>
                                       <input type="text" name="experience[${Exp_count}][name]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="text" name="experience[${Exp_count}][company]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="date" name="experience[${Exp_count}][from]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="date" name="experience[${Exp_count}][to]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <button class="btn btn-sm btn-danger btn-round delete_experience"
                                               title="Remove">
                                           <i class="zmdi zmdi-minus"></i>
                                       </button>
                                   </td>
                               </tr>`;

                    $('.experience_data').append(html);
                    Exp_count++;
                });
                $('body').on('click', '.delete_experience', function (e) {
                    e.preventDefault();

                    $(this).closest('tr').remove();

                    Exp_count--;
                    CalculateNextRowCount("experience", "name");
                });

                var Trn_count = "{{$training->count()}}";
                $('.add_training').on('click', function (e) {
                    e.preventDefault();

                    var html = `<tr>
                                   <td>
                                       <input type="text" name="training[${Trn_count}][name]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="text" name="training[${Trn_count}][institution]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="date" name="training[${Trn_count}][from]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <input type="date" name="training[${Trn_count}][to]"
                                              class="form-control" required>
                                   </td>
                                   <td>
                                       <button class="btn btn-sm btn-danger btn-round delete_training"
                                               title="Remove">
                                           <i class="zmdi zmdi-minus"></i>
                                       </button>
                                   </td>
                               </tr>`;

                    $('.training_data').append(html);
                    Trn_count++;
                });
                $('body').on('click', '.delete_training', function (e) {
                    e.preventDefault();

                    $(this).closest('tr').remove();

                    Trn_count--;
                    CalculateNextRowCount("training", "name");
                });

                function CalculateNextRowCount($type, $data) {
                    while ($(`[name="${$type}[${count}][${$data}]"]`).length) {
                        Edu_count++;
                    }
                }

            });
        </script>
    @endpush

@endsection