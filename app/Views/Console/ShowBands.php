<!-- page content -->
			<div class="right_col" role="main">

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="row x_title">
								<div class="col-md-12">
									<h3>Band Groups</h3>
								</div>

							</div>

                <div class="col-md-12 col-sm-12 col-xs-12">
					<?php if ($bands != NULL):?>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">ID </th>
                                    <th class="column-title">Band Group Name </th>
                                    <th class="column-title">Max Spend </th>
									<th class="column-title">Description </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i = 0;
								foreach($bands as $band):
									$i++
								?>
                                <tr class="<?php echo ($i % 2 == 0 ? "even" : "odd");?>  pointer">
                                    <td class=" "><?=$band->band_group_id?></td>
									<td class=" "><?=$band->band_group_name?></td>
                                    <td class=" ">£<?=$band->max_spend?></td>
                                    <td class=" "><?=$band->notes?></td>
									<?php $status = ($band->enabled == 0 ? "Enabled" : "Disabled");?>
                                    <td class=" "><?=$status?></td>
                                    <td class=" last"><a href="/console/band-groups/edit/<?=$band->band_group_id?>">View</a></td>
                                </tr>
								<?php endforeach;?>
                            </tbody>
                        </table>
					<?php else:?>
					
						<h3>There are no band groups added yet, add some!</h3>
						<a href="/console/band-groups/add"><button class="btn btn-primary">Add Band groups</button></a>
					<?php endif;?>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<br />