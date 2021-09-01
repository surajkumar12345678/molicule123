
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
                  <a href="/dashboard" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe42b;

                      </i>
                    </span>
                    <span class="nav-text">Dashboard</span>
                  </a>
                </li>

                <li>
                  <a href="/user-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7fd;

                      </i>
                    </span>
                    <span class="nav-text">User Management</span>
                  </a>
                </li>

                <li>
                  <a href="/product-category-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3e9;

                      </i>
                    </span>
                    <span class="nav-text">Product Category Management</span>
                  </a>
                </li>

                <li>
                  <a href="/product-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe41d;

                      </i>
                    </span>
                    <span class="nav-text">Product Management</span>
                  </a>
                </li>

                <li>
                  <a href="{{ route('order.management')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3e0;

                      </i>
                    </span>
                    <span class="nav-text">Orders Management</span>
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
                      <span class="nav-text">Shippingment</span>
                    </a>
                    <ul class="nav-sub">
                      <li>
                        <a href="{{ route('country.manager.view')}}">
                          <span class="nav-text">Country Management</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('shipping.zone.view')}}">
                          <span class="nav-text">Zone</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('shipping.zone.maping.view')}}">
                          <span class="nav-text">Zone Mapping</span>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a href="{{ route('shipping.configuration-view')}}" >
                      <span class="nav-icon">
                        <i class="material-icons">&#xe3e0;
                        </i>
                      </span>
                      <span class="nav-text">Shipping Configuration</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('shipping.label.view')}}" >
                      <span class="nav-icon">
                        <i class="material-icons">&#xe3e0;
                        </i>
                      </span>
                      <span class="nav-text">Shipping Label</span>
                    </a>
                  </li>

                <li>
                  <a href="/merchant/promocode-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe89a;

                      </i>
                    </span>
                    <span class="nav-text">Promo-code Management</span>
                  </a>
                </li>

                <li>
                  <a href="/merchant/blog-category-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3e9;

                      </i>
                    </span>
                    <span class="nav-text">Blog Category Management</span>
                  </a>
                </li>

                <li>
                  <a href="/merchant/blog-management" >
                    <span class="nav-icon">
                      <span class="iconify" data-icon="mdi-blogger" data-inline="false"></span>
                    </span>
                    <span class="nav-text">Blog Management</span>
                  </a>
                </li>
                <li>

                <li>
                  <a href="/merchant/slider-management" >
                    <span class="nav-icon">
                      <span class="iconify" data-icon="mdi-blogger" data-inline="false"></span>
                    </span>
                    <span class="nav-text">Slider Management</span>
                  </a>
                </li>
                <li>
                  <a href="/merchant/banner-management" >
                    <span class="nav-icon">
                      <span class="iconify" data-icon="mdi-blogger" data-inline="false"></span>
                    </span>
                    <span class="nav-text">Banner Management</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('payment.option')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe850;

                      </i>
                    </span>
                    <span class="nav-text">Payment Management</span>
                  </a>
                </li>
                <li>

                  <a href="/merchant/cms-management" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xE14F;

                      </i>
                    </span>
                    <span class="nav-text">CMS Management</span>
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
                  <a href="{{route('marketing')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3f8;

                      </i>
                    </span>
                    <span class="nav-text">Marketing Tools</span>
                  </a>
                </li>
                <li class="">
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                     <i class="material-icons">&#xe048;</i>
                    </span>
                    <span class="nav-text">Site Customization</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{ route('MerchantCms_setting/ViewCmsSetting')}}">
                        <span class="nav-text">Colors settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('MerchantCms_setting/taxRateSetting') }}">
                        <span class="nav-text">Tax Rate Setting  </span>
                      </a>
                    </li>
                  </ul>
              </li>


                <li>
                  <a href="{{route('DomainDetail')}} " >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7ee;

                      </i>
                    </span>
                    <span class="nav-text">Domain Management</span>
                  </a>
                </li>


                <li>
                  <a href="#" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe558;

                      </i>
                    </span>
                    <span class="nav-text">Shipping</span>
                  </a>
                </li>
                <li class="">
                  <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                    <i class="material-icons">&#xe8b8;
                      </i>
                    </span>
                    <span class="nav-text">Settings</span>
                  </a>
                  <ul class="nav-sub">
                    <li>
                      <a href="{{ route('social.link')}}">
                        <span class="nav-text">Social Link</span>
                      </a>
                    </li>
                  </ul>
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
              <div class="nav-item dropdown mr-5">
                <a class="nav-link p-0 clear" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar w-32">
                    <img src="{{ asset('assets/images/a0.jpg') }}" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <a class="dropdown-item" href="/merchant/profile">Profile</a>
                   <a class="dropdown-item" href="/merchant/gallery">Gallery</a>
                   <a class="dropdown-item" href="/merchant/logout">Logout</a>
                </div>
              </div>
              </li>

            </ul>
            <!-- / navbar right -->
        </div>
    </div>
