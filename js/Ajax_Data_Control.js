/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
   $("btnSubmit").click( function(){
      
       info = [];
       info[0] = $('#txtName').val();
       info[1] = $('txtSurname').val();
       info[2] = $('txtemail').val();
       info[3] = $('txtPass').val();
       
       $.ajax({
          
            type: 'POST',
            url: "dbAccess_Control.php",
            data: {DataInfo:info},
            success: function(data) 
            {
                $('#Rs').html(data);
            }
       });
   });
    
});

