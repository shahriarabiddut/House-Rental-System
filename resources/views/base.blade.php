@include("layouts/header")
<body>

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		@include("layouts/navbar")
        <!--	Header end  -->

        <!--	Banner Start   -->
        @yield('content')
        <!--	Banner End  -->
        
        <!--	Footer   start-->
        @include("layouts/footer")
		<!--	Footer   start-->
        
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-success text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="{{ asset('js/jquery.min.js')}}"></script> 
<!--jQuery Layer Slider --> 
<script src="{{ asset('js/greensock.js')}}"></script> 
<script src="{{ asset('js/layerslider.transitions.js')}}"></script> 
<script src="{{ asset('js/layerslider.kreaturamedia.jquery.js')}}"></script> 
<!--jQuery Layer Slider --> 
<script src="{{ asset('js/popper.min.js')}}"></script> 
<script src="{{ asset('js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('js/owl.carousel.min.js')}}"></script> 
<script src="{{ asset('js/tmpl.js')}}"></script> 
<script src="{{ asset('js/jquery.dependClass-0.1.js')}}"></script> 
<script src="{{ asset('js/draggable-0.1.js')}}"></script> 
<script src="{{ asset('js/jquery.slider.js')}}"></script> 
<script src="{{ asset('js/wow.js')}}"></script> 
<script src="{{ asset('js/YouTubePopUp.jquery.js')}}"></script> 
<script src="{{ asset('js/validate.js')}}"></script> 
<script src="{{ asset('js/jquery.cookie.js')}}"></script> 
<script src="{{ asset('js/custom.js')}}"></script>
</body>

</html>