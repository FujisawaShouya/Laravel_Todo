<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>ToDoアプリ</title>
</head>
<body class="flex flex-col min-h-screen">
  <div class="flex justify-between">
    <p class="text-4xl font-medium py-5 pl-9">ToDo</p>
    <div>
      <a href="/" class="inline-block py-7 pr-9">ToDoリストへ戻る</a>
    </div>
  </div>

  <div class="bg-gray-100 h-full">
    <table>
      <tr>
        <th>完了日</th>
        <th>期限</th>
        <th>やったこと</th>
      </tr>

      @foreach($items as $item)
      <form action="/relisted" method="POST">
      @csrf
      <tr>
        <input type="hidden" name="id" value="{{$item->id}}">
        <td>{{$item->completed_date}}</td>
        <td>{{$item->deadline}}</td>
        <td>{{$item->list}}</td>
        <td><button type="submit" name="relisted">元に戻す</button></td>
      </tr>
      </form>
      @endforeach
    </table>
  </div>

  <div class="text-center mt-auto">
    <p class="block pt-1 font-semibold text-center">ToDo, inc</p>
  </div>
</body>
</html>