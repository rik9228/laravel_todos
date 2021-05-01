@extends('layouts.common')

@section('title','一覧ページ')

@include('layouts.header')

@section('content')
<h1>タスク登録</h1>

@foreach ($errors->all() as $error)
<li class="alert alert-danger">{{$error}}</li>
@endforeach

<form action="{{ route('todos_store')}}" method="POST">
  @csrf
  <div class="">
    <label for="title">タスク名</label>
    <input type="text" class="form-control" name="title" id="title" value="">
  </div>
  <div class="form-group">
    <label for="status">状態</label>
    <select name="status" id="status" class="form-control">
      <option value="1">未着手</option>
      <option value="2">着手中</option>
      <option value="3">完了</option>
    </select>
  </div>
  <div class="form-group">
    <label for="due_date">期限</label>
    <input type="text" class="form-control" name="due_date" id="due_date" />
  </div>
  <input class="btn btn-success" type="submit" value="確定">
  <a class="btn btn-secondary" href="{{route('todos_index')}}">戻る</a>
</form>

@endsection

@push('js_due_date')
<script>
  flatpickr(document.getElementById("due_date"), {
    locale: "ja",
    dateFormat: "Y/m/d",
    minDate: new Date(),
  });
</script>
@endpush
