@extends('layouts.common')

@section('title','一覧ページ')

@include('layouts.header')

@section('content')
<h1>タスク登録</h1>

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<form action="{{ route('todos_store')}}" method="POST">
  @csrf
  <div class="">
    <label for="title">タスク名</label>
    <input type="text" name="title" id="title" value="">
  </div>
  <div class="form-group">
    <label for="status">状態</label>
    <select name="status" id="status" class="form-control">
      <option value="1">未着手</option>
      <option value="2">着手中</option>
      <option value="3">完了</option>
    </select>
  </div>
  <input type="submit" value="確定">
</form>

@endsection

@include('layouts.footer')
