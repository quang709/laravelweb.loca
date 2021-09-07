@extends('layout.index')

@section('content')
<?php

$data_trending = $newstrending->where('highlight', 1)->sortByDesc('view')->take(5);

?>



<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
             <p>
                   <h1><b> {{$news->title}}</b></h1>
             </p>
                <p class="fa fa-eye">
                    {{$news->view}}
                </p>
                <div>
                 <p class="fa fa-clock-o">
                    {{$news->created_at}}
                </p>
                </div>


               <p><img src="{{$news->image}}"  width="700px" height="400px"></p>

                <p>
                    {!!$news->content!!}

                </p>

             </div>
         <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">

               @foreach($typeofnewstag as $t)

    <a href="typeofnews/{{$t->name_url}}" class="fh5co_tagg">{{$t->name}}</a>

@endforeach
</div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Tin liên quan</div>
                </div>
                @foreach($related_news as $r)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="{{$r->image}}"  class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <a href="news/{{$r->title_url}}" class="d-block fh5co_small_post_heading"> {{$r->title}}.</a>
                        <div class="most_fh5co_treding_font_123">{{$r->created_at}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


 <!-- Comments Form -->
 @if(Auth::user())
                <div  class="container ">
                    <h4>Bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$news->id}}" method="POST">
                         <input type="hidden"   name="_token" value="{{csrf_token()}}" />

                         <!-- <b><b> -->
                        <div class="form-group">
                            <textarea  class="form-control" placeholder="Write Comment" name="Content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">gửi</button>
                    </form>
                </div>
                @endif






                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($news->news_comment as $cm)
                <div class="container ">
                <hr>
                    <a class="pull-left" >
                        <img  width="64px" height="64px" src="upload/files/pn5.jpg" alt="">
                    </a>
                    <div >
                        <h4 >{{$cm->comment_user->name}}
                            <small>{{$cm ->created_at}}</small>

                        </h4>
                        {{$cm->content}}
                    </div>
                </div>
                  @endforeach
                <!-- Comment -->
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi Bật</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
        @foreach($data_trending->all() as $news_trending)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{$news_trending['image']}}" alt=""/></div>
                    <div>
                        <a href="news/{{$news_trending->title_url}}" class="d-block fh5co_small_post_heading"><span class="">{{$news_trending['title']}}</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> {{$news_trending['created_at']}}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
