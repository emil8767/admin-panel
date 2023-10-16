@extends('layouts.app')

@section('content')
    <section class="bg-white bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">Update payment method</h1>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{ Form::model(null, ['route' => ['update-disb'], 'method' => 'POST']) }}
                <div class="flex flex-col">
                    <div class="mt-2">{{ Form::select('status', ['done' => 'Done', 'new' => 'New'], [], ['placeholder' => 'Select status...', 'class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
                    <div class="mt-2">{{ Form::label('Comments', 'Comment') }}</div>
                    <div class="mt-2">{{ Form::text('comments') }}<br></div>
                    <div class="mt-2">{{ Form::hidden('id', $id)}}<br></div>

                    <div class="mt-2">{{ Form::submit('Update', ['class' => "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"]) }}</div>
                    {{ Form::close() }}

                </div>
            </div>
    </section>
@endsection
