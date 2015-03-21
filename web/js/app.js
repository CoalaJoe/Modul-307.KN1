/**
 * Created by Dominik on 20.09.2014.
 */

(function ($) {
    "use strict";


    $(document).ready(function () {

        $('.btn-form').on('click',  function(){
            var tablename = $(this).text();
            $.ajax({
                method: 'POST',
                url: 'loader.php',
                data: {
                    name: tablename
                },
                success: function(data){
                    $('#rendered-form').html(data);
                }
            });
        });

    });

}) (jQuery);