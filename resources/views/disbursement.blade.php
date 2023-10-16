@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
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
            </tr>
        </thead>
        @if(count($data) > 0)
        @foreach($data as $payment)
        <tr class="border-b border-dashed text-left">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @endforeach
        @endif
            </table>
</body>
</div>
            </div>
        </section>
@endsection
