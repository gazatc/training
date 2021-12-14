@extends('layouts.app')
@section('content')
    <div>
        <header class="text-center font-semibold">
            <h2>جميع التدريبات</h2>
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
        <div class="px-5 py-5">
            <a href="{{route('training.create')}}" class="text-blue-500 text-sm hover:text-blue-300 underline">إضافة تدريب</a>
        </div>

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
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                طلبات التقديم
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                طلبات الاستفسار
                            </th>

                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                نهاية التقديم
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                العمليات
                            </th>


                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @forelse($trainings as $training)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{  $loop->index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $training->title }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('training.attempts',$training)}}" class="text-blue-500 hover:text-blue-900">
                                        {{$training->numberOfAttemptsToThisTraining()}}
                                    </a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('training.inquire_to_this_training',$training)}}" class="text-blue-500 hover:text-blue-900">

                                    {{$training->numberOFInquireToThisTraining()}}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap
    @if($training->last_date >= today()->toDateString())text-green-500 @else text-red-500 @endif
                                    "
                                >
                                    {{ $training->last_date }}
                                </td>
                                <td class=" py-4 whitespace-nowrap  flex justify-center gap-3 text-sm font-medium">
                                    <a href="{{route('training.edit',$training)}}" class="text-indigo-600 hover:text-indigo-900" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg></a>
                                    <a href="{{route('training.show',$training)}}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg></a>
                                    <a href="{{route('training.destroy',$training)}}" class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div dir="ltr" class="mt-3 px-8">
                    {{$trainings->appends(request()->query())->links('pagination::tailwind')}}
                </div>
            </div>
        </div>
    </div>


@endsection
