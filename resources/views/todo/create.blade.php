<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD ONE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="flex place-content-center ">
        <form action="{{ route('todo.store') }}" method="post">
            @csrf
            @method('POST')
            <div class=" bg-slate-100 flex flex-col shadow-2xl gap-5 p-5 ">
                <input
                type="text" 
                name="title" 
                placeholder="title"
                class="w-full h-12 text-center text-2xl">
                <select 
                name="difficulty"
                class="w-full h-12 text-center text-2xl">
                    <option value="hard">Hard</option>
                    <option value="easy">Easy</option>
                </select>
                <input  type="hidden" name="user_id" value="2" readonly >
                <button 
                type="submit"
                class="w-3/4 h-10 rounded-md text-center text-3xl text-white self-center bg-blue-600 hover:bg-blue-700">Crée</button>
            </div>
        </form>
    </div>
    
</body>
</html>