@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">{{$category->title}}
                @foreach($contents as $content)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="" {{$content['title']}} </div>
                        <div class="panel-body">
                            {{$content['id']}}
                        </div>

                    </div>@endforeach
            </div>
        </div>
    </div>
@endsection
