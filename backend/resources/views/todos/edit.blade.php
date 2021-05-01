@extends('layouts.common')

@section('title','タスク編集ページ')

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
    <input class="form-control" type="text" name="title" id="title" value="{{ $todo->title }}" placeholder="タスク名を入力">
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
        {{ $val['label_text'] }}
      </option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="due_date">期限</label>
    <input type="text" class="form-control" name="due_date" id="due_date" value="{{ $todo->due_date}}" />
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
