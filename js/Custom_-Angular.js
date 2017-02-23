/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var TaskGenerator = angular.module('TaskGenerator',[]);

TaskGenerator.controller('GenTask',function($scope){
    
    $scope.first = 1;
    //$scope.second = 1;
    
    //$scope.updateValue = function()
    //{
        //$scope.calculation = $scope.first +' + '+$scope.second +" = "+(+$scope.first+ +$scope.second);
    //};
    var iTaskIdCounter = 0;
    $scope.CreateTask = function()
    {
        
        var Self = this;
        Self = angular.element(document.querySelector("#Task_id"));
        Self.append("<aside style='margin-top: 3%;' class='row remove animated slideInUp' id='Task"+iTaskIdCounter+"'><button ng-click=RemoveOneTask('Task"+iTaskIdCounter+"') class='close'>&times;</button>\n\
                    \n\
                    <section class='col-sm-12'><label class='text-center alert-success'>TASK DETAILS</label>\n\
                    \n\
                    <ol class='list-unstyled list-group-item'>\n\
                    \n\
                    <li><input class='form-control' placeholder='Task name' type='text' name='txtTaskName' value='' /></li><br/>\n\
                    <li><input class='form-control' placeholder='User ID' type='text' name='txtUserID' value='' /></li><br/>\n\
                    <li><textarea class='form-control' placeholder='Description' type='text' name='txtDescription' rows='4' cols='20'></textarea></li><br/>\n\
                    <li>Due Date <input class='form-control' type='date' name='dtDueDate' value='' /></li><br/>\n\
                    <li><h3 class='lead text-center alert-info'>Status</h3></li>\n\
                    <li>Inactive <input class='form-control' type='checkbox' name='Inactive' value='ON' /></li><br/>\n\
                    <li>Active <input class='form-control' type='checkbox' name='Active' value='ON' /></li><br/>\n\
                    <li>In Progress <input class='form-control' type='checkbox' name='In_Progress' value='ON' /></li><br/>\n\
                    <li>Complete <input class='form-control' type='checkbox' name='Complete' value='ON' /></li><br/>\n\
                    \n\
                    <li><button name='btnSubmitTask' class='form-control btn btn-success' type='submit'>Create Task</button></li></ol></sectiion></aside>");
        iTaskIdCounter++;
    };
    
    $scope.RemoveTask = function()
    {
        var Self = this;
        Self = angular.element(document.querySelectorAll(".remove"));
        Self.remove();
        iTaskIdCounter = 0;
    };
    
    $scope.RemoveOneTask = function(TaskID)
    {
        var SelfRemove = this;
        SelfRemove = angular.element(document.querySelectorAll("#"+TaskID.toString()));
        
        SelfRemove.remove();
    }
    
})



