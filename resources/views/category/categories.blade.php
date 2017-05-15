@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading"> <a href="/category/{{$category->id}}">{{$category->title}}</a></div>
                    <div class="panel-body">
                        {{$category->description}}
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
