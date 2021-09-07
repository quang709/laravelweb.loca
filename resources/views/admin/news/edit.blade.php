@extends('admin.layout.index')

@section('content')

<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1> News  <small class="page-info text-secondary-d2">
               <i class="fa fa-angle-double-right text-80"></i>
               {{$news->title}}
           </small></h1>
         </div>

       </div>
     </div>
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

                   @if(session('alert'))

    <section class='alert alert-danger'>{{session('alert')}}</section>

@endif
<div class="card card-primary">
             <div class="card-header">
             <h3>Edit  News</h3>
             </div>

             <form action="{{ route('edit_news' ,['id'=> $news->id]) }}" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="{{csrf_token()}}">

               <div class="card-body">

               <div class="form-group">


                 <label>Category</label>
                 <select class="form-control form-control"  id="Category">
                                    @foreach($category as $tl)
                                    <option
                                    @if($news->news_typeofnews->typeofnews_category->id==$tl->id)
                                    {{"selected"}}
                                    @endif

                                      value="{{$tl->id}}">{{$tl->name}}</option>
                                   @endforeach
                                </select>
               </div>

                 <div class="form-group">


                 <label>Type of news</label>
                  <select class="form-control form-control"  name="Typeofnews" id="Typeofnews">

                  </select>
               </div>
                 <div class="form-group">


                   <label>title</label>
                   <input type="text" class="form-control" name="Title" value="{{$news->title}}" placeholder="Enter title ">
                 </div>

                 <div class="form-group">
                   <label>summary</label>
                    <textarea id="summernote" name="Summary">
                    {{$news->summary}}
                   </textarea>
                    </div>


                    <div class="form-group">
                   <label>content</label>
                    <textarea id="editor" name="Content">
                    {!!$news->content!!}
                   </textarea>
                    </div>
                    <div class="form-group">
                    <label>image</label>
                    <div class="input-group">
                            <input id="ckfinder-input-1" class="form-control" value="{{$news->image}}"  name="Image" type="text"
                                   placeholder="image" style="width:60%">
                            <div class="input-group-append">
                                <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server</button>
                            </div>


                        </div>

                        <img width="200px" src="{{asset($news->image)}}"/></p>


                    </div>
                    <!-- {{asset($news->image)}} asset = laravel.loca -->

                    <div class="form-group" style="margin-top: 300px;">
                              <label>hightlight</label>
                               <div>
                                <label class="radio-inline">
                                    <input name="Highlight" value="0"
                                     @if($news ->highlight == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">no
                                </label>
                                <label class="radio-inline">
                                    <input name="Highlight" value="1"
                                    @if($news ->highlight == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">yes
                                </label>
                              </div>
                            </div>

                     </div>

               <div class="card-footer ">

                 <button type="submit" class="btn btn-primary">Edit</button>
                <button type="reset" class="btn btn-danger">Reset </button>
               </div>
             </form>
           </div>
</div>






<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comment  <small class="page-info text-secondary-d2">
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
                    <th >User</th>
                    <th >Content</th>
                    <th >date</th>
                    <th >Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($news->news_comment as $c)
                  <tr>
                  <td>
                        <span class="text-105">{{$c->id}}</span>

                    </td>
                    <td class="text-grey">
                        {{$c->comment_user->name}}

                    </td>

                    <td class="text-grey">
                        {{$c->content}}

                    </td>

                    </td>
                    <td class="text-grey">
                    {{$c->created_at}}

                    </td>
                <td>
                <a href="  {{ route('delete_comment' ,['id'=> $c->id,'id_news'=>$news->id ]) }}" onclick="return confirm('are you sure ?');" ><i class="fas fa-trash-alt text-danger-m1"></i></a>
                <!-- admin/comment/delete/{{$c->id}}/{{$news->id}} -->
              
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
     var id_category = $("#Category").val();
            $.get("admin/ajax/typeofnews/"+id_category, function(data){
                $("#Typeofnews").html(data);
                $("#Typeofnews").val('{{$news->news_typeofnews->id}}');
            });
    $("#Category").change(function(){
     var id_category = $(this).val();
     $.get("admin/ajax/typeofnews/"+id_category,function(data){
      $("#Typeofnews").html(data);
     });
    });
});
</script>

<script type="text/javascript">
        $(document).ready(function () {


            var button1 = document.getElementById('ckfinder-popup-1');



            button1.onclick = function () {
                selectFileWithCKFinder('ckfinder-input-1');
            };


            function selectFileWithCKFinder(elementId) {
                CKFinder.popup({
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function (finder) {
                        finder.on('files:choose', function (evt) {
                            var file = evt.data.files.first();
                            var output = document.getElementById(elementId);
                            var fullurl = new URL(file.getUrl());
                            output.value = fullurl.pathname;
                            console.log(output.value);
                        });

                        finder.on('file:choose:resizedImage', function (evt) {
                            var output = document.getElementById(elementId);
                            output.value = evt.data.resizedUrl;
                        });
                    }
                });
            }
        });
    </script>

 @endsection
