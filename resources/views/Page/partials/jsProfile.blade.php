{{--<!-- JQUERY SCRIPTS -->--}}
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
{{--<!-- BOOTSTRAP SCRIPTS -->--}}
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
{{--<!-- METISMENU SCRIPTS -->--}}
<script src="{{asset('assets/js/plugins/jquery.metisMenu.js')}}"></script>

{{--<!-- CUSTOM SCRIPTS -->--}}
<script src="{{asset('assets/js/custom_profile.js')}}"></script>


{{--JsSelect2--}}
<script src="{{asset('assets/js/select2.min.js')}}"></script>
{{--<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>--}}
{{--AngularJs--}}
<script src="{{asset('assets/js/AngularJs.js')}}"></script>
<script src="{{asset('assets/js/Angular/custom.js')}}"></script>


<script>
    $('#kategoriList').select2({
        placeholder:'Pilih Kategori'
    });

    $('#namaSkill').select2({
        placeholder:'select skill',
        allowClear: true
    });

    $(".kategoriList").select2();

    $('#flash-overlay-modal').modal();
</script>



{{--inspira--}}
<script src="{{asset('assets/Inspira/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/Inspira/js/inspinia.js')}}"></script>
<script src="{{asset('assets/Inspira/js/codemirror.js')}}"></script>
<script src="{{asset('assets/Inspira/js/formatting.min.js')}}"></script>
<script src="{{asset('assets/Inspira/js/xml.min.js')}}"></script>
<script type="text/javascript" src={{asset('assets/code-prettify/src/prettify.js')}}></script>
<script src="{{asset('assets/Inspira/js/summernote.min.js')}}"></script>
{{--<script type="text/javascript" src={{asset('assets/summernote/dist/summernote.js')}}></script>--}}
{{--<script type="text/javascript" src={{asset('assets/summernote/dist/summernote.min.js')}}></script>--}}
{{--<script src="{{asset('assets/Inspira/js/summernote-ext-highlight.js')}}"></script>--}}

<script>
    $(document).ready(function () {
        $('#kontenFull').summernote({

            height:250,
            tabsize: 2,
            codemirror:{
                theme:'monokai'
            }
        });


    });
</script>








