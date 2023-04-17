


function userSave(){
    var form = $("#add_user-form");
    if( ! form.valid() ){
        //return false;
    }  


    var param = form.serialize();
    var resp = ajax_send_multipart(qry_url, param);
    alert(resp.msg);
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
        },
        error: function(jqXHR, exception, errorThrown){
                result =  { status: 0,
                            msg: JSON.parse(jqXHR.responseText) };
                $("#loading-div").hide();
        }
    });
    
    return result;
    
}