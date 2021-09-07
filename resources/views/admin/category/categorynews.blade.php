@extends('admin.layout.index')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>categorynews  <small class="page-info text-secondary-d2">
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
            <select  class="form-control form-control" name="Category"  id="Category">
                                    @foreach($categoryall as $tl)
                                    <option value="{{$tl->id}}">{{$tl->name}}</option>
                                   @endforeach
                 </select>
                                <select class="form-control form-control"  name="Typeofnews" id="Typeofnews">

                                 </select>
              <!-- /.card-header -->
              <button type="submit" id="submit" class="btn btn-primary">transfer</button>

              <div  class="card-body">



                <table id="example1" class="table table-bordered table-striped">



                  <thead>
                  <tr>
                  <th ></th>
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
                  <td class="text-grey">
                  <input class="check"  type="checkbox" value="{{$n->id}}"  >

                    </td>
                  <td>
                        <span class="text-105" id="id">{{$n->id}}</span>

                    </td>
                <td class="text-grey">
                       <p> {{$n->title}}</p>
                        <img width="100px"  src="{{$n->image}}"/>
                    </td>
                    <td class="text-grey">
                        {{$n->summary}}

                    </td>

                    <td class="text-grey">
                   {{$cat->name}}

                    </td>
                    <td class="text-grey">
                    {{$n->name}}


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
                <a href="{{ route('delete_news',['id'=> $n->id ]) }}" onclick="return confirm('are you sure ?');" ><i class="fas fa-trash-alt text-danger-m1"></i></a>


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
@section('script')

<script type="text/javascript">
$(document).ready(function(){

     var id_category = $('#Category').val();
            $.get("admin/ajax/typeofnews/"+id_category, function(data){
                $("#Typeofnews").html(data);
            });



    $('#Category').change(function(){
     var id_category = $('#Category').val();
     $.get("admin/ajax/typeofnews/"+id_category,function(data){
      $("#Typeofnews").html(data);
     });
    });


    var ids=[];


    $(document).on('click','#submit',function(){

      ids=[];
      var ele = $('.check:checked');

      ele.each(function(key,value){
      ids.push($(this).val());
      })

      var Id_category = $('#Category').val();
      var Id_typeofnews = $('#Typeofnews').val();



      // console.log(Id_category);
      // console.log(Id_typeofnews);

      $.ajax({

        url: '/admin/ajax/categorynews', //  url: 'laravelweb/public/admin/ajax/categorynews',
        method: 'GET',
        data: { 'Ids': ids,'Id_category':Id_category,'Id_typeofnews':Id_typeofnews },
        success:function(data){
          if (data['success'])
          {
            location.reload();
          }
        }
       })
      // .done(function (data) {
      //   console.log(data);
      // })
      //  ;


//       $.ajax({
//     url: "/admin/ajax/categorynews",
//     method: 'GET',
//     data : {
//             'ids':ids,'id_category':id_category,'id_typeofnews':id_typeofnews,
//             },


// });

  //     $.ajax({

  //   url: '/admin/ajax/categorynews/'+[ids,id_category,id_typeofnews]
  // });



    })


  //   $('.check').click(function(){
  //     return;
  //     $('.check:checked').each(function(){

  //         ids.push($(this).val());


  //         });

  //    alert(ids);
  //     var id_category = $('#Category').val();
  //    var id_typeofnews = $('#Typeofnews').val();


  //     $('#submit').click(function(){
  //   $.get("admin/ajax/categorynews/"+ids+"/"+id_category+"/"+id_typeofnews);

  //  });
  //   });

});
</script>
 @endsection
