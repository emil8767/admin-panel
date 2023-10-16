@extends('layouts.app')

@section('content')
    <section class="bg-white bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">Payment Methods</h1>

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Segment</th>
                        <th>Max error</th>
                    </tr>
                    </thead>

                    @foreach ($paymentMethods->methods as $paymentMethod)
                        <tr class="border-b border-dashed text-left">
                            <td>{{$paymentMethod->name}}</td>
                            <td>{{$paymentMethod->status == '1' ? 'enabled' : 'disabled'}}</td>
                            <td>{{$paymentMethod->order}}</td>
                            <td>{{$paymentMethod->segment}}</td>
                            <td>{{$paymentMethod->max_error}}</td>
                            <td>
                                <a class="text-blue-600 hover:text-blue-900" href="{{ route('update-pm-view', ['id' => $paymentMethod->id]) }}">
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
