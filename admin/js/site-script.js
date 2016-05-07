$(document).ready(function(){
$("#button-auth").click(function() {
        
 var auth_login = $("#auth_login").val();
 var auth_pass = $("#auth_password").val();

 
 if (auth_login == "" || auth_login.length > 30 )
 {
    $("#auth_login").css("borderColor","#e88585");
    send_login = 'no';
 }else {
    
   $("#auth_login").css("borderColor","#3f3c39");
   send_login = 'yes'; 
      }

 
if (auth_pass == "" || auth_pass.length > 15 )
 {
    $("#auth_password").css("borderColor","#e88585");
    send_pass = 'no';
 }else { $("#auth_password").css("borderColor","#3f3c39");  send_pass = 'yes'; }



 if ($("#auth_checkbox").prop('checked'))
 {
    auth_rememberme = 'yes';

 }else { auth_rememberme = 'no'; }


 if ( send_login == 'yes' && send_pass == 'yes' )
 { 
    
    $.ajax({
  type: "POST",
  url: "./auth.php",
  data: "login="+auth_login+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'yes_auth')
  {
      location.reload();
  }else
  {
      $("#message-auth").slideDown(400);
      
  }
  
}
});  
}
});

    $('#logout').click(function(){
    
    $.ajax({
  type: "POST",
  url: "./logout.php",
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'logout')
  {
      location.reload();
  }
  
}
}); 
});
    
});