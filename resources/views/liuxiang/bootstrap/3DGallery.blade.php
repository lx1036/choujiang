<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>02310801</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="3D Gallery with CSS3 and jQuery" />
        <meta name="keywords" content="3d, gallery, jquery, css3, auto, slideshow, navigate, mouse scroll, perspective" />
        <meta name="author" content="Codrops" />
        <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
        <link rel="stylesheet" type="text/css" href="{{asset('css/liuxiang/bootstrap/3DGallery/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/liuxiang/bootstrap/3DGallery/style.css')}}" />
        <script type="text/javascript" src="{{asset('js/liuxiang/bootstrap/modernizr.custom.53451.js')}}"></script>
    </head>
    <body>
    {{--<h1>02310801</h1>--}}
        <div class="container">

            {{--<header>--}}
                {{--<nav class="codrops-demos">--}}
                    {{--<div class="current-demo" href="index.html">02310801</div>--}}
                    {{--<div href="index2.html">Auto-Slide</div>--}}
                    {{--<div href="index3.html">3 Elements</div>--}}
                {{--</nav>--}}
            {{--</header>--}}

            <section id="dg-container" class="dg-container">
                <div class="dg-wrapper">
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/1.jpg')}}" alt="image01" width="640" height="480"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/2.jpg')}}" alt="image02" width="480" height="640"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/3.jpg')}}" alt="image03" width="640" height="480"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/4.jpg')}}" alt="image04" width="640" height="480"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/5.jpg')}}" alt="image05" width="480" height="640"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/6.jpg')}}" alt="image06" width="512" height="380"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/7.jpg')}}" alt="image07" width="640" height="480"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/8.jpg')}}" alt="image08" width="480" height="640"><div><h1>02310801</h1></div></a>
                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/9.jpg')}}" alt="image09" width="640" height="480"><div><h1>02310801</h1></div></a>
{{--                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/10.jpg')}}" alt="image10"><div>http://www.neighborhood-studio.com/</div></a>--}}
{{--                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/11.jpg')}}" alt="image11"><div>http://www.beckindesign.com/</div></a>--}}
{{--                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/12.jpg')}}" alt="image12"><div>http://kicksend.com/</div></a>--}}
{{--                    <a href="#"><img src="{{asset('images/liuxiang/bootstrap/3DGallery/chuangejiehun/13.jpg')}}" alt="image12"><div>http://kicksend.com/</div></a>--}}
                </div>
                <nav>
                    <span class="dg-prev">&lt;</span>
                    <span class="dg-next">&gt;</span>
                </nav>
            </section>
        </div>

        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        {{--<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
        <script type="text/javascript" src="{{asset('js/liuxiang/bootstrap/jquery.gallery.js')}}"></script>
        <script type="text/javascript">
            $(function() {
                $('#dg-container').gallery();
            });
        </script>
    </body>
</html>