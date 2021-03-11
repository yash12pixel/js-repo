$(function(){
	
	$.validator.setDefaults({
		errorClass:'help-block',
		highlight:function(element){
			$(element)
				.closest('.form-group')
				.addClass('has-error');
		},
		unhighlight:function(element){
			$(element)
				.closest('.form-group')
				.removeClass('has-error');
		},
		errorPlacement:function(error,element){
			if(element.prop('type')=='radio'){
				error.insertAfter(element.parent());
			}else{
				error.insertAfter(element);
			}
		}
		
	});
	
$.validator.addMethod('StrongPassword',function(value,element){
	return value.lenght>=6;
	},'Your password must be 6 characters long')
	
	
	$("#cust-register").validate({
		rules:{
			username:{
				required:true,
                 nowhitespace:true
			},
			gen:{
				required:true
			},
            birth_date:{
                required: true
            },
			address:{
				required:true
			},
            city:{
                required: true
            },
			mobile_number:{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
			},
			password:{
				required:true,
				minlength:6,
                maxlength: 10		
				
			},
			cnf_password:{
				required:true,
				equalTo:"#password"
			},
            image:{
                required: true,
                extension: "jpg,jpeg, png"
            }
			
		},
		
		messages:
		{
			username:{
				required:'Please enter username'
			},
			gen:{
				required:'Please select gender'
			},
            birth_date:{
				required:'Please enter your birthdate'
            },
			address:{
				required:'Please enter your address'
			},
            city:{
				required:'Please enter your city'
            },
			mobile_number:{
				required:'Please enter mobile number',
				minlength:'Mobile number must be 10 digits long',
				maxlength:'Mobile number must be 10 digits long',
				number:'Only digits allowed'
			},
			password:{
				required:'Please enter password',
                minlength: 'password must be 6 to 10 charactor long',
                maxlength: 'password must be 6 to 10 charactor long'				
			},
			cnf_password:{
				required:'Please confirm your password',
				equalTo:'Password did not match'
			},
            image:{
				required:'Please upload your image',
                extension: "You're only allowed to upload jpg or png images."
            }
		}
	});
});