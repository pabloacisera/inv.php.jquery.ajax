$(document).ready(function () {

    $('[data-view]').click(function () {
        let view = $(this).attr('data-view')
        console.log('vista: ', view)
        $.ajax(
            {
                url:'../api/loader.php',
                type:'POST',
                data:{'data-view':view},
                success: function(r)
                {
                    console.log(r)
                    let template = r;

                    $('.container').html(template)
                }
            }
        )
    })
})