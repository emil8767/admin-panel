@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
<div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
<div class="grid col-span-full">
<h1 class="mb-5">Roles</h1>
@can('create', $role)
<div>
    <a href="{{route('roles.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create role            </a>
</div>
@endcan

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created_at</th>
                @can('update', $role)
                <th>Actions</th>
                @endcan
            </tr>
        </thead>
        @foreach ($roles as $role)
        <tr class="border-b border-dashed text-left">
                <td>{{$role->id}}</td>
                <td>
                    <a class="text-blue-600 hover:text-blue-900" href="{{ route('roles.show', $role) }}">
                    {{$role->name}}
                    </a>
                </td>
                <td>{{$role->description}}</td>
                <td>{{$role->created_at}}</td>
                @can('update', $role)
                <td>
                    <a class="text-blue-600 hover:text-blue-900" href="{{ route('roles.edit', $role) }}">
                        Update
                    </a>
                </td>
                @endcan
            </tr>
        @endforeach
            </table>
    
</div>
            </div>
        </section>
@endsection