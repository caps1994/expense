  <!-- Javascript -->
  <?php Assets::js([
    Url::templatePath('Login').'js/jquery-1.11.1.min.js',
    Url::templatePath('Login').'bootstrap/js/bootstrap.min.js',
    Url::templatePath('Login').'js/jquery.backstretch.min.js',
    Url::templatePath('Login').'js/scripts.js',
                    ]);
  ?>
        
        <!--[if lt IE 10]>
        <?php Assets::js([
            Url::templatePath('Login').'js/placeholder.js',
                          ]);?>
        <![endif]-->

    </body>

</html>