@extends('layouts.admin')
@section('title', '登録済みトレーニングの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>トレーニング一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TrainingController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TrainingController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">タイトル</th>
                                <th width="15%">ジャンル</th>
                                <th width="15%">人数</th>
                                <th width="15%">難易度</th>
                                <th width="15%">ステップ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $training)
                               <tr>
                                    <th>{{ $training->id }}</th>
                                    <td>{{ str_limit($training->title, 100) }}</td>
                                    <td>{{ str_limit($training->genre, 100) }}</td>
                                    <td>{{ str_limit($training->number, 100) }}</td>
                                    <td>{{ str_limit($training->difficulty, 100) }}</td>
                                    <td>{{ str_limit($training->step, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TrainingController@edit', ['id' => $training->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\TrainingController@delete', ['id' => $training->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection