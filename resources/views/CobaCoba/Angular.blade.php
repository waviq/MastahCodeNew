<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div ng-app="MyAplications" ng-controller="MyController" class="form-group">
    <label>Judul :</label>
    <input type="text" ng-model="slug" class="form-control">
    <label>Link : @{{slug|spasi}}</label>
</div>


{{--{--AngularJs--}}
<script src="{{asset('assets/js/AngularJs.js')}}"></script>
<script src="{{asset('assets/js/Angular/custom.js')}}"></script>


</body>
</html>