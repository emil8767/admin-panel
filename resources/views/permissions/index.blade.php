@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
<div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
<div class="grid col-span-full">
<h1 class="mb-5">Permissions</h1>
@can('create', $permission)
<div>
    <a href="{{route('permissions.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create permission            </a>
</div>
@endcan

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created_at</th>
            </tr>
        </thead>
        @foreach ($permissions as $permission)
        <tr class="border-b border-dashed text-left">
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td>{{$permission->created_at}}</td>
            </tr>
        @endforeach
            </table>
    
</div>
            </div>
        </section>
@endsection