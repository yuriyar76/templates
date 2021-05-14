$('#edit_number_form').submit(function (e) {
    e.preventDefault();
    $('#edit_number_form button[type=submit]').attr('disabled', 'disabled');
    let fields = $(this).serializeArray();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/tools/change_invoice.php?number=Y",
        data: fields,
        success: function(data)
        {
            console.log(data);
            if(data.error){
                let alert_error = $('#edit_number .alert');
                alert_error.css("display","block");
                alert_error.html('<p>' + data.error + '</p>');
                console.log(data.error);
                $('#edit_number_form button[type=submit]').removeAttr('disabled');
            }else{
                console.log(data.newnumber);
                $('#PROPERTY_1023_' + data.newnumber + '_p').text(data.newnumber);
                let modal_body = $('#edit_number .modal-body');
                modal_body.html('<h4 style="text-align: center">Обновляем...</h4>' +
                    '<div style="display: flex; flex-direction: row; justify-content: center">' +
                    '<img style="display:block" src="/bitrix/components/black_mist/newpartner.requests.v.2.1/templates/lk-newpartner/images/spinner.gif"' +
                    ' alt="">' +
                    '</div>');
                $('#edit_number').modal('hide');
            }

        }
    });
});