@extends('layouts.admin')
@section('title', 'トレーニングの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>トレーニング編集</h2>
                <form action="{{ action('Admin\TrainingController@update') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="title" value="{{ $training_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="genre" value="{{ $training_form->genre }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">人数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="number" value="{{ $training_form->number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">難易度</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="difficulty" value="{{ $training_form->difficulty }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ステップ</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="step" value="{{ $training_form->step }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">作成者</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="author" value="{{ $training_form->author }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">URL</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="url" value="{{$training_form->url }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                 <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($training_form->histories != NULL)
                                @foreach ($training_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection