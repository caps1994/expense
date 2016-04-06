<?php
use Helpers\Form;
use Core\Error;
?>
<!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Bootstrap</strong> Login Form</h1>
                            <div class="description">
                            	<p>
	                            	This is a free responsive register form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Register to our site</h3>
                            		<p>Enter your details to register:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
								<?=Form::open([
												 'id' => 'register',
												 'name' => 'register',
												 'class' => 'register-form',
												 'role' => 'form'
												 ]);?>
										<div class="form-group">
											<label class="sr-only" for="form-username">Firstname</label>
											<?=Form::input([
												'type' => 'text',
												'name' => 'form-firstname',
												'placeholder' => 'First Name...',
												'class' => 'form-firstname form-control',
												'id' => 'form-firstname',
											]);?>
										</div>
                                        
										<div class="form-group">
											<label class="sr-only" for="form-surname">Surname</label>
											<?=Form::input([
												'type' => 'text',
												'name' => 'form-surname',
												'placeholder' => 'Surname...',
												'class' => 'form-surname form-control',
												'id' => 'form-surname',
											]);?>
										</div>                                        

										<div class="form-group">
											<label class="sr-only" for="form-email">Email</label>
											<?=Form::input([
												'type' => 'text',
												'name' => 'form-email',
												'placeholder' => 'Email...',
												'class' => 'form-email form-control',
												'id' => 'form-email',
											]);?>
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">Password</label>
											<?=Form::input([
												'type' => 'password',
												'name' => 'form-password',
												'placeholder' => 'Password...',
												'class' => 'form-password form-control',
												'id' => 'form-password',
											]);?>
										</div>
                                        <div class="form-group">
											<label class="sr-only" for="form-password">Confirm Password</label>
											<?=Form::input([
												'type' => 'password',
												'name' => 'form-password',
												'placeholder' => 'Confirm Password...',
												'class' => 'form-password form-control',
												'id' => 'form-password',
											]);?>
										</div>
										<?=Form::button([
														 'class'=> 'btn',
														 'name' => 'login_submit',
														 'value'=> 'Register!']);?>
			                    <?=Form::close();?>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>