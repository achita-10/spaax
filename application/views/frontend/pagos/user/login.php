<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML>

<html>
  <head>
    <title>ITSSAT</title>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?echo BASE_URL();?>assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?echo BASE_URL();?>assets/css/main.css" />

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  </head>
  <body class="loading">
    <div id="wrapper">
      <div id="bg"></div>
      
      <div id="main">

        <!-- Header -->
          <header id="header">
            <h1>SPAAX</h1><br>
            <div class="row" >
                <div class="col-md-4 col-md-offset-4">
                  <?echo form_open('Spaax/inicio');?>
                
                <div class="">
                    <input type="text" class="form-control" placeholder="Usuario" name="Usuario" autofocus value="<?echo set_value('Usuario');?>"><?echo form_error('Usuario','<span class="msj_error">','</span>');?>
                    <br>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Contraseña" name="Password" value="<?echo set_value('Password');?>"><?echo form_error('Password','<span class="msj_error">','</span>');?>
                    </div>
                    
                    <div class="form-group">
                      <button class="btn btn-block btn-success" href="" type="submit"><i class=""></i> Entrar</button>
                    </div>
                    <hr>
                </div>
            <? 
              echo form_close();
            ?>
                </div>
            </div>
          </header>

        <!-- Footer -->
          <footer id="footer">
            
          </footer>

      </div>
    </div>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script>
      window.onload = function() { document.body.className = ''; }
      window.ontouchmove = function() { return false; }
      window.onorientationchange = function() { document.body.scrollTop = 0; }
    </script>
  </body>
</html>