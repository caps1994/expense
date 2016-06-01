<!-- page content -->
			<div class="right_col" role="main">

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="dashboard_graph">

							<div class="row x_title">
								<div class="col-md-12">
									<h3>Departments</h3>
								</div>

							</div>

                <div class="col-md-12 col-sm-12 col-xs-12">
					<?php if ($departments != NULL):?>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">ID </th>
                                    <th class="column-title">Department Name </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i = 0;
								foreach($departments as $department):
									$i++
								?>
                                <tr class="<?php echo ($i % 2 == 0 ? "even" : "odd");?>  pointer">
                                    <td class=" "><?=$department->department_id?></td>
									<td class=" "><?=$department->department_name?></td>
                                </tr>
								<?php endforeach;?>
                            </tbody>
                        </table>
					<?php else:?>
					
						<h3>There are no band groups added yet, add some!</h3>
						<a href="/console/department/add"><button class="btn btn-primary">Add Department</button></a>
					<?php endif;?>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<br />