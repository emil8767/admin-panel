@extends('layouts.app')

@section('content')
    <section class="bg-white bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">Create payment method</h1>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ Form::model($paymentMethod, ['route' => 'payment-methods.store']) }}
                <div class="flex flex-col">
                    <div>{{ Form::label('status', 'Status') }}</div>
                    <div class="mt-2">{{ Form::select('status', $statuses, $paymentMethod->status, ['placeholder' => 'Search status...', 'class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
                    <div class="mt-2">{{ Form::label('order', 'Order') }}</div>
                    <div class="mt-2">{{ Form::number('order', $paymentMethod->order) }}<br></div>
                    <div class="mt-2">{{ Form::label('segment', 'Segment') }}</div>
                    <div class="mt-2">{{ Form::number('segment', $paymentMethod->segment) }}<br></div>
                    <div class="mt-2">{{ Form::label('name', 'Name') }}</div>
                    <div class="mt-2">{{ Form::text('name', $paymentMethod->name) }}<br></div>
                    <div class="mt-2">{{ Form::label('max_error', 'Max error') }}</div>
                    <div class="mt-2">{{ Form::number('max_error', $paymentMethod->max_error) }}<br></div>
                    <div class="mt-2">{{ Form::submit('Create', ['class' => "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"]) }}</div>
                    {{ Form::close() }}

                </div>
            </div>
    </section>
@endsection
