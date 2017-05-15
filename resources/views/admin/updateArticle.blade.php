@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add Article
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{route ('admin')}}">Main</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Add Article
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @if (session('updated'))
                <div class="alert alert-success">
                    <strong>{{ session('updated') }}</strong>. <a href="{{route('viewArticle', $article->id)}}"
                                                                  target="_blank">See article</a>
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

                    <form role="form" method="post" action="{{route('refreshArticle', $article->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Article Title</label>
                            <input class="form-control" name="title" value="{{$article->title }}">
                        </div>

                        <div class="form-group">
                            <label>SEO Description</label>
                            {{--<textarea class="form-control" rows="2" name="description" >{{ old('description') }}</textarea>--}}
                            <textarea class="form-control" rows="2"
                                      name="description">{{ $article->description or old('description')}}</textarea>
                            <p class="help-block">Description for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>SEO Keywords</label>
                            <input class="form-control" name="keywords" value="{{ $article->keywords }}">
                            <p class="help-block">Keywords for Search Engines</p>
                        </div>

                        <div class="form-group">
                            <label>H1 tag Title</label>
                            <input class="form-control" name="h1" value="{{ $article->h1 }}">
                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        </div>

                        <div class="form-group">
                            <label>Category Content</label>
                            <textarea class="form-control" rows="5" name="article">{{ $article->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Ali Keywords</label>
                            <textarea class="form-control" rows="5" name="alikeywords">@foreach( $article->alikeywords as $item){{$item->name.PHP_EOL}}@endforeach</textarea>
                        </div>

                        <div class="form-group">
                            <label>Ali Categories ID</label>
                            <textarea class="form-control" rows="5" name="alicategories">{{$article->alicategories}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control" name="category">
                                <option selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    @if($category->id == $categoryId)
                                        <option selected value="{{$categoryId}}">{{ $category->title }}</option>
                                    @else
                                        <option value="{{$category->id}}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Published at</label>
                            <div class='input-group date col-lg-2' id='datetimepicker2'>
                                <input type='text' class="form-control" name="published_at"
                                       value="{{ $article->published_at }}">
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
