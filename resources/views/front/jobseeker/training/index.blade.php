@extends('layouts.app')
@section('content')
    <div>
        <header class="text-center font-semibold mb-5">
            <h2>جميع طلبات التدريبات</h2>
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
    <div class="flex flex-col">
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
                                العنوان
                            </th>
                            {{--<th scope="col"--}}
                                {{--class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
                                {{--طلبات الاستفسارات--}}
                            {{--</th>--}}
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نهاية التقديم
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ تقديم الطلب
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                العمليات
                            </th>


                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @forelse($applications as $application)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$loop->index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('training.show',$application->applicationable)}}"
                                       class="text-blue-500 font-semibold hover:text-blue-900">
                                        {{$application->applicationable->title}}
                                    </a>
                                </td>
                                {{--<td class="px-6 py-4 whitespace-nowrap">--}}
                                    {{--<a href="{{route('jobSeeker.inquire.training.show',$application->applicationable)}}">--}}
                                    {{--{{$application->applicationable->numberOFInquire($jobSeeker) }}--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                                <td class="px-6 py-4 whitespace-nowrap
                                    @if($application->applicationable->last_date >= today()->toDateString())
                                    text-green-500
                                    @else
                                    text-red-500
                                    @endif
                                    ">
                                    {{ $application->applicationable->last_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap
                                    ">
                                    {{ date('Y/m/d H:m a', strtotime($application->applicationable->created_at))}}
                                </td>
                                <td class=" py-4 whitespace-nowrap  flex justify-center gap-3 text-sm font-medium">
                                    <a href="{{route('jobSeeker.application.training.destroy',$application->id)}}"
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </a>
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


@endsection
