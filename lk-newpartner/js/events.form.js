
$(document).on('change','#select_Status', function(){
    let desc_st =  $('#desc_status_block');
    let comment_st =  $('#comment_status_block');
    let ex_block = $('#name_ex');


    if($(this).val() === '0'){
        $('#desc_status').removeAttr('required');
        desc_st.css('display', 'none');
        ex_block.css('display', 'none');
        comment_st.css('display', 'none');
    }
    if($(this).val() === '2'){
        desc_st.css('display', 'block');
        $('#desc_status').attr('required', 'required');
        ex_block.css('display', 'none');
        comment_st.css('display', 'none');
    }

    if($(this).val() === '1'){
        $('#desc_status').removeAttr('required');
        $('#selectEx').remove();
        let data_ex = $('#stat_ex_json').attr('data-state-json');
        let d_ex = JSON.parse(data_ex);
        let s = $("<select id='selectEx' name='selectEx' class='form-control' />");
        $("<option />", {value: 0, text: 'Список искл. ситуаций'}).appendTo(s);
        for(var item in d_ex){
            $("<option />", {value: d_ex[item].NAME, text: d_ex[item].NAME}).appendTo(s);
        }
        desc_st.css('display', 'none');
        comment_st.css('display', 'block');
        ex_block.css('display', 'block');
        s.appendTo(ex_block);
    }


});
$('#edit_status_form').submit(function (e) {
    e.preventDefault();
    $('#edit_status_form button[type=submit]').attr('disabled', 'disabled');
    let fields = $(this).serializeArray();
    console.log(fields);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/tools/change_invoice.php?status=Y",
        data: fields,
        success: function(data)
        {
            console.log(data);
            if(data.error){
                let alert_error = $('#edit_status .alert');
                alert_error.css("display","block");
                alert_error.html('<p>' + data.error + '</p>');
                console.log(data.error);
                $('#edit_status_form button[type=submit]').removeAttr('disabled');
            }else{
                console.log(data.newstatus);
                $('#status_' + data.id).text(data.name);
                let modal_body = $('#edit_status .modal-body');
                modal_body.html('<h4 style="text-align: center">Обновляем...</h4>' +
                    '<div style="display: flex; flex-direction: row; justify-content: center">' +
                    '<img style="display:block" src="/bitrix/components/black_mist/newpartner.requests.v.2.1/templates/lk-newpartner/images/spinner.gif"' +
                    ' alt="">' +
                    '</div>');
                $('#edit_status').modal('hide');

             }

        }
    });
});

$('#edit_status .maskdatetime').mask('99.99.9999 99:99:00');
