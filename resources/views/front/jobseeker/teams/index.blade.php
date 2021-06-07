@extends('layouts.app')
@section('content')
    <div>
        <header class="text-center font-semibold mb-5">
            <h2>الفرقة</h2>
        </header>
        @if(Session::has('success'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">{{Session::get('success')}}</p>
            </div>
        @endif
        @if(Session::has('delete'))
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                <p class="font-bold">{{Session::get('delete')}}</p>
            </div>
        @endif

    </div>

{{--    {{dd( != null)}}--}}

    @if($jobSeeker->team()->first() == null)
        <div class="flex flex-col ">
            <p>
                <a href="{{route('teams.create')}}">
                    انشاء فريق
                </a>
            </p>
        </div>
    @elseif($jobSeeker->team()->first() != null)
        <div class="flex flex-col ">
            <header class="text-center">
                <h2>{{$jobSeeker->team->first()->name}}</h2>
                <h2>{{$jobSeeker->team->first()->bio}}</h2>
            </header>
            @if($jobSeeker->teamLeader)
                <div class="p-5 flex gap-5">
                    <p class="hover:text-blue-300 hover:underline">
                        <a href="{{route('teams.member.create')}}"> إضافة عضو</a>
                    </p>
                    <p class="hover:text-blue-300 hover:underline">
                        <a href="{{route('teams.edit',$jobSeeker->team->first())}}">تعديل بيانات الفرقة</a>
                    </p>
                    <p class="text-red-500 hover:underline">
                        <a href="{{route('teams.destroy',$jobSeeker->team->first())}}"> حذف الفرقة </a>
                    </p>
                </div>
            @endif

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    الاسم
                                </th>
                                <th scope="col"
                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    المهنة
                                </th>
                                <th scope="col"
                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    المرتبة
                                </th>
                                {{--                            <th scope="col"--}}
                                {{--                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
                                {{--                                تاريخ الانضمام--}}
                                {{--                            </th>--}}
                                <th scope="col"
                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    العمليات
                                </th>


                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @forelse($team->members as $member)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$loop->index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('jobseeker.show',$member)}}"
                                           class="text-blue-500 font-semibold hover:text-blue-900">
                                            {{$member->name}}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$member->information->category->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        @if($member->teamLeader)
                                            مدير
                                        @else
                                            عضو
                                        @endif
                                    </td>
                                    <td class=" py-4 whitespace-nowrap  flex justify-center gap-3 text-sm font-medium">
                                        @if($jobSeeker->teamLeader)
                                            @if($jobSeeker->id == $member->id)

                                            @else
                                                <a href="{{route('teams.member.destroy',$member->username)}}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    حذف
                                                </a>
                                            @endif
                                        @else
                                            @if($jobSeeker->id == $member->id)
                                                <a href="{{route('teams.member.destroy',$jobSeeker->username )}}"
                                                   class="text-indigo-600 hover:text-indigo-900">
                                                    مغادرة
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">لا يوجد</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection
