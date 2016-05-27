<!-- page content -->
			<div class="right_col" role="main">

				<div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<?php if ($clientUsers != NULL):?>
                        <ul class="pagination pagination-split">
                          <li><a href="#">A</a></li>
                          <li><a href="#">B</a></li>
                          <li><a href="#">C</a></li>
                          <li><a href="#">D</a></li>
                          <li><a href="#">E</a></li>
                          <li>...</li>
                          <li><a href="#">W</a></li>
                          <li><a href="#">X</a></li>
                          <li><a href="#">Y</a></li>
                          <li><a href="#">Z</a></li>
                        </ul>
                      </div>

                      <div class="clearfix"></div>
							<?php
								$i = 0;
								foreach($clientUsers as $user):
									$i++
							?>
						<div class="col-md-3 col-sm-3 col-xs-12 profile_details">
						  <div class="well profile_view">
							<div class="col-sm-12">
							  <h4 class="brief"><i><?=$user->job_title?></i></h4>
							  <div class="left col-xs-7">
								<h2><?=$user->firstname?> <?=$user->surname?></h2>
								<ul class="list-unstyled">
								  <li><i class="fa fa-building"></i> Address: </li>
								  <li><i class="fa fa-phone"></i> Phone #: </li>
								  </br>
								</ul>
							  </div>
							  <div class="right col-xs-5 text-center">
								<img src="/templates/console/assets/images/img.jpg" alt="" class="img-circle img-responsive">
							  </div>
							</div>
							<div class="col-xs-12 bottom text-center">
							  <div class="col-xs-6 col-sm-6 emphasis">
								<button type="button" class="btn btn-primary btn-xs">
								  <i class="fa fa-user"> </i> View Profile
								</button>
							</div>
								<div class="col-xs-6 col-sm-6 emphasis">
								<a href="/console/users/edit/<?=$user->user_id?>"><button type="button" class="btn btn-primary btn-xs">
								  <i class="fa fa-user"> </i> Edit Settings
								</button></a>
							  </div>
						  </div>
						</div>
				</div>
				<?php endforeach;?>
			<?php else:?>
				<h3>There are no users added yet, add some!</h3>
				<a href="/console/users/add"><button class="btn btn-primary">Add users</button></a>
				<?php endif;?>
            </div>