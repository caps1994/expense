</div>

<?php
Assets::js([
	Url::templatePath().'js/jquery.js',
    Url::templatePath().'js/bootstrap.min.js',
    Url::templatePath().'js/jquery.easing.min.js',
    Url::templatePath().'js/jquery.fittext.js',
    Url::templatePath().'js/wow.min.js',
    Url::templatePath().'js/creative.js',
]);
echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone
?>

</body>
</html>


