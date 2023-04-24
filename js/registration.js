


function checkMobile(){
    var param = {
        "action": "check_mobile",
        "mobile": $("#phone").val()
    };
    var resp = ajax_send_multipart(qry_url, param);

    alert(resp.msg);
    switch(resp.success){
        case 0 :
        break;
        case 1 :
            $(".input1").attr("readonly", true);
            Object.keys(resp.data).forEach(function(key){
                $("#"+key).val(resp.data[key]);
            });

            $('#gender_text').val(resp.data['gender']);
            $('#gender_text').css('textTransform', 'capitalize');
            $("#extend-form").show();
            $("#check_number_btn").hide();
        break;
    }
}


function register_user(){
    var form = $("#register-form");
    var param = form.serialize();
    var resp = ajax_send_multipart(qry_url, param);

    alert(resp.msg);
    switch(resp.success){
        case 0 :
        break;
        case 1 :
            $(".input1").attr("disabled", true);
            Object.keys(resp.data).forEach(function(key){
                $("#"+key).val(resp.data[key]);
            });
            $("#extend-form").show();
            $("#check_number_btn").hide();
        break;
    }
}













function ajax_send_multipart(url, param)
{    
    var result;
    $.ajax({
        async: false,
        url: url,
        method: "POST",
        data: param,
        //data: JSON.stringify(param),
        dataType: "json",
        //contentType: "application/json; charset=utf-8",
        enctype: 'multipart/form-data',
        beforeSend: function () { $("#loading-div").show(); },
        success: function(datalist){
                result = datalist;
                $("#loading-div").hide();
                console.log(result);
        },
        error: function(jqXHR, exception, errorThrown){
                result =  { status: 0,
                            msg: JSON.parse(jqXHR.responseText) };
                $("#loading-div").hide();
        }
    });
    
    return result;
    
}