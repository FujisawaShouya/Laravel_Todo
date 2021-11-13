<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>ToDoアプリ</title>
</head>
<body class="h-full">
  <div class="flex justify-between">
    <p class="text-4xl font-medium py-5 pl-9">ToDo</p>
    <div>
      <a href="/list" class="inline-block py-7 pr-9">完了済み一覧</a>
      <a href="/logout" class="inline-block py-7 pr-9">ログアウト</a>
    </div>
  </div>

  <div class="bg-gray-100 h-5/6">
    <h2>{{Auth::user()->name}}さんのToDo List</h2>
    @error('content')
    <h3>Error:{{$message}}</h3>
    @enderror
    <form action="/create" method="POST">
      @csrf
      <input type="text" name="content" placeholder="やること">
      <input type="text" name="date" id="date" onfocus="this.type='date'" onfocusout="this.type='text'" placeholder="期限">
      <button type="submit" name="create">追加</button>
    </form>

    <table>
      <tr>
        <th>期限</th>
        <th>やること</th>
        <th>更新</th>
        <th>完了</th>
      </tr>
      @error('updated_content')
      <h3>Error: {{$message}} </h3>
      @enderror
      
      @foreach($items as $item)
      <tr>
        <td> {{$item -> deadline}} </td>
        <form action="/update" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$item -> id}}">

        <td><input type="text" name="updated_content" value="{{$item -> content}}"></td>
        <td><button type="submit" name="update">更新</button></td>
        </form>

        <form action="/complete" method="POST">
        <td><button type="submit" name="complete">完了</button></td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>

  <div class="text-center">
    <p class="block pt-2 font-semibold text-center">ToDo, inc</p>
  </div>
</body>
</html>