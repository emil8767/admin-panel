@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
    <h1 class="mb-5">Create user</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
{{ Form::model($user, ['route' => 'users.store']) }}
<div class="flex flex-col">
<div>{{ Form::label('name', 'Name') }}</div>
<div class="mt-2">{{ Form::text('name', $user->name, ['class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
<div class="mt-2">{{ Form::label('email', 'Email') }}</div>
<div class="mt-2">{{ Form::email('email', $user->email, ['class' => 'rounded border-gray-300 w-1/3', 'cols' => '50', 'rows' => '10']) }}<br></div>
<div class="mt-2">{{ Form::label('password', 'Password') }}</div>
<div class="mt-2">{{ Form::password('password', $user->password, ['class' => 'rounded border-gray-300 w-1/3 h-32', 'cols' => '50', 'rows' => '10']) }}<br></div>
<div class="mt-2">{{ Form::label('phone', 'Phone') }}</div>
<div class="mt-2">{{ Form::number('phone', $user->phone, ['class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
<div class="mt-2">{{ Form::label('status', 'Status') }}</div>
<div class="mt-2">{{ Form::select('status', $statuses, $user->status, ['placeholder' => 'Search status...', 'class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
<div class="mt-2">{{ Form::label('role_id', 'Role') }}</div>
<div>{{Form::select('role_id', $roles, null, ['placeholder' => '', 'class' => 'rounded border-gray-300 w-1/3'])}}</div>
<div class="mt-2">{{ Form::submit('Create', ['class' => "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"]) }}</div>
{{ Form::close() }}

</div>
            </div>
        </section>
        @endsection