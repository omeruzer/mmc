<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo" >
                        <a href="{{ route('homepage') }}"><img style="width: auto" src="/assets/images/logo/{{$set->logo}}" alt="" width="100" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{ route('homepage') }}"><img src="/assets/images/logo/{{$set->logo}}" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="{{route('homepage')}}">ГЛАВНАЯ</a>
                            </li>
                            <li>
                                <a href="{{route('blog')}}">блог</a>
                            </li>
                            <li>
                                <a href="{{route('sss')}}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">O НАС </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">КОНТАКТЫ</a>
                            </li>
                            <li>
                                <a href="{{route('help')}}">помощь</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end sociallinks">
                    <ul>
                        <li ><a href="https://www.facebook.com/{{$socialMedias->facebook}}"><i style="color: #fff" class="fab fa-2x fa-facebook itemlink"></i></a></li>
                        <li ><a href="https://www.instagram.com/{{$socialMedias->instagram}}/?hl=tr"><i style="color: #fff" class="fab fa-2x fa-instagram"></i></a></li>
                        <li ><a href="{{$socialMedias->telegram}}"><i style="color: #fff" class="fab fa-2x fa-telegram"></i></a></li>
                        <li ><a href="{{$socialMedias->viber}}"><i style="color: #fff" class="fab fa-2x fa-viber"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->
    
    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Каталог
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        @foreach ($cate as $item)
                                            <li><span><a href="{{ route('category', [$item->slug,$item->id] ) }}">{{$item->title}}</a></span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <form action="{{route('searcing')}}" method="post">
                        {{ csrf_field() }}
                        <div class="custom-search-input">
                            <input type="text" name="searching" autocomplete="off" placeholder="Я ишу...">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a style="text-decoration: none" href="{{ route('cart') }}"  class="cart_bt"><strong>{{Cart::count()}}</strong></a>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            @auth
                            <a style="text-decoration: none" href="{{route('favorites')}}" class="wishlist"><span>Favoriler</span></a>
                            @endauth
                        </li> 
                                                   
                        
                        <li>
                            <div class="dropdown dropdown-access">
                                <a style="text-decoration: none" href="{{route('account')}}"     class="access_link"><span>Account</span></a>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Искать</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Каталог
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <form action="{{route('searcing')}}" method="post">
            {{ csrf_field() }}
            <div class="search_mob_wp">
                <input type="text" class="form-control" autocomplete="off" name="searching" placeholder="Я ишу...">
                <input type="submit" class="btn_1 full-width" value="Найти">
            </div>
        </form>
        

        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>