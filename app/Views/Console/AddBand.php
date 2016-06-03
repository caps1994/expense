<?php
use Core\Error;
?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Band Group</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <?=Error::display($error);?>
                  <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-firstname">Band Group Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="form-band-group" name="form-band-group" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-surname">Max Spend <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="form-max-spend" name="form-max-spend" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-email">Description</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="form-notes" name="form-notes" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form-enabled" class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
							<select name="form-status"><?=$clientUser[0]->enabled?>
								<option value="0" <?php $test = ($clientUser[0]->enabled == 0 ? "selected='selected'" : ""); echo $test;?>>Enabled</option>
								<option value="1" <?php $test = ($clientUser[0]->enabled == 1 ? "selected='selected'" : ""); echo $test;?>>Disabled</option>
							</select>
						</div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="hidden" name="token" value="<?php echo $data['csrfToken']; ?>" />
                        <a href="/console/band-groups/"><button type="button" class="btn btn-primary">Cancel</button></a>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>