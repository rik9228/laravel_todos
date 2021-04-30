@extends('layouts.common')

@section('title','一覧ページ')

@include('layouts.header')

@section('content')
<h1>タスク編集</h1>

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<form action="{{ route('todos_update', $todo->id)}}" method="POST">
  @csrf
  <div class="form-group">
    <p>タスクID：{{ $todo->id }}</p>
  </div>
  <div class="form-group">
    <label for="title">タスク名：</label>
    <input type="text" name="title" id="title" value="{{ $todo->title }}">
  </div>
  <div class="form-group">
    <label for="status">状態</label>
    <select name="status" id="status" class="form-control">
      <!-- key と val を参照 -->
      <!-- foreachで'STATUS'を回す -->
      @foreach(\App\Models\Todo::STATUS as $key => $val)
      <!-- valueには$keyを出力 $keyとデータベースに登録済のタスク状態を比較して一致するものに'selected'を付与する -->
      <option value="{{ $key }}" {{ $key == $todo->status ? 'selected' : '' }}>
        <!-- $valのラベルを出力する -->
        {{ $val['label'] }}
      </option>
      @endforeach
    </select>
  </div>
  <input type="submit" value="確定">
</form>

@endsection

@include('layouts.footer')
