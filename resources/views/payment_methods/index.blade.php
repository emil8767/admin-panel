@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">Payment Methods</h1>
                    <div>
                        <a href="{{route('payment-methods.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create payment method            </a>
                    </div>
                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Segment</th>
                        <th>Name</th>
                        <th>Max error</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach ($paymentMethods as $paymentMethod)
                        <tr class="border-b border-dashed text-left">
                            <td>{{$paymentMethod->id}}</td>
                            <td>{{$paymentMethod->status}}</td>
                            <td>{{$paymentMethod->order}}</td>
                            <td>{{$paymentMethod->segment}}</td>
                            <td>{{$paymentMethod->name}}</td>
                            <td>{{$paymentMethod->max_error}}</td>
                            <td>{{$paymentMethod->created_at}}</td>
                            <td>
                                <a class="text-blue-600 hover:text-blue-900" href="{{ route('payment-methods.edit', $paymentMethod) }}">
                                    Update
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>
@endsection
