<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>資管系-資訊系統</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 75px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
           
            .m-b-md {
                margin-bottom: 30px;
            }

            .LoginPanel{
                float: right;
                position: absolute;
                margin-right: 10px;
                top: 700px;
            }

            .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 30px;
                background-color: transparent;
                width: 180px;
                height: 80px;
                border-radius: 20px;
                border-width: 0px;
                transition: 0.3s;
            }

            .LoginButton:hover{
                background-color: #CCDDFF;
                width:400px;
                transition: 0.3s;

            }
        </style>
    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            <div class="LoginPanel">
        <button class="LoginButton">Login</button>
        </div>
        
        
            <div class="content">
                <div class="title m-b-md">
                    設備借用系統
                </div>

                <div class="links">
                    <a  href="{{ url('/create') }}">新增申請單</a>|
                    <a  href="{{ url('/borrow') }}">借用狀況</a>|
                    <a  href="{{ url('/return') }}">已歸還資料</a>|
                    <a  href="{{ url('/reserve') }}">預約狀況</a>|
                    <a  href="{{ url('http://140.115.80.30:81/phpbook/') }}">書籍借用與預約系統</a>
                </div>
            </div>
        </div>
    </body>
</html>
