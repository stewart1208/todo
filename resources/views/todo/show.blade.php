<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$todo->title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <body class="flex flex-col h-screen bg-yellow-300 text-center text-4xl "
    ondblclick="window.location='{{route('todo.edit',['todo'=>$todo])}}'">
        <h2>{{ $todo->title }}</h2>
        <h2> is : {{$todo->difficulty }}</h2>
        <h2>
        @if ($todo->status)       
        It has been completed 
        @else
        Not completed yet 
        @endif
        <h2>created at : {{$todo->created_at}}</h2>
        
        <button 
            class="bg-green-400 hover:bg-green-500 mt-auto p-4 w-1/3 rounded-xl self-center m-8"
            onclick="window.location='{{ route('todo.index') }}'"
        >
            Return at Home
        </button>
    </body>
</html>
