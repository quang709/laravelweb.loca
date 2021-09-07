@extends('admin.layout.index')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>  video news <small class="page-info text-secondary-d2">
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
                <h3>Add video news</h3>
            </div>
            <!-- enctype="multipart/form-data" -->
            <form action="{{ route('add_videonews') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="card-body">




                    <div class="form-group">


                        <label>title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title ">
                    </div>

                    <div class="form-group">
                        <label>path</label>
                        <textarea  id="summernote1" name="path">

                   </textarea>
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
