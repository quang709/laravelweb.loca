@extends('layout.index')

@section('content')

<?php
$data = $news->where('id_type_of_news', '!=', 29)->sortByDesc('created_at')->take(5);
$news1 = $data->shift();

//mang
//ham shift lay 1 tin dau tien ra lam cho data con 4 tin

$data_trending = $news->where('id_type_of_news', '!=', 29)->sortByDesc('view')->take(5);

?>
<div class="container-fluid paddding mb-5">





    <div class="row mx-0">


@if(count($news)>0)


        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
        @if(isset($news1))
            <div class="fh5co_suceefh5co_height"><img src="{{$news1['image']}}" alt="img"/>
               <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a  class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$news1['created_at']}}
                    </a></div>
                    <div class=""><a href="news/{{$news1->title_url}}" class="fh5co_good_font">{{$news1['title']}} </a></div>
                </div>
             </div>
            @endif
        </div>
        <div class="col-md-6">

            <div class="row">
            @if(isset($data,$news))
                @foreach($data->all() as $dt)

                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="{{$dt['image']}}" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><a class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$dt['created_at']}} </a></div>
                            <div class=""><a href="news/{{$dt['title_url']}}" class="fh5co_good_font_2"> {{$dt['title']}} </a></div>
                        </div>
                    </div>
               </div>
                @endforeach
                 @endif
            </div>
        </div>

    </div>

    @endif

</div>
<div class="container-fluid pt-3">

    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">N???i b???t</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
        @foreach($data_trending->all() as $news_trending)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img width="480px" height="230px" src="{{$news_trending['image']}}" alt=""
                      class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="news/{{$news_trending->title_url}}" class="text-white">{{$news_trending['title']}}</a>
                        <div class="fh5co_latest_trading_date_and_name_color">{{$news_trending['view']}} views</div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
















<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Th???i s???</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                @foreach($videonews as $v)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img "  >


                            {!!$v->path!!}

                                       <!-- <p><iframe frameborder="0" width="100%" height="200"    src="//www.youtube.com/embed/urqn4QnITUA" width="640" height="360" class="note-video-clip"></iframe> -->

                            </div>


                        </div>
                        <div class="pt-2">
                            <a  class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class=""> {!!$v->title!!} </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i>{{$v->created_at}}</div>
                        </div>
                    </div>
                </div>
                 @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">

    @foreach($category as $c)
	 @if(count($c->category_typeofnews)>0)
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                      <a href="category/{{$c->name_url}}">{{$c->name}}</a>
                          | @foreach($c->category_typeofnews as $lt)
			             <small><a href="typeofnews/{{$lt->name_url}}"><i>{{$lt->name}}</i></a>,</small>
			            @endforeach
                    </div>
                </div>

                                <?php
$data = $c->category_news->where('highlight', 1)->sortByDesc('created_at')->take(5);
$news2 = $data->shift();

?>
          @if(isset($news2))
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{$news2['image']}}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="news/{{$news2->title_url}}" class="fh5co_magna py-2"> {!!$news2['title']!!} </a> <div><a  class="fh5co_mini_time py-3"><i class="fa fa-clock-o"></i> {{$news2['created_at']}} </a></div>
                        <div class="fh5co_consectetur">{!!$news2['summary']!!}
                        </div>
                    </div>
                </div>
            @endif

            </div>

            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">

                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Tin t???c li??n quan</div>
                </div>
                @foreach($data->all() as $newslq)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="{{$newslq['image']}}" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <a href="news/{{$newslq->title_url}}" class="d-block fh5co_small_post_heading"> {!!$newslq['title']!!}</a>
                        <div class="most_fh5co_treding_font_123">{{$news2['created_at']}}</div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
     @endif
   @endforeach


    </div>
</div>
@endsection
