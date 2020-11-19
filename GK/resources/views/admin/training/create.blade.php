@extends('layouts.admin')
@section('title', 'トレーニングの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>トレーニング新規作成</h2>
                <form action="{{ action('Admin\TrainingController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">メニュー名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="genre" value="{{ old('genre') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">人数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="number" value="{{ old('number') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">難易度</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="difficulty" value="{{ old('difficulty') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ステップ</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="step" value="{{ old('step') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">作成者</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">URL</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection