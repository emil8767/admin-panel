@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
<div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
<div class="grid col-span-full">
<h1 class="mb-5">Users</h1>
@can('create', $user)
<div>
    <a href="{{route('users.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create user            </a>
</div>
@endcan

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Role</th>
                <th>Created_at</th>
                @can('update', $user)<td>Actions</td>@endcan
            </tr>
        </thead>
        @foreach ($users as $user)
        <tr class="border-b border-dashed text-left">
                <td>{{$user->id}}</td>
                <td>
                    <a class="text-blue-600 hover:text-blue-900" href="{{ route('users.show', $user) }}">
                    {{$user->name}}
                    </a>
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->role->name ?? ''}}</td>
                <td>{{$user->created_at}}</td>
                @can('update', $user)
                <td>
                    <a class="text-blue-600 hover:text-blue-900" href="{{ route('users.edit', $user) }}">
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