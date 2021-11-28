        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="{{route('admin.home')}}" class="logo">
                    <img alt="Logo" src="/assets/images/logo/{{$set->logo}}" />
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            @if ($isReadOrderCount > 0)
                                <span class="notif-bullet" style="background-color: #47C78E"></span>
                            @else
                                
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">{{$isReadOrderCount}}</span>Siparişler</small>
                                </h5>
                            </div>
                            @if ($isReadOrder->count() <= 0)
                                    <p style="margin: auto; text-align: center" class="notify-details ml-0">
                                        <b >Yeni Sipariş Yok</b>
                                    </p>
                            @else
                                @foreach ($isReadOrder as $order)
                                    <a href="{{route('admin.order.detail',$order->id)}}" class="dropdown-item notify-item">
                                        <p class="notify-details ml-0">
                                            <b>Yeni Sipariş</b>
                                            <span>Sipariş Tutarı: ${{($order->orderAmount) + $shipp->track}}</span>
                                            <small class="text-muted">{{$order->created_at}}</small>
                                        </p>
                                    </a>
                                @endforeach
                            @endif
                            <!-- All-->
                            <a href="{{route('admin.order')}}" class="dropdown-item notify-item notify-all">
                                Tüm Siparişleri Gör
                            </a>

                        </div>
                    </li>

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-undo"></i>
                            @if ($isReadReturnOrderCount > 0)
                                <span class="notif-bullet" style="background-color: #47C78E"></span>
                            @else
                                
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">{{$isReadReturnOrderCount}}</span>İadeler</small>
                                </h5>
                            </div>
                            @if ($isReadReturnOrder->count() <= 0)
                                    <p style="margin: auto; text-align: center" class="notify-details ml-0">
                                        <b >Yeni İade Yok</b>
                                    </p>
                            @else
                                @foreach ($isReadReturnOrder as $order)
                                    <a href="{{route('admin.order.detail',$order->id)}}" class="dropdown-item notify-item">
                                        <p class="notify-details ml-0">
                                            <b>İade</b>
                                            <span>İade Tutarı: ${{($order->orderAmount) + $shipp->track}}</span>
                                            <small class="text-muted">{{$order->created_at}}</small>
                                        </p>
                                    </a>
                                @endforeach
                            @endif
                            <!-- All-->
                            <a href="{{route('admin.order.back')}}" class="dropdown-item notify-item notify-all">
                                Tüm İadeleri Gör
                            </a>

                        </div>
                    </li>

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="fa fa-comment"></i>
                            @if ($isReadCommentCount > 0)
                                <span class="notif-bullet" style="background-color: #47C78E"></span>
                            @else
                                
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">{{$isReadCommentCount}}</span>Yorumlar</small>
                                </h5>
                            </div>
                            @if ($isReadComment->count() <= 0)
                                    <p style="margin: auto; text-align: center" class="notify-details ml-0">
                                        <b>Bütün Yorumları okudunuz. Okunmamış yorum yok</b>
                                    </p>
                            @else
                                @foreach ($isReadComment as $comment)
                                    <a href="{{route('admin.comment.read',$comment->id)}}" class="dropdown-item notify-item">
                                        <p class="notify-details ml-0">
                                            <b>{{$comment->getUser->name}}</b>
                                            <span>{{$comment->comment}}</span>
                                            <small class="text-muted">{{$comment->created_at}}</small>
                                        </p>
                                    </a>
                                @endforeach
                            @endif

                            <!-- item-->

                            <!-- All-->
                            <a href="{{ route('admin.comment') }}" class="dropdown-item notify-item notify-all">
                                Bütün Yorumları Gör
                            </a>

                        </div>

                    </li>

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            @if ($isReadMessageCount > 0)
                                <span class="notif-bullet" style="background-color: #47C78E"></span>
                            @else
                                
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">{{$isReadMessageCount}}</span>Mesaj Kutusu</small>
                                </h5>
                            </div>
                            @if ($isReadMessage->count() <= 0)
                                    <p style="margin: auto; text-align: center" class="notify-details ml-0">
                                        <b>Bütün mesajları okudunuz. Okunmamış mesajınız yok</b>
                                    </p>
                            @else
                                @foreach ($isReadMessage as $message)
                                    <a href="{{route('admin.message.read',$message->id)}}" class="dropdown-item notify-item">
                                        <p class="notify-details ml-0">
                                            <b>{{$message->name}}</b>
                                            <span>{{$message->subject}}</span>
                                            <small class="text-muted">{{$message->created_at}}</small>
                                        </p>
                                    </a>
                                @endforeach
                            @endif

                            <!-- item-->

                            <!-- All-->
                            <a href="{{ route('admin.message') }}" class="dropdown-item notify-item notify-all">
                                Bütün Mesajları Gör
                            </a>

                        </div>

                    </li>

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img style="border: 1px solid #fff" src="/assets/images/logo/{{$set->favicon}}" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>{{ Auth::user()->name }}</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                                <i class="fas fa-power-off"></i>
                                <span>Çıkış Yap</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->