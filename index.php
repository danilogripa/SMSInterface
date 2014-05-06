<!DOCTYPE html>
<!--[if IE 8]>    <html lt-ie9" lang="it"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="it"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />

  <title>SMS-TEXT</title>
  <meta name="description" content="SMS-TEXT">
  <meta name="author" content="Riccardo Mel">
  
  <!-- CSS -->
  <link rel="stylesheet" href="stylesheets/framework.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="javascripts/app.js"></script>

 <!-- Favicons
 ================================================== -->
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
 <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
 <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

 <noscript>
    <style>form{ display: none;}</style>
    <div class="alert-box alert">Ative o javascript para que a plataforma funcione corretamente!</div>
 </noscript>

</head>
<body>


<div class="row">
  <div class="twelve columns main" >

    <div class="row">
      <div class="three columns centered">

        <a href="" title="SMS Booster" target="_blank">
          <!--img src="rsync-italia-logo.png" alt="www.pcbackup.it" /-->
        </a>

    </div><!-- 12-->
   </div><!-- row-->

    <form id="uploader_text_sms">
      <fieldset>
        <legend>Upload Text-SMS</legend>

          <iframe src="upload.php" frameborder="0" width="100%" height="100%"  id="upload_frame"></iframe>

          <div class="row">
            <div class="twelve columns">
              <label>Mensagem</label>
              <textarea name="messaggio" id="messaggio" placeholder="Insira a sua mensagem aqui" style="height:150px;"></textarea>
               <p style="text-align:right;color:#2ba6cb">Limite <span id="countBox">160 </span> caracteres</p>
            </div><!-- 12-->
          </div><!-- row-->

         <input type="button" id="button-submit" class="button" value="Enviar">

      </fieldset>
    </form>

  </div><!--large12-->
</div><!--row-->

<!-- Credits Area-->
<div class="row">
  <div class="twelve columns " >

    <p style="text-align:right; font-size:16px;"><small>Powered by <a href="http://www.newtekinformatica.it/" title="Siti web e programmazione - Sviluppo Software personalizzato." target="_blank">Danilo Gripa</a></small></p>

  </div><!--large12-->
</div><!--row-->

</body>
</html>