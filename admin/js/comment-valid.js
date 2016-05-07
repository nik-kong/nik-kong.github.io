$(document).ready(function(){	
			$("#ajax-contact-form").validate({
        
        rules:{
						"name":{
                            required:true,
							minlength:5,
                            maxlength:30
						},
                        
						"message":{
							required:true,
							minlength:8,
                            maxlength:30
						}
						     
						},
       
       messages:{
						"name":{
							required:"Укажите Имя!",
                            minlength:"От 5 до 15 символов!",
                            maxlength:"От 5 до 15 символов!"
						},
                        
						"message":{
							required:"Введите сообщение!",
                            minlength:"От 7 символов!"
						}
					},        
                
        submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) { 
								 
        if (data == 'true')
    {
      // $("#block-form-registration").fadeOut(300,function() {
        
        $("#comment_message").addClass("comment_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
        $("#form_submit").hide();
        
       });  
    }
    else
    {
       $("#comment_message").addClass("comment_message_error").fadeIn(400).html(data); 
    }
		} 
			}); 
			}
    });