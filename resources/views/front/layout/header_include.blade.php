
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>World class high school mathematics content with inspiring stories and fun facts. </title>
        <link rel="icon" type="image/png" href="{{URL::asset('assets/front/images/favicon.ico')}}" />

        <meta name="google-site-verification" content="kA5mVwh2dDQbCvlUdLP49mtX4KB0IKyYeTDqHM4m4OA" />
        <meta name="description" itemprop="description" content="World class high school mathematics content with inspiring stories and fun facts. We also organize workshops in schools and housing societies to inspire students to study mathematics" />

        <meta name="keywords" itemprop="keywords" content="high school math, mathematics , online quiz , math notes, math quiz, puzzles, videos, fun facts, did you knows,help children learn, anecdotes, famous mathematicians " />
        <meta name="google-site-verification" content="YHeFgzJq7sHoXQtvreySB1u0588-S4Zx-GJf7CVv1zs" />
            
        <link rel="canonical" href="https://www.makeageek.com/" />
        <meta property="og:title" content="Make A Geek" />
        <meta property="og:type" content="blog" />
        <meta property="og:url" content="https://www.makeageek.com/" />
        <meta property="og:" />
        <meta property="og:site_name" content="Make A Geek" />
        <meta property="og:description" content="by achieving excellence in middle school mathematics subject" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Make A Geek" />
        <meta name="twitter:description" content="by achieving excellence in middle school mathematics" />
        <meta name="twitter:" content="https://www.makeageek.com/" />
        <meta itemprop="{{URL::asset('assets/front/images/nlogo.png')}}" />
        <meta name="language" content="English">  
        <meta http-equiv="content-language" content="en-us" />



        <link href="{{URL::asset('assets/front/css/animate.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/css/style.css')}}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{URL::asset('assets/front/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/front/css/videopopup.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/front/css/LoadingPage.css')}}">   <!--link for responsive css-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

        <script>
        $(document).ready(function () {
            $(".video1").click(function () {
                $(".container").hide();
                $(".samsher_show").show();
            });
            $('body').on('click', 'div.modalnav', function () {
                //$(document).on('click','.modalnav' function(){
        //alert();
                $(".container").show();
                $(".samsher_show").hide();
            });

        });
        </script>

        <script type="text/javascript" src="{{URL::asset('assets/front/js/jquery-1.10.2.min.js')}}"></script>
        <script src="{{URL::asset('assets/front/js/videopopup.js')}}"></script>
        <script type="text/javascript">
        $(function () {

            // Init Plugin
            $(".video1").videopopup({
                'videoid': 'iwfwuokvyaM',
                'videoplayer': 'youtube', // options - youtube or vimeo
                'autoplay': 'true'// options - true or false
            });
        });
        </script>
        <script type="text/javascript" src="{{URL::asset('assets/front/js/TweenMax.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('assets/front/js/cooltext/cooltext.animations.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('assets/front/js/cooltext/cooltext.min.js')}}"></script>
        <script type="text/javascript">

        $(document).ready(function () {
            $("#hp_text").cooltext({
                cycle: 2,
                sequence: [
                    {action: "update", text: "Our guiding philosophy is that students perform best when inspired and challenged."},
                    {action: "animation", animation: "cool101", stagger: 70},
                ]
            });




            $("#hp_text1").cooltext({
                cycle: 2,
                sequence: [
                    {action: "update", text: "Focus is on Middle School Mathematics as it builds a solid foundation for higher education."},
                    {action: "animation", animation: "cool127", stagger: 70},
                ]
            });
            $("#hp_text2").cooltext({
                cycle: 2,
                sequence: [
                    {action: "update", text: "Emphasis is on quality and exposure to cutting edge development in mathematics."},
                    {action: "animation", animation: "cool139", stagger: 70},
                ]
            });

        });


        </script>
