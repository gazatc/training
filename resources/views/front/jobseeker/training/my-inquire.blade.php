@extends('layouts.app')
@section('content')
    <div>
        <header class="text-center font-semibold mb-5">
            <h2>جميع طلبات استفسار التدريب</h2>
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
                                التدريب
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الرسالة
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الرد
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ الإرسال
                            </th>
                            <th scope="col"
                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ الرد
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @forelse($inquires as $inquire)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$loop->index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('training.show',$inquire->inquirable->id)}}"
                                       class="text-blue-500 font-semibold hover:text-blue-900">
                                        {{$inquire->inquirable->title}}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{$inquire->message}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$inquire->reply ?? 'لم يتم الرد بعد'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$inquire->created_at->toDateString()}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ ($inquire->created_at != $inquire->updated_at) ? $inquire->updated_at->toDateString() : '-'}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">لا يوجد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
