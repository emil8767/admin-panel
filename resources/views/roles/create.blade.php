@extends('layouts.app')

@section('content')
<section class="bg-white bg-gray-900">
            <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
    <h1 class="mb-5">Create role</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{ Form::model($role, ['route' => 'roles.store']) }}
<div class="flex flex-col">
<div>{{ Form::label('name', 'Name') }}</div>
<div class="mt-2">{{ Form::text('name', $role->name, ['class' => 'rounded border-gray-300 w-1/3']) }}<br></div>
<div class="mt-2">{{ Form::label('description', 'Description') }}</div>
<div class="mt-2">{{ Form::textarea('description', $role->description, ['class' => 'rounded border-gray-300 w-1/3 h-32', 'cols' => '50', 'rows' => '10']) }}<br></div>
<div class="mt-2">{{ Form::label('permission_id[]', 'Permission') }}</div>
<div>{{Form::select('permission_id[]', $permissions, null, ['placeholder' => '', 'multiple', 'class' => 'rounded border-gray-300 w-1/3'])}}</div>
<div class="mt-2">{{ Form::submit('Create', ['class' => "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"]) }}</div>
{{ Form::close() }}

</div>
            </div>
        </section>
        @endsection
