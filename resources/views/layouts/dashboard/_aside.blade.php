<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu" style="padding-top: 25px">
                <ul class="list" style="padding: 0px">
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
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                        class="zmdi zmdi-collection-text"></i><span>المجالات</span>
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

                    @if(auth()->guard('admin')->user()->isAbleTo('*_jobSeekers'))
                        <li class="open {{ (request()->is('dashboard/jobSeekers*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                        class="zmdi zmdi-account-box"></i><span>الباحثين عن عمل</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_jobSeekers'))
                                    <li class="open {{ (request()->is('dashboard/jobSeekers')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobSeekers.index')}}">كل الباحثين عن عمل</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_jobSeekers'))
                                    <li class="open {{ (request()->is('dashboard/jobSeekers/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobSeekers.create')}}">إضافة باحث عن عمل</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_jobs'))
                        <li class="open {{ (request()->is('dashboard/jobs*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-case"></i><span>الوظائف</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_jobs'))
                                    <li class="open {{ (request()->is('dashboard/jobs')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobs.index')}}">كل الوظائف</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_jobs'))
                                    <li class="open {{ (request()->is('dashboard/jobs/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobs.create')}}">إضافة وظيفة</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_trainings'))
                        <li class="open {{ (request()->is('dashboard/trainings*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                            class="zmdi zmdi-chart-donut"></i><span>التدريبات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_trainings'))
                                    <li class="open {{ (request()->is('dashboard/trainings')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.trainings.index')}}">كل التدريبات</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_trainings'))
                                    <li class="open {{ (request()->is('dashboard/trainings/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.trainings.create')}}">إضافة تدريب</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_teams'))
                        <li class="open {{ (request()->is('dashboard/teams*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>الفرق</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_teams'))
                                    <li class="open {{ (request()->is('dashboard/teams')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.teams.index')}}">كل الفرق</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('create_teams'))
                                    <li class="open {{ (request()->is('dashboard/teams/create')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.teams.create')}}">إضافة فريق</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_verifyAccounts'))
                        <li class="open {{ (request()->is('dashboard/verifyAccounts*')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                        class="zmdi zmdi-badge-check"></i><span>طلبات توثيق الحسابات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_verifyAccounts'))
                                    <li class="open {{ (request()->is('dashboard/verifyAccounts/employers')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.verifyAccounts.employersApplication')}}">طلبات توثيق اصحاب العمل</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('read_verifyAccounts'))
                                    <li class="open {{ (request()->is('dashboard/verifyAccounts/jobSeekers')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.verifyAccounts.jobSeekersApplication')}}">طلبات توثيق الباحثين عن عمل</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_applications'))
                        <li class="open {{ (request()->is('dashboard/*Applications')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                        class="zmdi zmdi-collection-plus"></i><span>طلبات التقديم</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_applications'))
                                    <li class="open {{ (request()->is('dashboard/jobApplications')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobApplications.index')}}">المتقدمين للوظائف</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('read_applications'))
                                    <li class="open {{ (request()->is('dashboard/trainingApplications')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.trainingApplications.index')}}">المتقدمين للتدريبات</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->isAbleTo('*_inquires'))
                        <li class="open {{ (request()->is('dashboard/*Inquires')) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-toggle"><i
                                        class="zmdi zmdi-comment-text-alt"></i><span>الاستفسارات</span>
                            </a>
                            <ul class="ml-menu">
                                @if(auth()->guard('admin')->user()->hasPermission('read_inquires'))
                                    <li class="open {{ (request()->is('dashboard/jobInquires')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.jobInquires.index')}}">استفسارات الوظائف</a>
                                    </li>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('read_inquires'))
                                    <li class="open {{ (request()->is('dashboard/trainingInquires')) ? 'active' : '' }}">
                                        <a href="{{route('dashboard.trainingInquires.index')}}">استفسارات التدريبات</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->guard('admin')->user()->hasPermission('read_messages'))
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-email"></i><span>الرسائل</span>
                            </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('dashboard.messages.index')}}">كل الرسائل</a></li>
                            </ul>
                        </li>
                    @endif

                    <br>

                </ul>
            </div>
        </div>
    </div>
</aside>