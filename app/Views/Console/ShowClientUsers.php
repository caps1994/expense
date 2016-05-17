<!-- page content -->
			<div class="right_col" role="main">

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="row x_title">
								<div class="col-md-12">
									<h3>Users</h3>
								</div>

							</div>

                <div class="col-md-12 col-sm-12 col-xs-12">
					<?php if ($clientUsers != NULL):?>
					<div class="table-responsive">
						
					
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">ID </th>
                                    <th class="column-title">Firstname </th>
                                    <th class="column-title">Surname </th>
                                    <th class="column-title">Email </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i = 0;
								foreach($clientUsers as $user):
									$i++
								?>
                                <tr class="<?php echo ($i % 2 == 0 ? "even" : "odd");?>  pointer">
                                    <td class=" "><?=$user->user_id?></td>
                                    <td class=" "><?=$user->firstname?></td>
                                    <td class=" "><?=$user->surname?></td>
                                    <td class=" "><?=$user->email?></td>
									<?php $status = ($user->enabled == 0 ? "Enabled" : "Disabled");?>
                                    <td class=" "><?=$status?></td>
                                    <td class=" last"><a href="/console/users/edit/<?=$user->user_id?>">View</a></td>
                                </tr>
								<?php endforeach;?>
                            </tbody>
                        </table>
					</div>
					<?php else:?>
					
						<h3>There are no users added yet, add some!</h3>
						<a href="/console/users/add"><button class="btn btn-primary">Add users</button></a>
					<?php endif;?>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<br />