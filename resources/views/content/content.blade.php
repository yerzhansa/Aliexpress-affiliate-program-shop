@extends('layouts.app',['title' => $contents->title, 'desc' => $contents->description, 'keywords' => $contents->keywords])

@section('content')
    <div class="container down-x">
        <h1>{{$contents->h1}}</h1>
        <div class="row">
            @if(!empty($ali))
                @foreach($ali as $prod)
                    @if(is_array($prod))
                    @foreach($prod as $item)
                        {{--@if(is_array($item))--}}
                            <div class="col-md-3 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="{{$item['ali_url']}}" target="_blank">
                                            <img src="{{$item['img_url']}}_350x350.jpg" class="img-responsive"
                                                 style="width:100%;" alt="Image">
                                        </a>

                                    </div>
                                    <div class="price"><a href="{{$item['ali_url']}}"
                                                          target="_blank">{{$item['local_price']}}</a></div>
                                </div>
                            </div>
                        {{--@endif--}}
                    @endforeach
                    @else
                    @unless(empty($prod))
                        <div class="col-md-12 text-center">
                            <h3><a href="https://ru.aliexpress.com/wholesale?SearchText={{$prod}}&SortType=total_tranpro_desc&g=y"
                                target="_blank">Показать еще</a></h3>
                        </div>
                    @endunless
                    @endif
                @endforeach
            @endif
        </div>
        <br><br>
        <div class="col-sm-12 text-left">
             <p>{{$contents->content}}</p>
        </div>
    </div><br>
@endsection
