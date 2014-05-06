  $(document).ready(function() {

        var max = 160;      
        $("#messaggio").keyup(function() {

                var len_messaggio = $("#messaggio").val().length;
                $("#countBox").text(max-len_messaggio);

                if (max - len_messaggio < 0){
                       var str = $(len_messaggio).val();
                      var str = str.substring(0,max);
                        $(len_messaggio).val(str);
                        $("#countBox").text(0);
                }//IF

        });//KeyUP

       //Contact
        $("#button-submit").click(function(){

          $(this).hide();
           $("<img src='images/loader.gif' class='loader' />").appendTo("#uploader_text_sms");

            var upload = $('#upload_frame').contents().find('#upload').val();
            var messaggio = $('#messaggio').val();
            var len_messaggio = $("#messaggio").val().length;

            if (len_messaggio > 160) {

              alert("Attenzione! - Il messaggio contiene più di 160 caratteri! Correggi il messaggio e re-invia.");
              $(".loader").hide();
              $("#button-submit").delay(1000).fadeIn();

            } else if (messaggio == "") { 

              alert("Attenzione! - Devi inserire un messaggio.");
              $(".loader").hide();
              $("#button-submit").delay(1000).fadeIn();

            } else {

            //chiamata ajax
            $.ajax({
         
              type: "POST",
              url: "elabora.php",
              data: "upload=" + upload + "&messaggio=" + messaggio,
              dataType: "html",
         
              success: function(msg)
              {
                $(".loader").hide();
                $("<div id='risultato'></div>").appendTo("#uploader_text_sms").html(msg).delay(6000).fadeOut(3000);
                $("#button-submit").delay(1000).fadeIn();
              },
              error: function()
              {
                alert("Errore connessione al server...riprova più tardi.");
              }

            });//ajax

          }//IF messaggio troppo lungo
                   
        }); //fine form

    
  });//DOM