 <div class="row">
        <div class="col-sm-4">
            <div class="text-center my-4">
                <h3 class="brown border p-2">トレーニング検索</h3>
            </div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
               <div class="form-group">
                    {!! Form::label('genre', 'ジャンル:') !!}
                    {!! Form::select('genre', ['指定なし' => '指定なし'] + Config::get('genre.zyanru') ,'指定なし') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', '人数:') !!}
                    {!! Form::select('number', ['指定なし' => '指定なし'] + Config::get('number.ninzuu') ,'指定なし') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('difficulty', '難易度:') !!}
                    {!! Form::select('difficulty', ['指定なし' => '指定なし'] + Config::get('difficulty.nanido') , '指定なし') !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8">
            <div class="text-center my-4">
                <h3 class="brown p-2">トレーニング一覧</h3>
            </div>

            <div class="container">
                <!--検索ボタンが押された時に表示されます-->
                @if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>ジャンル</p>
                            </div>
                            <div class="col-sm-4">
                                <p>人数</p>
                            </div>
                            <div class="col-sm-4">
                                <p>難易度</p>
                            </div>
                        </div>
　　　　　　　　　　　　　　//検索条件に一致したユーザを表示します
                        @foreach($data as $item)
                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-sm-4">
                                        <a href="">{{ $item->genre }}</a>
                                    </div>
                                    <div class="col-sm-4">
                                        {{ $item->number }}
                                    </div>
                                    <div class="col-sm-4">
                                        {{ $item->difficulty }}
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>