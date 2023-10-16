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
                <th>ID</th>
                <th>Client ID</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Completed_at</th>
                <th>Admin_id</th>
                <th>Comments</th>
                <th>Amount</th>
                <th>Update</th>
                <th>Hist</th>
            </tr>
        </thead>
        @if(count($data) > 0)
        @foreach($data as $payment)

                <tr class="border-b border-dashed text-left">
            <td>{{$payment['id']}}</td>
            <td>{{$payment['client_id']}}</td>
            <td>{{$payment['status']}}</td>
            <td>{{$payment['created_at']}}</td>
            <td>{{$payment['completed_at']}}</td>
            <td>{{$payment['admin_id']}}</td>
            <td>{{$payment['comments']}}</td>
            <td>{{$payment['amount'] ?? ''}}</td>
                    <td>
                        <a class="text-blue-600 hover:text-blue-900" href="{{ route('update-disb', ['id' => $payment['id']]) }}">
                            Update
                        </a>
                    </td>
                    <td>
                        <a class="text-blue-600 hover:text-blue-900" href="{{ route('disb-hist', ['id' => $payment['id']]) }}">
                            Show hist
                        </a>
                    </td>
        </tr>
        @endforeach
        @endif
            </table>
</body>
</div>
            </div>
        </section>
@endsection
