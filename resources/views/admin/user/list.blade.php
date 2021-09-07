@extends('admin.layout.index')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User  <small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
               List
            </small></h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>  @if(session('messenger'))
                      <div class="alert alert-success">
                        {{session('messenger')}}
                    </div>
                    @endif

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Edit</th>
                                <th>Delete</th>

                  </tr>
                  </thead>
                  <tbody>

                  @foreach($user as $u)
                  <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                     <td>{{$u->email}}</td>
                     <td>
                                    @if($u->position == 1)
                                    {{"Admin"}}
                                    @else
                                    {{"Member"}}
                                    @endif


                                </td>


                    <td>
                <a  href="{{ route('detail_user',['id'=> $u->id ]) }}" ><i class="fa fa-edit text-blue-m1 text-120"></i></a>


                </td>
                <td>
                <a href="{{ route('delete_user',['id'=> $u->id ]) }}" onclick="return confirm('are you sure ?');" ><i class="fas fa-trash-alt text-danger-m1"style="color:red"></i></a>


                    </td>
                  </tr>
                  @endforeach


                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



@endsection
