<ul class="navbar-nav ml-auto">


<li class="nav-item dropdown order-first order-lg-last">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
                 <i class="nav-icon fas fa-user"></i>
                      <span class="d-inline-block d-lg-none d-xl-inline-block">

                          <span class="nav-user-name">Welcome, {{Auth::user()->name}}</span>
                      </span>


                      <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                  </a>

                  <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                  @if(Auth::check())


                      <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success"  href="admin/user/editmyself/{{auth::user()->id}}" data-target="#id-ace-settings-modal">
                          <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                          Settings
                      </a>

                      <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary" href="admin/logout">
                          <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                          Logout
                      </a>

                      <div class="dropdown-divider brc-primary-l2"></div>


                      @endif
                  </div>
              </li><!-- /.nav-item:last -->


</ul>
