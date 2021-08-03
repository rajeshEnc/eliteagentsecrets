<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/custom.css" />
    </head>
    <body>
        <section class="menu-bar-outer" id="menu_target">
            <div class="toggle-btn text-right">
                <button class="toggle" onclick="myFunction()"><img src="images/cross-menu.png" /></button>
            </div>
            <div class="logo-sec-menu">
                <div class="row">
                    <div class="col-lg-12">
                        <figure>
                            <a href="#"><img src="images/logo.png" /></a>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="nav-menu">
                <ul class="p-0 m-0">
                    <li>
                        <strong class="d-block">
                            <span><img src="images/dashboard-icon.png" /></span> Dashboard
                        </strong>
                    </li>
                    @foreach ($levels as $level)
                    <li>
                        <a href="{{ route('user.level', $level->id) }}">
                            <span><img src="images/cup-icon.png" /></span> {{ $level->title }}
                        </a>
                    </li>
                    @endforeach

                    <li>
                        <strong class="d-block"><span></span> OTHER SHIT</strong>
                    </li>

                    <li>
                        <a href="#">
                            <span><img src="images/s1.png" /></span> Refer People
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span><img src="images/s2.png" /></span> FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><img src="images/s3.png" /></span> BONUS Webinar
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><img src="images/s4.png" /></span> Facebook Group
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="right-panel">
            <div class="container-fluid p-0">
                <div class="right-part-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="toggle-btn">
                                <button class="toggle" onclick="myFunction()"><img src="images/menu-icon.png" /></button>
                            </div>

                            <div class="head-title">
                                <h2>Level 8</h2>
                                <span class="d-block">Refer To Upgrade</span>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                            <div class="user-icon">
                                <a href="#"><img src="images/user-icon.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-wrap">
                    <div class="current-ref sec_pad text-center">
                        <h2>{{ $content->page_title }}</h2>
                        <ul class="d-flex">
                            @foreach ($levels as $level)
                            <li>
                                <span class="img-bg"><img src="images/cup-icon.png" /></span>
                                <strong class="d-block">{{ $level->title }} <b>{{ $level->referrals }}</b></strong>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="awesome-vidz">
                        <div class="figcaption">
                            <h3 class="text-uppercase">{{ $content->info_heading }}</h3>
                            <p>
                                {{ $content->info_tex }}
                            </p>

                            <span class="alert-part">{{ $content->info_alert }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/propper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="{{ asset('user/js/custom.js') }}"></script>

        <script>
            function myFunction() {
                var element = document.getElementById("menu_target");
                element.classList.toggle("menu-toggle");
            }
            $(document).ready(function(){
                var panel_code = sessionStorage.setItem('panelValue', '');
            });
        </script>
    </body>
</html>
