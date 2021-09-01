
  <!-- aside -->
  <div id="aside" class="app-aside modal nav-dropdown">
    <!-- fluid app aside -->
  <div class="left navside dark dk" data-layout="column">
      <div class="navbar no-radius">
      <!-- brand -->
      <a class="navbar-brand">
          <!-- <div ui-include="{{ asset('assets/images/logo.svg') }}"></div> -->
          <img src="{{ asset('assets/images/logo/logo.png') }}" >
          <!-- <span style="color: black;" class="hidden-folded inline">LOGO</span> -->
      </a>
      <!-- / brand -->
    </div>
    <div class="hide-scroll" data-flex>
        <nav class="scroll nav-light">

            <ul class="nav" ui-nav>


              <li>
                <a href="{{ route('admin.dashboard') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe42b;

                    </i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li>
                <a href="{{ route('merchents') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe7fd;

                    </i>
                  </span>
                  <span class="nav-text">Merchent Management</span>
                </a>
              </li>

              <li>
                <a href="{{ route('promo-code') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3e9;

                    </i>
                  </span>
                  <span class="nav-text">Promo Code Management</span>
                </a>
              </li>

              <li>
                <a href="{{ route('subscriptions') }}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe41d;

                    </i>
                  </span>
                  <span class="nav-text">Subscription Management</span>
                </a>
              </li>

              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3e0;

                    </i>
                  </span>
                  <span class="nav-text">Orders Management</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.order.status')}}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3e0;

                    </i>
                  </span>
                  <span class="nav-text">Order Status</span>
                </a>
              </li>

              <li>
                <a href="/promo-code-management" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe89a;

                    </i>
                  </span>
                  <span class="nav-text">Promo-code Management</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.blog.category')}}" >
                  <span class="nav-icon">
                    <span class="iconify" data-icon="mdi-blogger" data-inline="false"></span>
                  </span>
                  <span class="nav-text">Blog Category</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.blog')}}" >
                  <span class="nav-icon">
                    <span class="iconify" data-icon="mdi-blogger" data-inline="false"></span>
                  </span>
                  <span class="nav-text">Blog Management</span>
                </a>
              </li>
              <li class="">
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                      <i class="fa fa-newspaper-o">
                      </i>
                    </span>
                    <span class="nav-text">Notification Management</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{ url('admin/newsletter/all')}}">
                        <span class="nav-text"> All</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ url('admin/newsletter/merchant')}}">
                        <span class="nav-text"> Merchant</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ url('admin/newsletter/user')}}">
                        <span class="nav-text"> User</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="">
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                    <i class="material-icons">
                    </i>
                    </span>
                    <span class="nav-text">CMS Management</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{ route('admin.about')}}">
                        <span class="nav-text"> About us</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('admin.faq')}}">
                        <span class="nav-text"> Faq</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('admin.term')}}">
                        <span class="nav-text"> Term & Condition</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                <a href="{{route('admin.marketing.admin')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7fd;

                      </i>
                    </span>
                    <span class="nav-text">Marketing</span>
                  </a>
                </li>
                <li>
                <a href="{{route('admin.payment.management.admin')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe850;

                      </i>
                    </span>
                    <span class="nav-text">Payment Option Management</span>
                  </a>
                </li>
                <li>
                <a href="{{route('admin.email.notification')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe850;

                      </i>
                    </span>
                    <span class="nav-text">Email Notifications</span>
                  </a>
                </li>


              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe850;

                    </i>
                  </span>
                  <span class="nav-text">Payment Management</span>
                </a>
              </li>

              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe838;

                    </i>
                  </span>
                  <span class="nav-text">Reviews</span>
                </a>
              </li>

              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8b0;

                    </i>
                  </span>
                  <span class="nav-text">Invoice Management</span>
                </a>
              </li>

              <li>
                <a href="{{route('admin.marketing.tools')}}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3f8;

                    </i>
                  </span>
                  <span class="nav-text">Marketing Tools</span>
                </a>
              </li>

              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe048;

                    </i>
                  </span>
                  <span class="nav-text">Site Customization</span>
                </a>
              </li>
              <br>

              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe7ee;

                    </i>
                  </span>
                  <span class="nav-text">Domain Management</span>
                </a>
              </li>


              <li>
                <a href="{{route('admin.shipping.method')}}" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe558;

                    </i>
                  </span>
                  <span class="nav-text">Shipping</span>
                </a>
              </li>


              <li>
                <a href="#" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8b8;

                    </i>
                  </span>
                  <span class="nav-text">Settings</span>
                </a>
              </li>

            </ul>
        </nav>
    </div>
    <!-- <div class="b-t">
      <div class="nav-fold">
          <a href="profile.html">
              <span class="pull-left">
                <img src="{{ asset('assets/images/a0.jpg') }}" alt="..." class="w-40 img-circle">
              </span>
              <span class="clear hidden-folded p-x">
                <span class="block _500">Jean Reyes</span>
                <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
              </span>
          </a>
      </div>
    </div> -->
  </div>
</div>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z0" role="main">
  <div class="app-header white box-shadow">
      <div class="navbar navbar-toggleable-sm flex-row align-items-center">
          <!-- Open side - Naviation on mobile -->
          <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
            <i class="material-icons">&#xe5d2;</i>
          </a>
          <!-- / -->

          <!-- Page title - Bind to $state's title -->
          <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

          <!-- navbar collapse -->
          <div class="collapse navbar-collapse" id="collapse">
            <!-- link and dropdown -->
            <ul class="nav navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <!-- <a class="nav-link" href data-toggle="dropdown">
                  <i class="fa fa-bars" aria-hidden="true"></i>

                </a> -->
                <div class="sb-example-1">
                   <div class="search">
                    <a><i style="font-size: 30px;margin-top:5px; " class="material-icons">&#xe5d2;</i></a>
                      <input type="text" class="searchTerm" placeholder="Search">
                      <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                     </button>
                   </div>
                </div>
                <!-- <div ui-include="'views/blocks/dropdown.new.html'"></div> -->
              </li>
            </ul>

            <!-- <div ui-include="'views/blocks/navbar.form.html'"></div> -->
            <!-- / -->
          </div>
          <!-- / navbar collapse -->

          <!-- navbar right -->
          <ul class="nav navbar-nav ml-auto flex-row">
            <li class="nav-item dropdown pos-stc-xs">
              <a class="nav-link mr-2" href data-toggle="dropdown">
                <i class="material-icons">&#xe0be;</i>
                <!-- <span class="label label-sm up warn">3</span> -->
              </a>

            </li>
            <li class="nav-item dropdown pos-stc-xs">
              <a class="nav-link mr-2" href data-toggle="dropdown">

                <i class="material-icons">&#xe7f5;</i>
                <!-- <span class="label label-sm up warn">3</span> -->
              </a>
              <!-- <div ui-include="'views/blocks/dropdown.notification.html'"></div> -->
            </li>

            <li>
            <div class="nav-item dropdown mr-10">
              <a class="nav-link p-0 clear" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar">
                  <img src="{{ asset('assets/images/a0.jpg') }}" alt="..." style="width: 32px;">
                  <i class="on b-white bottom"></i>
                </span>
              </a>
              <ul class="dropdown-menu mr-30" aria-labelledby="dropdownMenuButton">
                <li>
                    <a href="{{ url('admin/profile')}}">
                        <i class="fa fa-user"></i> User Profile</a>
                </li>
                <li>
                    <a href="{{ url('admin/change-password')}}">
                        <i class="fa fa-user"></i> Change Password</a>
                </li>
                <li><a href="{{ url('admin/logout')}}">
                        <i class="fa fa-sign-out"></i> Signout</a>
                </li>
            </ul>

            </div>
            </li>

          </ul>
          <!-- / navbar right -->
      </div>
  </div>
