
$(document).ready(function () {

    $('#outcomeFormDialog form').validate({  // initialize plugin
        rules: {
            amount: {
                // money: true, //<-- no such rule
                required: true
            },
            comment: {
                required: false // superfluous; "false" same as leaving this rule out.
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group')
                .removeClass('success').addClass('error');
        },
        success: function (element) {
            element.addClass('valid').closest('.control-group')
                .removeClass('error').addClass('success');
        },
        submitHandler: function (form) {
            // form validates so do the ajax
            $.ajax({
                type: $(form).attr('method'),
                url: "../php/client/json.php",
                data: $(form).serialize(),
                success: function (data, status) {
                    // ajax done
                    // do whatever & close the modal
                    $(this).modal('hide');
                }
            });
            return false; // ajax used, block the normal submit
        }
    });

});