@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>User  <small class="page-info text-secondary-d2">
               <i class="fa fa-angle-double-right text-80"></i>
              {{$user->name}}
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
             <h3>Edit User</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->

             <form action="{{ route('edit_user',['id'=>$user->id])  }}" method="POST">
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <div class="card-body">
               <div class="form-group">
                                <label> name</label>
                                <input class="form-control" name="Name" value="{{$user->name}}" placeholder="enter name" />
                            </div>
                            <div class="form-group">
                                <label> Email</label>
                                <input type="email"  readonly="" class="form-control" value="{{$user->email}}" name="Email" placeholder="enter email" />
                            </div>
                            <div class="form-group">
                            <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Chang Password</label>
                                <input class="form-control password" type="password" name="Password" placeholder="enter password" disabled="" />
                            </div>

                            <div class="form-group">
                                <label> password again</label>
                                <input class="form-control password" type="password" name="passwordAgain" placeholder="enter password again"  disabled=""/>
                            </div>

                            <div class="form-group">
                                <label>position</label>
                                <div>
                                <label class="radio-inline">
                                    <input name="Position" value="0"
                                    @if($user->position ==0)
                                     {{"checked"}}
                                     @endif
                                     type="radio">Staff
                                </label>
                                <label class="radio-inline">
                                    <input name="Position" value="1"
                                    @if($user->position ==1)
                                     {{"checked"}}
                                     @endif

                                     type="radio">Admin
                                </label>
                                </div>
                            </div>


                            <div class="form-group">


                              <label>Role</label>
                              <select class="form-control form-control"  name="Role">
                              @foreach($role as $r)
                              <option
                               @if($user->id_role == $r->id)
                               {{"selected"}}
                               @endif

                              value="{{$r->id}}">{{$r->name}}</option>
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

@section('script')
<script>
$(document).ready(function(){
 $('#changePassword').change(function(){
     if($(this).is(":checked"))
     {
         $(".password").removeAttr('disabled');
     }else
     {
         $(".password").attr('disabled','');
     }
 });

});




</script>

@endsection
