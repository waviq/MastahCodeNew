var app = angular.module('MyAplications', []);
app.controller('MyController', function($scope){

})

app.filter('spasi',function() {
    return function(input) {
        if (input) {
            return input.replace(/\s+/g, '-');
        }
    }
})

