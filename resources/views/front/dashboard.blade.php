@extends('front.layout.default_layout')

@section('title') {{'World class high school mathematics content with inspiring stories and fun facts.'}}  @parent @stop {{-- Content --}}
@section('content')

        <audio  autoplay id="mp3music">
            <source src="{{URL::asset('assets/front/audio/pankaj.mp3')}}" type="audio/mpeg">
        </audio>
        <div class="decal">
            <img class="sclas" src="{{URL::asset('assets/front/images/nlogo.png')}}"  width="130" /></div>
        <div class="jumbotron">
            <div id ="lowindex" class="container">
                <h1 class="glow in tlt">Welcome to Makeageek.com</h1>

                <p ct-sequence="cool16,letters,100,120,6,forward,black">Our guiding philosophy is that students perform best when inspired and challenged.</p>
                <p ct-sequence="cool16,letters,100,120,11,forward,black">Focus is on Middle School Mathematics as it builds a solid foundation for higher education.</p>
                <p ct-sequence="cool16,letters,100,120,16,forward,black">Emphasis is on quality and exposure to cutting edge development in mathematics.</p>
            </div>
            <div class="samsher_show"></div>


            <div class="main_list">
                <div class="listing" >
                    <marquee behavior="slide" scrollamount="11">
                        <ul>
                            <li><img src="{{URL::asset('assets/front/images/p1.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p2.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p3.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p4.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p5.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p6.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p7.png')}}" /></li> 
                            <li><img src="{{URL::asset('assets/front/images/p8.png')}}" /></li>
                            <li><img src="{{URL::asset('assets/front/images/p9.png')}}" /></li>
                        </ul>
                    </marquee>    
                </div>
            </div>              
            <div class="main_list">
                <div class="listing1">
                    <div class="button">
                        <a class="youtube video1" id="sitevideo">Introductory Video</a>
                        <a class="sam" id="btn" href="/Home">Start The Experience</a>
                        <div class="clear"></div>
                    </div>
                </div> 
            </div>

            
    </body>
</html>