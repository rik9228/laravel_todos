@extends('layouts.common')

@section('title','一覧ページ')

@include('layouts.header')
@section('content')

<h1>Todo一覧</h1>
<table class="table">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">タイトル</th>
    <th scope="col">状態</th>
    <th scope="col">登録日</th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>
  @foreach ($todos as $todo)
  <tr>
    <td>{{$todo->id}}</td>
    <td>{{$todo->title}}</td>
    <td><span class="label {{ $todo->status_class }}">{{$todo->status_label}}</span></td>
    <td>{{$todo->created_at}}</td>
    <td><a class="btn btn-primary" href="{{ route('todos_edit', $todo->id)}}">編集</a></td>
    <td>
      <form action="{{ route('todos_delete', $todo->id)}}" method="POST">
        @csrf
        <input class="btn btn-secondary" type="submit" value="削除"></input>
      </form>
    </td>
  </tr>
  @endforeach
</table>

<div class="linkWrapper">
  <a class="bg-secondary link" href="{{route('todos_create')}}">タスクを登録</a>
</div>

@endsection

@include('layouts.footer')
