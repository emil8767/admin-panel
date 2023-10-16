@extends('layouts.app')

@section('content')
    <section class="bg-white bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5"></h1>
                <body>
                <h1>List of payments</h1>
                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>Job Id</th>
                        <th>Status Old</th>
                        <th>Status New</th>
                        <th>Created_at</th>
                        <th>Admin ID</th>
                        <th>Comments Old</th>
                        <th>Comments New</th>
                    </tr>
                    </thead>
                    @if(count($data) > 0)
                        @foreach($data as $jobHist)
                            <tr class="border-b border-dashed text-left">
                                <td>{{$jobHist['job_id']}}</td>
                                <td>{{$jobHist['status_old']}}</td>
                                <td>{{$jobHist['status_new']}}</td>
                                <td>{{$jobHist['created_at']}}</td>
                                <td>{{$jobHist['admin_id']}}</td>
                                <td>{{$jobHist['comments_old']}}</td>
                                <td>{{$jobHist['comments_new']}}</td>

                            </tr>
                        @endforeach
                    @endif
                </table>
                </body>
            </div>
        </div>
    </section>
@endsection
