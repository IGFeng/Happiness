<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>你今天幸福吗?</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            .title{
                animation-name: bounceInDown;
                -webkit-animation: 4s linear 0s infinite alternate bounceInDown;
                animation: 4s linear 0s infinite alternate bounceInDown;

            }

            @-webkit-keyframes bounceInDown {
                from,60%,75%,90%,
                to { animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);  }

                0% {
                opacity: 0;
                transform: translate3d(0, -3000px, 0);
                }

                60% {
                opacity: 1;
                transform: translate3d(0, 25px, 0);
                }

                75% {
                    transform: translate3d(0, -10px, 0);
                    }

                90% {   transform: translate3d(0, 5px, 0); }

                to {   transform: translate3d(0, 0, 0); }
            }
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                user-select: none;
                background-image: url("pictures/城市.png");
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            hr {
                border: none;
                margin-top: 12px;
                height: 1px;
                background-image: linear-gradient(to right, #F2EDEB 0%,#c0c8c9 50%,#F0E9F0 100%);
            }
            .links div{
                margin-bottom: 5px;
            }
            #link-index :hover{
                color: #16a0c4;
            }
            #link-add a:hover{
                color: #ebb95e;
            }
            #link-login :hover{
                color: #f27d51;
            }
            #link-register :hover{
                color: #6462cc;
            }
           footer{
               font-size: 14px;
               font-weight: lighter;
               color: #000000a8;
           }
        @media screen and (max-width:960px)  {
        .links {
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-content: center ;
        }
        .links > a {
            font-size: 16px;
            margin: 5px 0;
        }
        .title {
            font-size: 70px;
        }
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                  今天，你幸福吗？
                </div>

                <div class="links">
                    <a onmouseover="this.style.color='#16a0c4';" onmouseout="this.style.color='#636b6f'" href="{{url('index')}}">浏览留言</a>
                    <a onmouseover="this.style.color='#ebb95e';" onmouseout="this.style.color='#636b6f'" href="{{url('add')}}">签写留言</a>
                    <a onmouseover="this.style.color='#f27d51';" onmouseout="this.style.color='#636b6f'" href="{{url('login')}}">管理员登陆</a>
                </div>
                <hr>
                <p style="color:ghostwhite">Designed by FDY and PCA</p>
            </div>
        </div>
        <div class="hiddendiv common"></div>
    </body>
</html>
