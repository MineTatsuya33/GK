@extends('layouts.admin')
@section('title', 'お気に入りトレーニングの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>お気に入りトレーニング一覧</h2>
        </div>
        <div class="row">
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
                            @foreach($trainings as $training)
                               <tr>
                                    <th>{{ $training->id }}</th>
                                    <td>{{ str_limit($training->title, 100) }}</td>
                                    <td>{{ str_limit($training->genre, 100) }}</td>
                                    <td>{{ str_limit($training->number, 100) }}</td>
                                    <td>{{ str_limit($training->difficulty, 100) }}</td>
                                    <td>{{ str_limit($training->step, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('TrainingController@like', ['id' => $training->id]) }}">★</a>
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