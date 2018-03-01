$(document).ready(function() {
        $('select').material_select();
      });

//no resfresh for blog filter
$('#blog_filter').change(function()
 {
        $('#blog_form').submit()
 })


//register :check if pseudo available
 $('#username').keyup(function (el) {

        var value = el.target.value;
        $.ajax({
                url: 'components/register_pseudo_checker.php',
                type: 'GET',
                data: 'check=' + value ,
                success: function (entry, statut) {
                        console.log(entry)      
                       
                        if (entry == "0") {
                                 $('#username_available')[0].innerHTML =  "<i class=\"medium material-icons left green_icon\"  >done</i>";
                        }
                        if (entry == "1") {
                        
                                 $('#username_available')[0].innerHTML = "<i class=\"medium material-icons left red_icon\">close</i>";
                        }
                },
                error: function (resultat, statut, erreur) {
                },
                complete: function (resultat, statut) {
                }
        });
})


$('#delete_confirm').click(function (el) {
confirm('are e sure ? ')
})
