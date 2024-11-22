function reqAjax(url, type, data, datatype, callback)
{
    $.ajax(
        {
            url: '/inventify/api' + url,
            type: type,
            data: data,
            dataType: datatype,
            success: function(response)
            {
                callback(response)
            },
            error: function(xhr, status,error)
            {
                console.error('Error en la solicitud de AJAX: ',status , error)
            }
        }
    )
}

export {reqAjax};