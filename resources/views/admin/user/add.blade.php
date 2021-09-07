@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>User  <small class="page-info text-secondary-d2">
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
             <h3>Add User</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{route('add_user')}}" method="POST">
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <div class="card-body">
               <div class="form-group">
                                <label> name</label>
                                <input class="form-control" name="Name" placeholder="enter name" />
                            </div>
                            <div class="form-group">
                                <label> Email</label>
                                <input type="email" class="form-control" name="Email" placeholder="enter email" />
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input class="form-control" type="password" name="Password" placeholder="enter password" />
                            </div>

                            <div class="form-group">
                                <label> password again</label>
                                <input class="form-control" type="password" name="passwordAgain" placeholder="enter password again" />
                            </div>

                            <div class="form-group">
                                <label>position</label>
                                <div>
                                <label class="radio-inline">
                                    <input name="Position" value="0" checked="" type="radio">Staff
                                </label>
                                <label class="radio-inline">
                                    <input name="Position" value="1" type="radio">Admin
                                </label>
                                </div>
                            </div>

                            <div class="form-group">


                           <label>Role</label>
                           <select class="form-control form-control"  name="Role">
                           @foreach($role as $r)
                              <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                            </select>
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
