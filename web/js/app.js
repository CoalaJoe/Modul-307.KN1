/**
 * Created by Dominik on 20.09.2014.
 */

(function ($) {
    "use strict";

    $(document).ready(function () {

        // Add Event on .btn-form, then get the fields of tabler over ajax
        $('.btn-form').on('click', function () {
            var tablename = $(this).text();
            $.ajax({
                method: 'POST',
                url: 'loader.php',
                data: {
                    name: tablename
                },
                success: function (data) {
                    $('#rendered-form').html(data);
                    $('#rendered-form').append('<h1 id="code-title">Code</h1><hr/><pre id="code-area" class="prettyprint js-zeroclipboard-target lang-html"></pre>').hide().fadeIn("slow");
                    $('#code-area').text(data);
                    prettyPrint();
                    $('#code-title').append('&nbsp;<button class="btn btn-success" id="copy-button" data-clipboard-text=" " title="Click to copy me.">Kopieren</button>').hide().fadeIn("slow");
                    addCopying();
                }
            });
        });

        // ZeroClipboard to save sourcecode to your clipboard. Requires Flash.
        var addCopying = function () {
            var client = new ZeroClipboard(document.getElementById("copy-button"));
            client.on("ready", function (readyEvent) {
                // alert( "ZeroClipboard SWF is ready!" );
                $('#copy-button').attr('data-clipboard-text', $('#code-area').text());
                client.on("aftercopy", function (event) {
                    // `this` === `client`
                    // `event.target` === the element that was clicked
                });
            });
        }


    });

})(jQuery);