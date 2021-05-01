@extends('layouts.common')

@section('title','一覧ページ')

@include('layouts.header')

@section('content')

<h1>Todo一覧</h1>

<!-- @if (Auth::check())
<p>ログインしているユーザー名: {{$user->name . ' (' . $user->email . ')'}}</p>
@else
<p>※ログインしていません。（<a href="/todos/auth">ログイン</a>｜
  <a href="/todos/register">登録</a>）</p>
@endif -->

<table class="table">
  <tr>
    <th scope="col">#</th>
    <th scope="col">タスク名</th>
    <th scope="col">状態</th>
    <!-- <th scope="col">登録日</th> -->
    <th scope="col">期限日</th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>
  @foreach ($todos as $todo)
  <tr>
    <td>{{$todo->id}}</td>
    <td>{{$todo->title}}</td>
    <td><span class="label {{ $todo->status_class }}">{{$todo->status_label}}</span></td>
    <!-- <td>{{$todo->created_at}}</td> -->
    <td>{{$todo->due_date}}</td>
    <td><a class="btn btn-outline-secondary" href="{{ route('todos_edit', $todo->id)}}">編集</a></td>
    <td>
      <form action="{{ route('todos_delete', $todo->id)}}" method="POST">
        @csrf
        <input class="btn btn-danger" id="js-delete" type="submit" value="削除"></input>
      </form>
    </td>
  </tr>
  @endforeach
</table>

<div class="linkWrapper">
  {{ $todos->links() }}
</div>

<div class="linkWrapper">
  <a class="bg-secondary link" href="{{route('todos_create')}}">タスクを登録</a>
</div>

@endsection
