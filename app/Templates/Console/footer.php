<!-- footer content -->

				<footer>
					<div class="copyright-info">
						<p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>		
						</p>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
			<!-- /page content -->

		</div>

	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
		<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
		</ul>
		<div class="clearfix"></div>
		<div id="notif-group" class="tabbed_notifications"></div>
	</div>

<?php Assets::js([
    Url::templatePath('Console').'js/bootstrap.min.js',
    Url::templatePath('Console').'js/gauge/gauge.min.js',
    Url::templatePath('Console').'js/gauge/gauge_demo.js',
    Url::templatePath('Console').'js/chartjs/chart.min.js',
    Url::templatePath('Console').'js/progressbar/bootstrap-progressbar.min.js',
    Url::templatePath('Console').'js/nicescroll/jquery.nicescroll.min.js',
    Url::templatePath('Console').'js/icheck/icheck.min.js',
    Url::templatePath('Console').'js/moment/moment.min.js',
    Url::templatePath('Console').'js/datepicker/daterangepicker.js',
    Url::templatePath('Console').'js/custom.js',
    Url::templatePath('Console').'js/flot/jquery.flot.js',
    Url::templatePath('Console').'js/flot/jquery.flot.pie.js',
    Url::templatePath('Console').'js/flot/jquery.flot.orderBars.js',
    Url::templatePath('Console').'js/flot/jquery.flot.time.min.js',
    Url::templatePath('Console').'js/flot/date.js',
    Url::templatePath('Console').'js/flot/jquery.flot.spline.js',
    Url::templatePath('Console').'js/flot/jquery.flot.stack.js',
    Url::templatePath('Console').'js/flot/curvedLines.js',
    Url::templatePath('Console').'js/flot/jquery.flot.resize.js',
    Url::templatePath('Console').'js/datepicker/daterangepicker.js',
    

]);?>
	<script>
		NProgress.done();
	</script>
	<!-- /footer content -->
</body>

</html>
