$(document).ready(function () {
    $('[data-view]').click(function () {
        let view = $(this).attr('data-view')
        console.log(view)

        if(view === 'create_xlsx')
        {
            $('#instructionsModal').modal('hide')
        }

        $.ajax({
            url:"../api/loader.php",
            type:"POST",
            data:{'data-view':view},
            success: function(r)
            {
                let template=r
                $('.container').html(template)
            }
        })
    })
})