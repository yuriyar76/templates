$(document).ready(function() {
    $('#dataTableS').DataTable(
        {
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }

        }
    );
    $('#dataTable').DataTable(
        {
            "scrollX": true,
            "columnDefs": [
                {
                    "targets": [ 2 ],
                    "searchable": false
                },
                {
                    "targets": [ 8 ],
                    "searchable": false
                }
            ],
            "order": [[ 0, "desc" ]],
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }

        }
    );
    $('#dataTable').on('click','.get_pods_fl', function (e) {
        e.preventDefault();
        let data = $(this).attr('data-number');
        let data_invoice = $(this).attr('data-invoice');
        let $preloader = $('#p_prldr_track'),
            $svg_anm   = $preloader.find('.svg_anm_track');
        $preloader.attr('style', 'display:block');
        $svg_anm.attr('style', 'display:block');
        $.ajax({
                url:'/tools/change_user_fl.php',
                type:'get',
                data:{number: data, number_invoice: data_invoice},
                dataType: 'json',
                success: function (json) {
                    let $preloader = $('#p_prldr_track'),
                        $svg_anm   = $preloader.find('.svg_anm_track');
                    $preloader.attr('style', 'display:block');
                    $svg_anm.attr('style', 'display:block');
                    $svg_anm.fadeOut();
                    $preloader.delay(100).fadeOut('slow');
                    $.each(json , function (index, value){
                        let $collect = value.Documents.Document_1.Events;
                        let $messtrack = `
                        <tr>
                          <th>Дата</th>
                          <th>Время</th>
                          <th>Статус</th>
                          <th>Сообщение</th>
                         </tr>`;
                        $.each($collect, function (ind, val) {
                            $messtrack += "<tr>";
                            $.each(val, function (i,v) {
                                if (i == 'INVOICE_NUMBER'){
                                    $('#fl_track_label .h5_sp').text(v);
                                }
                                if(i != 'ID' && i != 'INN' && i != 'NUMBER' && i != 'INVOICE_NUMBER'){
                                    $messtrack += `<td>${v}</td>`;
                                }
                                console.log(i);
                            });
                            $messtrack += "</tr>";
                            console.log(val);
                        });
                        console.log($messtrack);
                        $('#fl_track .modal-body .table-responsive .table').html($messtrack);
                        $('#fl_track').modal('show');
                    });
                    let tr = $('#fl_track .table tr').first().next();
                    let tr_ev = tr[0].cells[0].innerHTML;
                    let tr_dt = tr[0].cells[1].innerHTML;
                    let tr_tm = tr[0].cells[2].innerHTML;
                    tr[0].cells[0].innerText = tr_dt;
                    tr[0].cells[1].innerText = tr_tm;
                    tr[0].cells[2].innerText = tr_ev;
                }
            }
        );
    });
    $('#mess-profile').empty();
    $('#form_profile_fl').on('submit', function(e){
        e.preventDefault();
        let $that = $(this),
            fData = $that.serializeArray();
        //8console.log(fData);
        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            data: {form_data: fData},
            dataType: 'json',
            success: function(json){
                if(json.change==1){
                    console.log(json.mess);
                    $('#fl_profile').modal('hide');
                    let mess = json.mess;
                    if(mess){
                        let message = `<div class="alert alert-success" role="alert">
                             ${mess}
                    </div>`;
                        let messprof = $('#mess-profile');
                        messprof.append(message);
                        setTimeout(function(){
                            // $('#mess-profile').empty();
                            $('#mess-profile').hide('slow', function(){
                                $(this).empty();
                            });

                        }, 5000);
                        messprof.attr('style', 'display:block');
                    }
                }else{
                    $('#fl_profile').modal('hide');
                    let messerr = json.messerr;
                    if(messerr){
                        let messprof = $('#mess-profile');

                        let message = `<div class="alert alert-danger" role="alert">
                             ${messerr}
                    </div>`;
                        messprof.append(message);
                        messprof.attr('style', 'display:block');
                    }
                }
            }
        });
    });
    $('#add_modal_sender_form').on('submit', function(e){
        e.preventDefault();
        let $that = $(this),
            fData = $that.serializeArray();
        console.log(fData);
        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            data: {form_data: fData},
            dataType: 'json',
            success: function(json){
                if(json.change == 1){
                    console.log(json.mess);
                    $('#add_modal_sender').modal('hide');
                    let mess = json.mess;
                    if(mess){
                        let messprof =  $('#mess-profile');
                        let message = `<div class="alert alert-success" role="alert">
                             ${mess}
                    </div>`;
                        messprof.append(message);
                        setTimeout(function(){
                            // $('#mess-profile').empty();
                            $('#mess-profile').hide('slow', function(){
                                $(this).empty();
                            });
                            window.location.href = '/customers-lk/?sender_add=Y';
                        }, 2000);
                        messprof.attr('style', 'display:block');
                    }
                }else{
                    let err = $('#err_sender');
                    err.empty();
                    let messerr = json.messerr;
                    if(messerr){
                         let message = `<div class="alert alert-danger" role="alert">
                             ${messerr}
                    </div>`;
                        err.append(message);
                    }
                }
            }
        });
    });

    $('#add_modal_recipient_form').on('submit', function(e){
        e.preventDefault();
        let $that = $(this),
            fData = $that.serializeArray();
        console.log(fData);
        $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            data: {form_data: fData},
            dataType: 'json',
            success: function(json){
                if(json.change == 1){
                    console.log(json.mess);
                    $('#add_modal_recipient').modal('hide');
                    let mess = json.mess;
                    if(mess){
                        let messprof =  $('#mess-profile');
                        let message = `<div class="alert alert-success" role="alert">
                             ${mess}
                    </div>`;
                        messprof.append(message);
                        setTimeout(function(){
                            // $('#mess-profile').empty();
                            $('#mess-profile').hide('slow', function(){
                                $(this).empty();
                            });
                            window.location.href = '/customers-lk/?recipient_add=Y';
                        }, 2000);
                        messprof.attr('style', 'display:block');
                    }
                }else{
                    let err = $('#err_recipient');
                    err.empty();
                    let messerr = json.messerr;
                    if(messerr){
                        let message = `<div class="alert alert-danger" role="alert">
                             ${messerr}
                    </div>`;
                        err.append(message);
                    }
                }
            }
        });
    });

    $('#dataTable_form').on('submit', function (e) {
        e.preventDefault();
        let $that = $(this),
            fData = $that.serializeArray();
            $.ajax({
            url: $that.attr('action'),
            type: $that.attr('method'),
            data: {form_data: fData},
            dataType: 'json',
            success: function(json){
                let id =json.id;
                let el = $(`#dataTable_form input[value=${id}]`);
                console.log(el.parent());
            }
        });

    });
    $('#dataTable_form input[type=radio]').on('click', function (e) {
       let $that = $(this);
       console.log(this);
       $('#dataTable_form_submit').click();
    });

});


