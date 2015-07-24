<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript"
        src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/fancy-box.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/revolution-slider.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/plugins/masking.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/validation.js')}}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f5b24645b6bf84e" async="async"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
        App.initParallaxBg();
        FancyBox.initFancybox();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();
        Masking.initMasking();
        Datepicker.initDatepicker();
        Validation.initValidation();
    });
</script>

{{--IE 9--}}
<script src="{{asset('assets/plugins/respond.js')}}"></script>
<script src="{{asset('assets/plugins/html5shiv.js')}}"></script>
<script src="{{asset('assets/plugins/placeholder-IE-fixes.js')}}"></script>
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js')}}"></script>

{{--IE 10--}}
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js')}}"></script>

<!-- Script ini khusus untuk Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').modal();
</script>

<script src="{{asset('assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>
<script>
    hljs.initHighlightingOnLoad();

</script>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'mastahcode';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>


{{--
<script>
    $(document).on('click','.pagination a', function(e){
        e.preventDefault();

        var page = $(this).attr('href').split('page=')[0];

        getPost(page);
    });
    function getPost(page){
        $.ajax({
            url:'/ajax/artikel/?page='+ page
        }).done(function (data){
            $('.content').html(data);
            location.hash = page;
        })
    }
</script>--}}

