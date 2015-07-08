<!--
* INSPINIA - Responsive Admin Theme
* Version 2.0
*
-->

<!DOCTYPE html>
<html ng-app="inspinia">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title set in pageTitle directive -->
    <title page-title></title>

    @include('Page.BackEnd.Partials.CssInspiraTemplate')
    <link id="loadBefore" href="{{asset('assets/InspiraTemplate/css/style.css')}}" rel="stylesheet">


</head>

<!-- ControllerAs syntax -->
<!-- Main controller with serveral data used in Inspinia theme on diferent view -->
<body ng-controller="MainCtrl as main">

<!-- Main view  -->
<div ui-view></div>

<!-- jQuery and Bootstrap -->
<script src="{{asset('js/jquery/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

<!-- MetsiMenu -->
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

<!-- SlimScroll -->
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Peace JS -->
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>

<!-- Main Angular scripts-->
<script src="{{asset('assets/js/InspiraTempate/js/angular/angular.min.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/plugins/oclazyload/dist/ocLazyLoad.min.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/angular-translate/angular-translate.min.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/ui-router/angular-ui-router.min.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/bootstrap/ui-bootstrap-tpls-0.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/plugins/angular-idle/angular-idle.js')}}"></script>

<!--
 You need to include this script on any page that has a Google Map.
 When using Google Maps on your own site you MUST signup for your own API key at:
 https://developers.google.com/maps/documentation/javascript/tutorial#api_key
 After your sign up replace the key in the URL below..
-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>

<!-- Anglar App Script -->
<script src="{{asset('assets/js/InspiraTempate/js/app.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/config.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/translations.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/directives.js')}}"></script>
<script src="{{asset('assets/js/InspiraTempate/js/controllers.js')}}"></script>

</body>
</html>
