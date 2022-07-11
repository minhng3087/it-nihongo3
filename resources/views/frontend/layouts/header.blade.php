<header>
    <div class="heder-top">
        <div class="container">
            <div class="content" style="position: relative;">
                <div class="row">
                    <div class="col-md-7 col-sm-8">
                        <div class="left">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="javascript:0"><i class="fa fa-phone"></i><span>Hỗ trợ 24/7: {{ @$site_info->hotline}}</span></a></li>
                                <li class="list-inline-item"><a href="javascript:0"><i class="fa fa-envelope"></i><span>Email: {{ @$site_info->email_admin }}</span></a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="col-md-5 col-sm-4">
                        <div class="social">
                            <ul class="list-inline text-right">
                                @if (!empty(@$site_info->social))
                                    @foreach (@$site_info->social as $id => $val)
                                        <li class="list-inline-item"><a title="{{ @$val->name }}" href="{{ @$val->link }}" target="_blank"><i class="{{ @$val->icon }}"></i></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a title="{{ @$site_info->site_title }}" href="{{ url('/') }}">
                                <img src="{{ @$site_info->logo }}" alt="{{ @$site_info->site_title }}">
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Danh mục</button>
                            <form action="{{ route('home.search') }}" method="GET" class="input-group">
                                <input type="text" placeholder="Tìm kiếm" name="q" id="query-search">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div> -->
                    <div class="col text-right col">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->
                            <li class="cart-icon"><a href="{{ route('home.cart') }}">
                                    <i class="icon_bag_alt"></i>
                                    <span id="count-cart">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    @include('frontend.pages.part-header.products-cart')
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="header-menu">
        <div class="container">
            <div class="content">
               
                <div class="row">
                    <!-- <div class="col-md-3">
                        <div class="all-cate">
                            <div class="title-all"><a href="javascript:0"><i class="fa fa-list-ul"></i><span>TẤT CẢ DANH MỤC</span></a></div>
                            <div class="submenu">
                                <ul>

                                    
                                    @foreach ($menuCategory as $item)
                                    <li><a href="{{ url($item->url) }}"><span><img src="{{ @$item->icon }}" class="img-fluid" alt=""></span>{{ @$item->title }}</a></li>
                                    {{-- @if(count($item->get_child_cate()))
                                        @foreach ($item->get_child_cate() as $value) 
                                            @if($value->type == 'category')
                                                {{ $value->title }}
                                            @elseif($value->type == 'brand')
                                                {{ $value->title }}
                                            @endif
                                        @endforeach

                                    @endif --}}
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="right text-uppercase">
                            <ul>
                                @foreach($menuMain as $item)
                                <li><a href="{{ url($item->url) }}">{{ @$item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu-mobile -->
    <div class="menu-mobile" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-5">
                    <div class="logo"><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/logo.png" class="img-fluid" alt=""></a></div>
                </div>
                <div class="col-md-7 col-sm-7 col-7">
                    <div class="right">
                        <ul>
                            <li><a href=""><img src="{{__BASE_URL_FRONTEND__}}/images/cart.png" class="img-fluid" alt=""></a></li>
                            <li>
                                <div class="header">
                                    <a title="" href="#menu"><i class="fa fa-bars"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
            <ul>
                @foreach($menuMainMobile as $item)
                <li><a href="{{ url($item->url) }}">{{ @$item->title }}</a></li>
                @endforeach;
            </ul>
        </nav>
    </div>
    <!-- end menu-mobile -->
</header>