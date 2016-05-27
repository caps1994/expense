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
                  <h2>Add Client User</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <?=Error::display($error);?>
                  <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-firstname" >First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="form-firstname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$clientUser[0]->firstname?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-surname">Surname <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="form-surname" name="form-surname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$clientUser[0]->surname?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="form-email" name="form-email" required="required" class="form-control col-md-7 col-xs-12" value="<?=$clientUser[0]->email?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="form-band" class="control-label col-md-3 col-sm-3 col-xs-12">Band </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="form-band" class="form-control col-md-7 col-xs-12" type="text" name="form-band" value="<?=$clientUser[0]->band?>">
                      </div>
                    </div>
										<div class="form-group">
                      <label for="form-department" class="control-label col-md-3 col-sm-3 col-xs-12">Department </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="form-department" class="form-control col-md-7 col-xs-12" type="text" name="form-department" value="<?=$clientUser[0]->department?>">
                      </div>
                    </div>
										<div class="form-group">
                      <label for="form-band" class="control-label col-md-3 col-sm-3 col-xs-12">Job Title </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="form-jtitle" class="form-control col-md-7 col-xs-12" type="text" name="form-jtitle" value="<?=$clientUser[0]->job_title?>">
                      </div>
                    </div>
										<?php if ($managers != NULL):?>
										<div class="form-group">
                      <label for="form-manger" class="control-label col-md-3 col-sm-3 col-xs-12">Manager </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
											<select name="form-manager">
												<?php foreach($managers as $manager):?>
												<option value="<?=$manager->user_id?>"><?=$manager->firstname . ' ' . $manager->surname?></option>
												<?php endforeach?>
											</select>
										</div>
                    </div>
										<?php endif?>
										<div class="form-group">
                      <label for="form-ismanager" class="control-label col-md-3 col-sm-3 col-xs-12">Is this User a Manager? </label>
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <input id="form-ismanager" class="form-control col-md-7 col-xs-12" type="checkbox" name="form-ismanager" value="0"  <?php $manager = ($clientUser[0]->is_manager == 0  ? "checked" : ""); echo $manager;?>>
                      </div>
                    </div>
										<div class="form-group">
                      <label for="form-enabled" class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
											<select name="form-status">
												<option value="0" <?php $test = ($clientUser[0]->enabled == 0 ? "selected='selected'" : ""); echo $test;?>>Enabled</option>
												<option value="1" <?php $test = ($clientUser[0]->enabled == 1 ? "selected='selected'" : ""); echo $test;?>>Disabled</option>
											</select>
										</div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="hidden" name="token" value="<?php echo $data['csrfToken']; ?>" />
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>