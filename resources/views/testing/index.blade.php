@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
    <h1 class="mb-5">Testing</h1>
<body>
    <form action='localhost/api/job/create' method="POST">
        <label for="json">JSON:</label><br>
        <textarea id="json" name="json" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Отправить" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </form>
</body>

</div>
            </div>
        </section>
@endsection
