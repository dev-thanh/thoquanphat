$('.btn--registration').click(function(e){

    e.preventDefault();

    $('.loadingcover').show();

    var UrlContact =$('#frm_contact').attr('action');

    var data = $("#frm_contact").serialize();

    $.ajax({

        type: 'POST',

        url: UrlContact,

        dataType: "json",

        data: data,

        success:function(data){

            console.log(data);

            if(data.message_name){

                $('.fr-error').css('display', 'block');

                $('#error_name').html(data.message_name);

            } else {

                $('#error_name').html('');

            }

            if(data.message_phone){

                $('.fr-error').css('display', 'block');

                $('#error_phone').html(data.message_phone);

            } else {

                $('#error_phone').html('');

            }

            if(data.building_site){

                $('.fr-error').css('display', 'block');

                $('#error_building_site').html(data.building_site);

            } else {

                $('#error_building_site').html('');

            }

            if(data.advisory_content){

                $('.fr-error').css('display', 'block');

                $('#error_advisory_content').html(data.advisory_content);

            } else {

                $('#error_building_site').html('');

            }

            if (data.success) {

                $('#frm_contact')[0].reset();

                toastr["success"](data.success, "Thông báo");

            }

            $('.loadingcover').hide();

        }

    });

});



$('.send-contact').click(function(e){

    e.preventDefault();

    $('.loadingcover').show();

    var UrlContact =$('#form-send-contact').attr('action');

    var data = $("#form-send-contact").serialize();

    $.ajax({

        type: 'POST',

        url: UrlContact,

        dataType: "json",

        data: data,

        success:function(data){

            if(data.message_name){

                $('.fr-error').css('display', 'block');

                $('#error_name').html(data.message_name);

            } else {

                $('#error_name').html('');

            }

            if(data.message_phone){

                $('.fr-error').css('display', 'block');

                $('#error_phone').html(data.message_phone);

            } else {

                $('#error_phone').html('');

            }

            if (data.success) {

                $('#form-send-contact')[0].reset();

                toastr["success"](data.success, "Thông báo");

            }

            $('.loadingcover').hide();

        }

    });

});
