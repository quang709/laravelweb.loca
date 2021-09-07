

@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Type Of News  <small class="page-info text-secondary-d2">
               <i class="fa fa-angle-double-right text-80"></i>
              {{$typeofnews->name}}
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
             <h3>Edit type Of news</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{ route('edit_typeofnews' ,['id'=> $typeofnews->id]) }}" method="POST">
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <div class="card-body">

               <div class="form-group">


                 <label>name</label>
                 <select class="form-control form-control"  name="category">
                                    @foreach($category as $tl)
                                    <option
                                    @if($typeofnews->id_category == $tl->id)
                                    {{"selected"}}
                                    @endif

                                     value="{{$tl->id}}">{{$tl->name}}</option>
                                   @endforeach
                                </select>
               </div>
                 <div class="form-group">


                   <label>name</label>
                   <input type="text" class="form-control" name="name"  value="{{$typeofnews->name}}"  placeholder="Enter category name">
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
