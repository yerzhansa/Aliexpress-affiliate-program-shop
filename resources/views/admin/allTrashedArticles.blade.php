@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        List Of All Trashed Articles
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{route ('admin')}}">Main</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Articles
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Parent Category</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{$article->title}} </td>
                            <td>{{$article->parent_category_id}}</td>
                            <td>{{$article->created_at}}</td>
                            <td>
                                <a href="{{route('restoreTrashedArticle', $article->id)}}" class="btn btn-primary" role="button">Восстановить</a>
                                <a href="{{route('forceDeleteArticle', $article->id)}}" class="btn btn-danger" role="button">Удалить</a>


                            </td>
                            {{--<td>{{$article->updated_at}}</td>--}}
                            {{--<td>{{$article->published_at}}</td>--}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <li><a href="{{$articles->previousPageUrl()}}"> << </a></li>
                            @for ($i = 1; $i <= $articles->lastPage(); $i++)
                            <li><a href="{{route('allTrashedArticles')}}?page={{$i}}">{{$i}}</a></li>
                            @endfor
                            <li><a href="{{$articles->nextPageUrl()}}"> >> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection
