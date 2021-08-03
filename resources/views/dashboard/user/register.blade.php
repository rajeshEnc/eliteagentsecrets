<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Registration</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/custom.css" />
    </head>
    <body>
        <div class="registration-bg sec_pad">
            <div class="reg-wrap text-center">
                <div class="logo-sec">
                    <a href="#"><img src="images/logo2.png" /></a>
                    <p>{{ $content->text_one }}</p>
                </div>

                <div class="form-sec">
                    <strong class="d-block">{{ $content->text_two }}</strong>
                    <p>{{ $content->text_three }}</p>
                    <form action="{{ route('user.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="panel_code" class="panel_code" value="">
                        <p>
                            <label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" value="{{ old('email') }}" />
                                <i><img src="images/mail.png" /></i>
                                <span>@error('email') {{ $message }} @enderror</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="password" name="password" id="reg_password" placeholder="Enter your password" class="form-control" />
                                <i class="reg_eye"><img src="images/password.png" /></i>
                                <span>@error('password') {{ $message }} @enderror</span>
                            </label>
                        </p>

                        <p>
                            <b>{{ $content->text_four }}</b>
                        </p>

                        <button type="submit" class="btn">Let's do it</button>
                    </form>
                </div>

                <div class="form-btm-sec">
                    <strong class="d-block">{{ $content->heading }}</strong>
                    @foreach ($texts as $text)
                        <div class="figcaption">
                            <span class="d-block">{{ $text->title }}</span>
                            <p>{{ $text->text }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/propper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="{{ asset('user/js/custom.js') }}"></script>

        <script>
            var panel_code = sessionStorage.getItem('panelValue');
            $('.panel_code').val(panel_code);
        </script>

    </body>
</html>
