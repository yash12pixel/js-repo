$(function () {

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function (element) {
            $(element)
                    .closest('.form-group')
                    .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                    .closest('.form-group')
                    .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'radio') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

    });
    
	
    
    $("#form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname:{
                required: true
            },
            email:{
                required: true
            },
            mobile:{
                required: true
            },
            city:{
                required: true
            },
            password:{
                required: true
            }
                
        },
            messages:
                    {
                        firstname:{
                            required: 'plz enter first name'
                        },
                        lastname:{
                            required: 'plz enter last name'
                        },
                        email:{
                            required: 'plz enter email'
                        },
                        mobile:{
                            required: 'plz enter mobile number'
                        },
                        city:{
                            required: 'plz enter city'
                        },
                        password:{
                            required: 'plz enter password'
                        }
                    }
        
    });
});




