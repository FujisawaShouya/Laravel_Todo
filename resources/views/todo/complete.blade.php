<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>ToDoアプリ</title>
</head>
<body>
  <a href="/">Todoリスト</a>
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
</body>
</html>