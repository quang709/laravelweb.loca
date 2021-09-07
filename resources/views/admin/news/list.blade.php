@extends('admin.layout.index')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>news  <small class="page-info text-secondary-d2">
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
                    <th >Title</th>
                    <th >Summary</th>
                    <th >Category</th>
                    <th>Type of news</th>
                    <th >View</th>
                    <th >Highlight</th>
                    <th >Edit</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($news as $n)
                  <tr>
                  <td>
                        <span class="text-105">{{$n->id}}</span>

                    </td>
                <td class="text-grey">
                       <p> {{$n->title}}</p>
                        <img width="100px"  src="{{asset($n->image)}}"/>
                    </td>
                    <td class="text-grey">
                        {!!$n->summary!!}

                    </td>

                    <td class="text-grey">
                    {{$n->news_typeofnews->typeofnews_category->name}}

                    </td>
                    <td class="text-grey">
                    {{$n->news_typeofnews->name}}

                    </td>

                    <td class="text-grey">
                        {{$n->view}}

                    </td>
                    <td class="text-grey">

                        @if($n->highlight == 0)
                              {{'No'}}
                        @else
                              {{'Yes'}}
                        @endif
                    </td>
                <td>
                <a  href="{{ route('detail_news',['id'=> $n->id ]) }}" ><i class="fa fa-edit text-blue-m1 text-120"></i></a>


                </td>
                <td>
                <a href="{{ route('delete_news',['id'=> $n->id ]) }}" onclick="return confirm('are you sure ?');" ><i class="fas fa-trash-alt text-danger-m1" style="color:red"></i></a>


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
