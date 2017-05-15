@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add Category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{route ('admin')}}">Main</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Add Category
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @if (session('categoryUpdated'))
                <div class="alert alert-success">
                    <strong>{{ session('categoryUpdated') }}</strong>
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

                    <form role="form" method="post" action="{{route('refreshCategory', $category->id)}}">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="id" value="{{$category->id}}">--}}
                        <div class="form-group">
                            <label>Category Title</label>
                            <input class="form-control" name="title" value="{{$category->title }}">
                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>

                        <div class="form-group">
                            <label>SEO Description</label>
                            {{--<textarea class="form-control" rows="2" name="description" >{{ old('description') }}</textarea>--}}
                            <textarea class="form-control" rows="2" name="description" >{{ $category->description or old('description')}}</textarea>
                            <p class="help-block">Description for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>SEO Keywords</label>
                            <input class="form-control" name="keywords" value="{{ $category->keywords }}">
                            <p class="help-block">Keywords for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>H1 tag Title</label>
                            <input class="form-control" name="h1" value="{{ $category->h1 }}">
                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>

                        <div class="form-group">
                            <label>Category Content</label>
                            <textarea class="form-control" rows="3" name="article" >{{ $category->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Select Parent Category</label>
                            <select class="form-control" name="parentCategory" >
                                <option selected disabled >Select Parent Category</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old("parentCategory") == $category->id ? "selected":"" }}>{{ $category->title }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Published at</label>
                        <div class='input-group date col-lg-2' id='datetimepicker2'>
                        <input type='text' class="form-control" name="published_at" value="{{ $category->published_at }}">
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                        </div>


                        <script type="text/javascript">
                        $(function () {
                        $('#datetimepicker2').datetimepicker({
                        locale: 'ru'
                        });
                        });
                        </script>

                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection
