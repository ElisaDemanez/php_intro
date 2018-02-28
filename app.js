$(document).ready(function() {
        $('select').material_select();
      });

//no resfresh for blog filter
$('#blog_filter').change(function()
 {
        $('#blog_form').submit()
 })


//check if pseudo available
 $('#username').keyup(function (el) {

        var value = el.target.value;
        $.ajax({
                url: 'register.php',
                type: 'GET',
                data: 'check=' + value ,
                success: function (entry, statut) {

                       ( $('#username_available'))[0].innerHTML = value;
                      console.log(($('#username_available'))[0].innerHTML, value)

                },
                error: function (resultat, statut, erreur) {
                },
                complete: function (resultat, statut) {
                }
        });
})

