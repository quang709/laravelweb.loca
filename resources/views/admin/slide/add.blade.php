@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Slide  <small class="page-info text-secondary-d2">
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
             <h3>Add Slide</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{route('add_slide')}}"  method="POST" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <div class="card-body">
                 <div class="form-group">
                   <label>name</label>
                   <input type="text" class="form-control" name="Name"  placeholder="Enter  name">
                 </div>
                 <div class="form-group">
                   <label>Content</label>
                   <textarea id="summernote1"  name="Content">

                   </textarea>
                 </div>
                 <div class="form-group">
                   <label>link</label>
                   <input type="text" class="form-control" name="Link"  placeholder="Enter link">
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

               </div>
               <!-- /.card-body -->

               <div class="card-footer ">

                 <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-danger">reset </button>
               </div>
             </form>
           </div>
</div>


@endsection
