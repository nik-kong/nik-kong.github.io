$(document).ready(function(){

    $("#ajax-contact-form").validate({
        
       rules:{
						"login":{
                            required:true,
							minlength:5,
                            maxlength:30
                        /*  remote: {   
                            type: "post",    
		                    url: "check_login.php"
		                            } */
						},
                        "name":{
							required:true,
                            minlength:6,
                            maxlength:30
						},
                        "surname":{
							required:true,
                            minlength:6,
                            maxlength:30
						},
                        "email":{
						    required:true,
							email:true
						},
						"phone":{
							required:true
						},
						"password":{
							required:true,
							minlength:8,
                            maxlength:30
						}
						     
						},
       
       messages:{
						"login":{
							required:"Укажите Логин!",
                            minlength:"От 5 до 15 символов!",
                            maxlength:"От 5 до 15 символов!",
                            remote: "Логин занят!"
						},
                        "name":{
							required:"Укажите ваше Имя!",
                            minlength:"От 3 до 15 символов!",
                            maxlength:"От 3 до 15 символов!"                               
						},
                        "surname":{
							required:"Укажите вашу Фамилию!",
                            minlength:"От 3 до 20 символов!",
                            maxlength:"От 3 до 20 символов!"                            
						},
                        "email":{
						    required:"Укажите свой E-mail!",
							email:"Не корректный E-mail"
						},
                        "phone":{
							required:"Укажите номер телефона!"
						},
						"password":{
							required:"Укажите Пароль!",
                            minlength:"От 7 до 15 символов!",
                            maxlength:"От 7 до 15 символов!"
						}
					},
        submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) { 
								 
        if (data == 'true')
    {
       $("#block-form-registration").fadeOut(300,function() {
        $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Админ добавлен!");
        $("#form_submit").hide();
        
       });
         
    }
     else
      if (data == 'edit')   
    {
       $("#block-form-registration").fadeOut(300,function() {
        $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Все норм!");
        $("#form_submit").hide();
    });
    }
    else
    {
       $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data); 
    }
		} 
			}); 
			}
    });


}); //end of ready