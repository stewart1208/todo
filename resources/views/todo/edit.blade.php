<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{$todo->title}}</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-slate-50">
    <div class="bg-slate-100 shadow-xl w-1/3 p-3">
        <form action="{{ route('todo.update', ['todo' => $todo]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-8 h-max">
                <input type="text" name="title" value="{{$todo-> title}}" class="h-12 w-full text-center text-4xl">
                <select name="difficulty" class="h-12 w-full text-center text-4xl">
                    <option value="hard" selected>HARD</option>
                    <option value="easy">EASY</option>
                </select>
                <button type="submit" class="w-full h-12 text-center text-3xl text-white bg-green-600 hover:bg-green-700">submit</button>
            </div>
        </form>
        <form action="{{ route('todo.destroy',['todo'=>$todo]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-3 w-full h-12 text-center text-3xl text-white bg-red-600 hover:bg-red-700">destroy</button>
        </form>
    </div>
</body>
</html>
