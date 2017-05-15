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

                    <form role="form" method="post" action="{{route('storeCategory')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Category Title</label>
                            <input class="form-control" name="title" value="{{ old('title') }}">
                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>

                        <div class="form-group">
                            <label>SEO Description</label>
                            <textarea class="form-control" rows="2" name="description" >{{ old('description') }}</textarea>
                            <p class="help-block">Description for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>SEO Keywords</label>
                            <input class="form-control" name="keywords" value="{{ old('keywords') }}">
                            <p class="help-block">Keywords for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>H1 tag Title</label>
                            <input class="form-control" name="h1" value="{{ old('h1') }}">
                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>

                        <div class="form-group">
                            <label>Category Content</label>
                            <textarea class="form-control" rows="3" name="article" >{{ old('article') }}</textarea>
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
                        <input type='text' class="form-control" name="published_at" value="{{ old('published_at') }}">
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
