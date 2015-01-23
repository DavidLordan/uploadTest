/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//AngularJS controller. 
var uploadTest = angular.module('uploadTest', []);
var updateJSON;

var otherFun = function () {
    updateJSON();
    console.log("dude");
}

//AngularJS controller. 
uploadTest.controller("uploadTestCtrl", function ($scope, $http) {

    //Fetches the song list, stored in a JSON file, via AJAX
    $http.get('testList.json').success(function (data) {
        $scope.myList = data;

        updateJSON = function () {

            $http.get('testList.json').success(function (data) {

                $scope.myList = data;

            });
        
        };

    });




});