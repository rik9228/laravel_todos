@extends('layouts.common')

@section('title', 'ユーザー登録')

@section('layouts.header')

@section('content')
<form action="{{ route('users_create')}}" method="post">
  <table>
    @csrf
    <tr>
      <th>氏名:</th>
      <td><input type="text" name="user[name]"></td>
    </tr>
    <tr>
      <th>メールアドレス: </th>
      <td><input type="text" name="user[email]"></td>
    </tr>
    <tr>
      <th>パスワード: </th>
      <td><input type="password" name="user[password]"></td>
    </tr>
    <tr>
      <th></th>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>
@endsection
