<!-- <div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a  class="color_fff fh5co_mediya_setting"><i
                    class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;Ngày 5 11 2021</a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a  class="treding_btn">sự kiện</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a  class="color_fff fh5co_mediya_setting">mini game nhận sách làm giáu số lượng có hạng </a>
            </div>
        </div>
    </div>
</div> -->



<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
              <a  href="homepage">
                   <img src="admin_asset_web/images/logo.png" alt="img" class="fh5co_logo_width">
              </a>

            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">

                </div>
                <!-- <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                </div> -->
                <div class="d-inline-block text-center dd_position_relative ">
                <ul class="nav navbar-nav pull-right">




                <ul class="navbar-nav ml-auto">

                @if(Auth::user())
              <li class="nav-item dropdown order-first order-lg-last">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                 <i class="fa fa-user"></i>
                      <span class="d-inline-block d-lg-none d-xl-inline-block">

                          <span class="nav-user-name">Welcome, {{Auth::user()->name}}</span>
                      </span>


                      <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                  </a>

                  <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                  @if(Auth::check())


                      <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success"  href="{{route('user.detail1')}}" >
                          <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                          Settings
                      </a>
                      <div class="dropdown-divider brc-primary-l2"></div>
                      <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary" href="logout">
                          <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                          Logout
                      </a>




                      @endif
                  </div>
              </li>
              @else
              <li class="nav-item dropdown order-first order-lg-last">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">


                      <i class="fa fa-user"></i>
                  </a>

                  <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">



                      <a href="registration" class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success">
                      <i class="fa fa-registered" aria-hidden="true"></i>
                          registration
                      </a>
                      <div class="dropdown-divider brc-primary-l2"></div>
                      <a href="login" class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary">
                      <i class="fa fa-sign-in" aria-hidden="true"></i>
                          login
                      </a>




                      @endif
                  </div>
              </li>





</ul>




<!-- @if(Auth::user())
      <li>
          <a href="user">
              <span class ="glyphicon glyphicon-user"></span>
                  {{Auth::user()->name}}
          </a>
      </li>

      <li>
          <a href="logout">logout</a>
      </li>




  @else


      <li>
          <a href="registration">registration</a>
      </li>
      <li>
          <a href="login">login</a>
      </li>

  @endif -->

</ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-12 align-self-center fh5co_mediya_right" >

            <form action="search" method="get" class="navbar-form navbar-left" role="search">
			        <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			          <input type="text" name="keyword"
                      class="form-control" placeholder="Search" >

			        </div>



			    </form>



            </div>






        </div>
    </div>
</div>

<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="admin_asset_web/images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item active">
                        <a class="nav-link" href="homepage">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach($category as $c)
                        @if(count($c->category_typeofnews)>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{$c->name}} <span class="sr-only">(current)</span></a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        @foreach($c->category_typeofnews as $t)
                            <a class="dropdown-item"  href="typeofnews/{{$t->name_url}}">{{$t->name}}</a>
                            @endforeach
                        </div>

                    </li>

                    @endif
                    @endforeach


                </ul>
            </div>
        </nav>
    </div>
</div>
