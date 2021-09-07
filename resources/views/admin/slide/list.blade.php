@extends('admin.layout.index')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slide  <small class="page-info text-secondary-d2">
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
                    <th >Id</th>
                    <th >Name</th>
                    <th >Content</th>
                    <th >Image</th>
                    <th >Link</th>
                    <th >Edit</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($slide as $n)
                  <tr>
                  <td>
                        <span class="text-105">{{$n->id}}</span>

                    </td>
                <td class="text-grey">
                       <p> {{$n->name}}</p>

                    </td>
                    <td class="text-grey">
                        {{$n->content}}

                    </td>

                    <td class="text-grey">
                    <p> <img width="500px" height="300px" src="{{$n->image}}"/></p>

                    </td>

                    <td class="text-grey">
                        {{$n->link}}

                    </td>


                <td>
                <a  href="{{ route('detail_slide',['id'=> $n->id ]) }}" ><i class="fa fa-edit text-blue-m1 text-120"></i></a>


                </td>
                <td>
                <a href="{{ route('delete_slide',['id'=> $n->id ]) }}" onclick="return confirm('are you sure ?');" ><i class="fas fa-trash-alt text-danger-m1" style="color:red"></i></a>


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
