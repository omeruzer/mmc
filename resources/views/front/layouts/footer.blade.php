<main>
    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-truck"></i>
                        <div class="justify-content-center">
                            <h3>Hızlı Kargo</h3>
                            <p>Aynı Gün Kargo</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Güvenli Ödeme</h3>
                            <p>100% Güvenli Ödeme</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>7/24 Destek</h3>
                            <p>Her Zaman Online Destek</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>
<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('blog') }}">SSS</a></li>
                        <li><a href="{{ route('contact') }}">İletişim</a></li>
                        <li><a href="{{ route('help') }}">Yardım</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Kategoriler</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>

                        @foreach ($cate as $cat)
                            <li><a href="{{ route('category', [$cat->slug,$cat->id] ) }}">{{$cat->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_3">İletişim</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>{{$cont->address}}</li>
                        <li><i class="ti-headphone-alt"></i>{{$cont->phone}}</li>
                        <li><i class="ti-email"></i><a href="#0">{{$cont->email}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_4">Ürünlerden İlk Siz Haberder Olun</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <form action="{{route('newsletter')}}" method="post">
                                @csrf
                                <input type="email" name="email" id="email_newsletter" class="form-control" placeholder="E-mail Adresiniz">
                                <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li ><a href="https://www.facebook.com/{{$socialMedias->facebook}}"><i style="color: #fff" class="fab fa-2x fa-facebook itemlink"></i></a></li>
                            <li ><a href="https://www.instagram.com/{{$socialMedias->instagram}}/?hl=tr"><i style="color: #fff" class="fab fa-2x fa-instagram"></i></a></li>
                            <li ><a href="https://t.me/{{$socialMedias->telegram}}"><i style="color: #fff" class="fab fa-2x fa-telegram"></i></a></li>
                            <li ><a href="{{$socialMedias->viber}}"><i style="color: #fff" class="fab fa-2x fa-viber"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-12">
                <ul style="float: left" class="footer-selector clearfix">
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/assets/front/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                </ul>
                <ul style="float: right" class="additional_links">
                    <li><a href="{{route('terms.and.conditions')}}">Şartlar ve Koşullar</a></li>
                    <li><a href="{{route('privacy')}}">Gizlilik</a></li>
                    <li><span>© {{date('Y')}} MMC</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
