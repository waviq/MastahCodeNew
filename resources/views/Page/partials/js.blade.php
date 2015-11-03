<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src={{asset('assets/code-prettify/src/prettify.js')}}></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/pages/blog-masonry.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/masonry/jquery.masonry.min.js')}}"></script>

<script type="text/javascript"
        src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
{{--JS Untuk Profile Page--}}
<script type="text/javascript" src="{{asset('assets/plugins/circles-master/circles.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>


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
{{--JS Untuk Profile page--}}
<script type="text/javascript" src="{{asset('assets/js/plugins/circles-master.js')}}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script src="{{asset('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f5b24645b6bf84e')}}" async="async"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
{{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-559b40db5d9015f2" async="async"></script>--}}


<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
        App.initParallaxBg();
        FancyBox.initFancybox();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();
        //BlogSlider.initWaviqBlog();
        Masking.initMasking();
        Datepicker.initDatepicker();
        Validation.initValidation();
        $("pre").addClass("prettyprint linenums");
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

{{--<script src="{{asset('assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>
<script>
    hljs.initHighlightingOnLoad();

</script--}}

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'mastahcode';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script');
        s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>

<script>
    $('#regForm').submit(function(e){
        $.ajaxSetup({
          header:$('meta')
        });
    });
</script>
<script>
    $("#regForm").submit(function(event){
        event.preventDefault();

        var $form = $(this),
                data = $form.serialize(),
                url = $form.attr("action");

        var posting = $.post(url,{formData:data});
        posting.done(function(data){
            if(data.fail){
                $.each(data.errors, function(index, value){
                    var errorDiv = '#'+index+'_error';
                    $(errorDiv).addClass('required');
                    $(errorDiv).empty().append(value);
                });
                $('#successMessage').empty();
            }
            if(data.success){
                /*$('.register').fadeOut();
                var successContent = '<div class="message"><h3>Registration berhasil</h3>' +
                        '<h4> please Login with following details</h4><div class="userDetails">' +
                        '<p><span>Email:</span>'+data.email+'</p><p><span>Password:******</span></p></div></div>';
                $('#successMessage').html(successContent);*/
                return window.location.href = '/artikel';
            }
        });
    });
</script>





