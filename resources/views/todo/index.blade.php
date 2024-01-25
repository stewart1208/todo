<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODOS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100 p-1">
    <div class="grid grid-cols-3 gap-4 p-5 h-screen">
        @foreach ($todos as $todo)
            <div class=" h-full bg-yellow-300 hover:bg-yellow-400 text-center text-3xl "
            ondblclick="window.location='{{ route('todo.show',['todo'=>$todo]) }}'"
            x-data="{ open: {{$todo->status}} }">
                <h1 >
                    {{ $todo->title }}
                </h1>
                <h2 >is : {{ $todo->difficulty }} </h2>
                <h2>status : @if ($todo->status)
                        true
                    @else
                        false
                    @endif
                </h2>
                <form 
                action="{{route('changeStatus',['todo'=>$todo])}}" 
                method="post"
                >
                @csrf
                @method('PUT')
                <label for="status">Completed :</label>
                <input 
                type="checkbox" 
                name="status"
                class="w-8 h-8"
                x-on:change="open = ! open"
                onchange="this.form.submit()">
                </form>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center">
        <button 
        class="w-2/4 h-12 rounded-lg bg-green-600 text-white hover:bg-green-700" 
        onclick="window.location='{{ route('todo.create') }}'">
            ADD ONE
        </button>
    </div>

</body>

</html>
