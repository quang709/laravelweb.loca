@extends('admin.layout.index')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> News <small class="page-info text-secondary-d2">
                            <i class="fa fa-angle-double-right text-80"></i>
                            Add
                        </small></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif






        @if(session('messenger'))
            <div class="alert alert-success">
                {{session('messenger')}}
            </div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
                <h3>Add News</h3>
            </div>
            <!-- enctype="multipart/form-data" -->
            <form action="{{ route('add_news') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="card-body">

                    <div class="form-group">


                        <label>Category</label>
                        <select class="form-control form-control" id="Category">
                            @foreach($category as $tl)
                                <option value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">


                        <label>Type of news</label>
                        <select class="form-control form-control" name="Typeofnews" id="Typeofnews">

                        </select>
                    </div>
                    <div class="form-group">


                        <label>title</label>
                        <input type="text" class="form-control" name="Title" placeholder="Enter title ">
                    </div>

                    <div class="form-group">
                        <label>summary</label>
                        <textarea  id="summernote1" name="Summary">

                   </textarea>
                    </div>


                    <div class="form-group">
                        <label>content</label>
                        <textarea  id="editor" name="Content"> </textarea>
                    </div>


                    <div class="form-group">
                        <label>image</label>
                        <div class="input-group">
                            <input id="ckfinder-input-1" class="form-control" name="Image" type="text"
                                   placeholder="image" style="width:60%">
                            <div class="input-group-append">
                                <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>hightlight</label>
                        <div>
                            <label class="radio-inline">
                                <input name="Highlight" value="0" checked="" type="radio">no
                            </label>
                            <label class="radio-inline">
                                <input name="Highlight" value="1" type="radio">yes
                            </label>
                        </div>
                    </div>

                </div>

                <div class="card-footer ">

                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>


@endsection


@section('script')
<script type="text/javascript">


// var  editor = CKEDITOR.replace('editor');
// CKFinder.setupCKEditor(editor);


$(document).ready(function () {

    var id_category = $('#Category').val();
    $.get("admin/ajax/typeofnews/" + id_category, function (data) {
        $("#Typeofnews").html(data);
    });


    $('#Category').change(function () {
        var id_category = $('#Category').val();
        $.get("admin/ajax/typeofnews/" + id_category, function (data) {
            $("#Typeofnews").html(data);
        });
    });

});
</script>
@endsection
