@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Slide  <small class="page-info text-secondary-d2">
               <i class="fa fa-angle-double-right text-80"></i>
              {{$slide->name}}
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
             <h3>Edit Slide</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{ route('edit_slide' ,['id'=> $slide->id]) }}" method="POST"  enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <div class="card-body">
                 <div class="form-group">
                   <label>name</label>
                   <input type="text" class="form-control" name="Name" value="{{$slide->name}}"  placeholder="Enter  name">
                 </div>

                 <div class="form-group">
                   <label>content</label>
                    <textarea id="summernote1"  name="Content">
                    {{$slide->content}}
                   </textarea>

                               <div class="form-group">
                                <label>link</label>
                                <input class="form-control" name="Link" placeholder="enter link"  value="{{$slide->link}}"/>
                            </div>



                            <div class="form-group">
                        <label>image</label>
                        <div class="input-group">
                            <input id="ckfinder-input-1" class="form-control" value="{{$slide->image}}" name="Image" type="text"
                                   placeholder="image" style="width:60%">
                            <div class="input-group-append">
                                <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server</button>
                            </div>
                        </div>
                    </div>
               </div>


               <!-- /.card-body -->

               <div class="card-footer " style="margin-top: 300px;">

                 <button type="submit" class="btn btn-primary">Edit</button>
                <button type="reset" class="btn btn-danger">reset </button>
               </div>
             </form>
           </div>
</div>


@endsection
