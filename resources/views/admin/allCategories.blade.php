@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        List of all categories
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{route ('admin')}}">Main</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> All Categories
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @if (session('newCategoryTitle') and session('newCategoryId'))
                <div class="alert alert-success">
                    Category <strong>{{ session('newCategoryTitle') }}</strong> added. You should <a href="{{route('viewCategory', session('newCategoryId'))}}" class="alert-link">see this category</a>.
                </div>
            @endif
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
                            {{--<th>Description</th>--}}
                            {{--<th>Keywords</th>--}}
                            {{--<th>H1 Title</th>--}}
                            {{--<th>Article</th>--}}
                            <th>Parent Category</th>
                            <th>Created At</th>
                            <th></th>
                            {{--<th>Updated At</th>--}}
                            {{--<th>Published At</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td><a href="{{route('updateCategory', $category->id)}}">{{$category->title}}</a> </td>
                            {{--<td>{{$category->description}}</td>--}}
                            {{--<td>{{$category->keywords}}</td>--}}
                            {{--<td>{{$category->h1}}</td>--}}
                            {{--<td>{{$category->content}}</td>--}}
                            <td>{{$category->parent_category_id}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('updateCategory', $category->id)}}" class="btn btn-primary" role="button">Редактировать</a>
                                <a href="{{route('deleteCategory', $category->id)}}" class="btn btn-danger" role="button">Удалить</a>
                            </td>
                            {{--<td>{{$category->updated_at}}</td>--}}
                            {{--<td>{{$category->published_at}}</td>--}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <li><a href="{{$categories->previousPageUrl()}}"> << </a></li>
                            @for ($i = 1; $i <= $categories->lastPage(); $i++)
                            <li><a href="{{route('allCategory')}}?page={{$i}}">{{$i}}</a></li>
                            @endfor
                            <li><a href="{{$categories->nextPageUrl()}}"> >> </a></li>
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
