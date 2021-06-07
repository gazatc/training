@extends('layouts.app')
@section('content')
    <div>
        <header class="text-center font-semibold pb-5">
            <h2>جميع طلبات التدريب</h2>
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
                                الاسم
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                رقم الجوال
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الايميل
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                التخصص
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الاقامة
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ التقديم
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @forelse($applications as $application)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{  $loop->index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('jobseeker.show',$application->jobSeeker)}}" class="text-blue-500 hover:text-blue-900">
                                    {{$application->jobSeeker->name}}
                                    </a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$application->jobSeeker->information->phone}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$application->jobSeeker->email}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$application->jobSeeker->information->category->name}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$application->jobSeeker->information->region->name}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$application->created_at}}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
