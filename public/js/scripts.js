/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
//
// Scripts
//

$(function () {
    var current = window.location.href;

    $('#sidebar-main nav a').each(function () {
        var $this = $(this);
        // if the current path is like this link, make it active
        if ($this.attr('href') == current) {
            $this.css({ "background-color": "#164384" });
            $this.parent('.nav').parent('.collapse').addClass('show');

        }
    });


    // Expanses create Repeater.
    var theTotal = 0;
    $('#addexp').click(function (e) {


        $('#totalitemfoot').css('opacity', '1');

        var amount = $.trim($('#amount').val());
        if (amount != '') {
            if (!isNaN(amount)) {
                var ref = $('#ref').val()
                var expense = $('#expense').val()

                theTotal = Number(theTotal) + Number(amount);
                $('#itemdata').append(`<tr><td style="width:40px; text-align:center"></td><td>${expense}<input type="hidden" name="expensehead[]" value="${expense}"></td><td class ="thisamount">${amount}</td><td>${ref}</td><td class="removedata" style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></td></tr>`);
                $('#amount').val("");
                $('#ref').val("");
                $('#expense').val("");
                $('#totalamount').text(theTotal);
                $('#totalvalue').val(theTotal);


                updateSerial();
            }
        }
    });

    $('#itemdata').on('click', '.removedata', function () {
        var currentamount = $(this).closest('tr').find('.thisamount').html();
        theTotal = Number(theTotal) - Number(currentamount);
        $('#totalamount').text(theTotal);
        $(this).closest('tr').remove();


        updateSerial();
    });

    //update the serial no
    function updateSerial() {

        var table = document.getElementById("create_expanse_table");
        var rowcountAfterDelete = document.getElementById("create_expanse_table").rows.length - 1;
        for (var i = 1; i < rowcountAfterDelete; i++) {
            table.rows[i].cells[0].innerHTML = i;
        }
    }

    //bank tranction create option.
    $('#deposit-form').on('change', function () {
        var acc_type = $('option:selected', this).attr('type');
        if (acc_type === 'bank') {
            $('#cheque_no').prop("disabled", false);
            $('#cheque_date').prop("disabled", false);
            var cdate = new Date();
            var cheque_date = cdate.toISOString().slice(0, 10);
            document.getElementById('cheque_date').value = cheque_date;
        } else {
            $('#cheque_date').val('');
            $('#cheque_no').prop("disabled", true);
            $('#cheque_date').prop("disabled", true);
        }

        //enable disable option
        var val = $(this).val()
        if (val.length !== 0) {
            $('#deposit-to').prop("disabled", false);
            $('#deposit-to option:eq(0)').attr('selected', false);
        } else {
            $('#deposit-to option:eq(0)').attr('selected', true);
            $('#deposit-to').prop("disabled", true);

        }

        //remove selected option from deposit-to option.
        var deposit_to = $('#deposit-to option');
        $('#deposit-to option').each(function (e) {
            if (val.length !== 0) {
                if (val == $(this).val()) {
                    $(this).css('display', 'none');
                } else {
                    $(this).css('display', 'block');
                }
            }

        });
    });

    //bank transaction repeater
    var theTotalTrn = 0;
    $('#addtranction').click(function (e) {


        $('#totaltranfoot').css('opacity', '1');

        var trnamount = $.trim($('#trnamount').val());
        var trnrefer = $.trim($('#trnref').val());
        var source = $('#deposit-form option').filter(':selected').text()
        var payto = $('#deposit-to option').filter(':selected').text()
        if (trnamount != '' && trnrefer != '') {
            if (!isNaN(trnamount)) {
                var source = $('#deposit-form option').filter(':selected').text()
                var source_id = $('#deposit-form option').filter(':selected').val()
                var payto = $('#deposit-to option').filter(':selected').text()
                var payto_id = $('#deposit-to option').filter(':selected').val()
                var cheque = $('#cheque_no').val()
                var trndate = $('#cheque_date').val()
                var trnref = $('#trnref').val()
                var expense = $('#expense').val()

                theTotalTrn = Number(theTotalTrn) + Number(trnamount);
                $('#trnitemdata').append(`<tr><td style="width:40px; text-align:center"></td><td>${source}<input type="hidden" name="source[]" value="${source_id}"></td><td>${payto}<input type="hidden" name="payto[]" value="${payto_id}"></td><td class ="thisamount">${trnamount}</td><input type="hidden" name="tranamount[]" value="${trnamount}"><td>${cheque}<input type="hidden" name="cheque_no[]" value="${cheque}"></td><td>${trndate}<input type="hidden" name="cq_date[]" value="${trndate}"></td><td>${trnref}<input type="hidden" name="trnref[]" value="${trnref}"></td><td class="trnremovedata" style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></td></tr>`);
                $('#trnamount').val("");
                $('#trnref').val("");
                $('#cheque_no').val("");
                $('#cheque_date').val("");
                $('#expense').val("");

                $('#deposit-from option:eq(0)').attr('selected', true);
                $('#deposit-to option:eq(0)').attr('selected', true);
                $('#totalamount').text(theTotalTrn);
                $('#trntotalamount').val(theTotalTrn);
                $('#totalvalue').val(theTotalTrn);


                updateSerial();
            }
        }
    });

    $('#trnitemdata').on('click', '.trnremovedata', function () {
        var trncurrentamount = $(this).closest('tr').find('.thisamount').html();
        theTotalTrn = Number(theTotalTrn) - Number(trncurrentamount);
        $('#totalamount').text(theTotalTrn);
        $('#trntotalamount').val(theTotalTrn);
        $(this).closest('tr').remove();


        updateSerial();
    });

    $("#create-transanction").on('submit', function (e) {

        if (theTotalTrn == 0) {
            alert('Please fill up the form.');
            e.preventDefault();
        }

    });

    


})
