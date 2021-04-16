@extends('layouts.dashboard.app')

@section('content')
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>لوحة التحكم
                        <small>مرحبا بك في وظائف غزة</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> وظائف غزة</a></li>
                        <li class="breadcrumb-item active">لوحة التحكم</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-account"></i> </div>
                            <div class="content">
                                <div class="text font-20">المشرفين</div>
                                <h5 class="number">{{ $admins }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-key"></i> </div>
                            <div class="content">
                                <div class="text font-20">الصلاحيات</div>
                                <h5 class="number">{{ $roles }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-collection-text"></i> </div>
                            <div class="content">
                                <div class="text font-20">المجالات</div>
                                <h5 class="number">{{ $categories }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-pin"></i> </div>
                            <div class="content">
                                <div class="text font-20">المحافظات</div>
                                <h5 class="number">{{ $regions }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-city-alt"></i> </div>
                            <div class="content">
                                <div class="text font-20">أصحاب العمل</div>
                                <h5 class="number">{{ $employers }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-account-box"></i> </div>
                            <div class="content">
                                <div class="text font-20">الباحثين عن عمل</div>
                                <h5 class="number">{{ $jobSeekers }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-case"></i> </div>
                            <div class="content">
                                <div class="text font-20">الوظائف</div>
                                <h5 class="number">{{ $jobs }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-chart-donut"></i> </div>
                            <div class="content">
                                <div class="text font-20">التدريبات</div>
                                <h5 class="number">{{ $trainings }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-accounts"></i> </div>
                            <div class="content">
                                <div class="text font-20">الفرق</div>
                                <h5 class="number">{{ $teams }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-collection-plus"></i> </div>
                            <div class="content">
                                <div class="text font-20">طلبات التقديم</div>
                                <h5 class="number">{{ $applications }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-comment-text"></i> </div>
                            <div class="content">
                                <div class="text font-20">الاستفسارات</div>
                                <h5 class="number">{{ $inquires }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-email"></i> </div>
                            <div class="content">
                                <div class="text font-20">الرسائل</div>
                                <h5 class="number">{{ $messages }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection