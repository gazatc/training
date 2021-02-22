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
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-4 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-account-circle"></i> </div>
                            <div class="content">
                                <div class="text font-20">الأشخاص</div>
                                <h5 class="number">{{ $admins }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-city-alt"></i> </div>
                            <div class="content">
                                <div class="text font-20">الشركات / المؤسسات</div>
                                <h5 class="number">{{ $admins }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-case"></i> </div>
                            <div class="content">
                                <div class="text font-20">الوظائف</div>
                                <h5 class="number">{{ $admins }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card top_counter">
                        <div class="body">
                            <div class="icon xl-slategray"><i class="zmdi zmdi-developer-board"></i> </div>
                            <div class="content">
                                <div class="text font-20">التدريب</div>
                                <h5 class="number">19</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection