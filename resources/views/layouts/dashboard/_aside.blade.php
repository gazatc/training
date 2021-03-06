<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item" style="width: 100%; text-align: center; margin: auto;">
            <a class="nav-link active" href="/" target="_blank">
                <i class="zmdi zmdi-home m-r-5"></i>وظائف غزة
            </a>
        </li>
        <li class="nav-item" style="width: 100%; text-align: center; margin: auto;">
            <a class="nav-link active" href="{{route('dashboard.admins.edit', auth()->guard('admin')->user())}}">
                <i class="zmdi zmdi-account-box m-r-5"></i>الملف الشخصي
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="#"><img
                                            src="{{auth()->guard('admin')->user()->avatar}}"
                                            alt="User"></a></div>
                            <div class="detail">
                                <h4>{{auth()->guard('admin')->user()->name}}</h4>
                                <small>{{auth()->guard('admin')->user()->getRoles()[0]}}</small>
                            </div>
                        </div>
                    </li>
                    {{--<li class="header">MAIN <small>(6)</small></li>--}}
                    <li class="open {{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <a href="{{route('dashboard.home')}}"><i class="zmdi zmdi-home"></i><span>لوحة التحكم</span></a>
                    </li>

                    @if(auth()->guard('admin')->user()->isAbleTo('*_admins'))
                        <li class="open {{ (request()->is('dashboard/admins*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>المشرفين</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_admins'))
                                    <li class="open {{ (request()->is('dashboard/admins')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.admins.index')}}">كل المشرفين</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_admins'))
                                    <li class="open {{ (request()->is('dashboard/admins/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.admins.create')}}">إضافة مشرف</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_roles'))
                        <li class="open {{ (request()->is('dashboard/roles*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-key"></i><span>الصلاحيات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_roles'))
                                    <li class="open {{ (request()->is('dashboard/roles')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.roles.index')}}">كل الصلاحيات</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_roles'))
                                    <li class="open {{ (request()->is('dashboard/roles/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.roles.create')}}">إضافة صلاحية</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_roles'))
                        <li class="open {{ (request()->is('dashboard/categories*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-collection-text"></i><span>المجالات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_roles'))
                                    <li class="open {{ (request()->is('dashboard/categories')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.categories.index')}}">كل المجالات</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_roles'))
                                    <li class="open {{ (request()->is('dashboard/categories/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.categories.create')}}">إضافة مجال</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_regions'))
                        <li class="open {{ (request()->is('dashboard/regions*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-pin"></i><span>المحافظات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_regions'))
                                    <li class="open {{ (request()->is('dashboard/regions')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.regions.index')}}">كل المحافظات</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_regions'))
                                    <li class="open {{ (request()->is('dashboard/regions/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.regions.create')}}">إضافة محافظة</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_employers'))
                        <li class="open {{ (request()->is('dashboard/employers*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city-alt"></i><span>أصحاب العمل</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_employers'))
                                    <li class="open {{ (request()->is('dashboard/employers')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.employers.index')}}">كل أصحاب العمل</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_employers'))
                                    <li class="open {{ (request()->is('dashboard/employers/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.employers.create')}}">إضافة صاحب عمل</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <br>
                </ul>
            </div>
        </div>
    </div>
</aside>