@extends('layouts.common')

@section('title', 'ユーザー登録')

@section('layouts.header')

@section('content')
<p>{{$message}}</p>
<form action="/todos/register" method="post">
  <table>
    @csrf
    <tr>
      <th>メールアドレス: </th>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <th>パスワード: </th>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <th></th>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>
@endsection
