<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}" />
    </head>
    <body>
        <div class="registration-bg for-login-sec sec_pad give_code_form">
            <div class="login-btn-sec text-right">
                <a href="#" class="login-btn" data-toggle="modal" data-target="#loginModal">Login</a>
            </div>
            <div class="reg-wrap text-center">
                <div class="logo-sec">
                    <a href="#"><img src="{{ asset('user/images/logo2.png') }}" /></a>
                    <p>{{ $content->text_one }}</p>
                </div>

                <div id="keypad" class="keypad-bg">
                    <div class="login-text-wrap text-center">
                        <strong class="d-block">{{ $content->text_two }}</strong>
                        <p>{{ $content->text_three }}</p>
                    </div>
                    <div id="panel" class="for-number">
                        <p class="innahpanel">000000</p>
                        <input type="hidden" value="000000" class="panel_value">
                        <input type="hidden" value="" class="new_value">
                        <input type="hidden" value="0" class="exact_value">
                    </div>
                    <div class="button-row">
                        <div class="button" id="b1" data-value="1">1<span>&nbsp;</span></div>
                        <div class="button" id="b2" data-value="2">2<span>ABC</span></div>
                        <div class="button" id="b3" data-value="3">3<span>DEF</span></div>
                    </div>
                    <div class="button-row">
                        <div class="button" id="b4" data-value="4">4<span>GHI</span></div>
                        <div class="button" id="b5" data-value="5">5<span>JKL</span></div>
                        <div class="button" id="b6" data-value="6">6<span>MNO</span></div>
                    </div>
                    <div class="button-row">
                        <div class="button" id="b7" data-value="7">7<span>PQRS</span></div>
                        <div class="button" id="b8" data-value="8">8<span>TUV</span></div>
                        <div class="button" id="b9" data-value="9">9<span>WXYZ</span></div>
                    </div>
                    <div class="button-row">
                        <div class="button" id="bx" data-value="x"><img src="{{ asset('user/images/left-arw.png') }}" /><span>CLEAR</span></div>
                        <div class="button" id="b0" data-value="0">0<span>+</span></div>
                        <div class="button" id="bg" data-value="g"><img src="{{ asset('user/images/key.png') }}" /><span>GO!</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Login Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @if (Session::get('fail'))
                        <div class="text-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <form action="{{ route('user.check') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                            <small class="form-text text-danger">@error('email') {{ $message }} @enderror</small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
            </div>
        </div>

        <script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('user/js/propper.js') }}"></script>
        <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('user/js/custom.js') }}"></script>
    </body>
</html>
