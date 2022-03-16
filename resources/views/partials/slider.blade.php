<header id="header">
     <!--header-->
     <div class="header_top">
          <!--header_top-->
          <div class="container">
               <div class="row">
                    <div class="col-sm-6">
                         <div class="contactinfo">
                              <ul class="nav nav-pills">
                                   <li><a href=""><i class="fa fa-phone"></i> 0334190818</a></li>
                                   <li><a href=""><i class="fa fa-envelope"></i> tuanlinh99lfc@gmail.com</a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="col-sm-6">
                         <div class="social-icons pull-right">
                              <ul class="nav navbar-nav">
                                   <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                   <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                   <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                   <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                   <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!--/header_top-->

     <div class="header-middle">
          <!--header-middle-->
          <div class="container">
               <div class="row">
                    <div class="col-md-4 clearfix">
                         <div class="logo pull-left">
                              <a href="{{ route('auth.page') }}"><img src="{{ asset('eshopper\images\home\logo.png') }}" alt="" /></a>
                         </div>
                    </div>
                    <div class="col-md-8 clearfix">
                         <div class="shop-menu clearfix pull-right">
                              <div class="col-sm-3">
                                   <form action="{{ route('page.search_new') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="search_box pull-right">
                                             <input type="text" name="search" placeholder="Tìm kiếm tin tức" />
                                        </div>
                                   </form>
                              </div>
                              <ul class="nav navbar-nav">
                                   @if(Auth::check())
                                   <li><a href="{{ route('page.user', ['id' => Auth::user()->id]) }}"><i class="fa fa-user" style="color: goldenrod;"> {{Auth::user()->name}}</i></a></li>
                                   <li><a href="{{ route('page.park') }}"><i class="fa fa-star"></i>Bãi xe</a></li>
                                   <li><a href="{{ route('page.list') }}"><i class="fa fa-crosshairs"></i>Phương tiện</a></li>
                                   <li><a href="{{ route('page.history', ['id' => Auth::user()->id]) }}"><i class="fa fa-shopping-cart"></i>Lịch sử</a></li>
                                   <li><a href="{{ route('auth.logout') }}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
                                   @else
                                   <li><a href="{{ route('auth.login') }}"><i class="fa fa-user"></i>Cá nhân</a></li>
                                   <li><a href="{{ route('page.park') }}"><i class="fa fa-star"></i>Bãi xe</a></li>
                                   <li><a href="{{ route('auth.login') }}"><i class="fa fa-crosshairs"></i>Phương tiện</a></li>
                                   <li><a href="{{ route('auth.login') }}"><i class="fa fa-shopping-cart"></i>Lịch sử</a></li>
                                   <li><a href="{{ route('auth.login') }}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                   @endif
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
          <div class="shipping text-center">
               <!--shipping-->
               <img src="{{ asset('eshopper\images/home/shipping.png') }}" alt="" />
          </div>
     </div>
</header>
<!--/header-->