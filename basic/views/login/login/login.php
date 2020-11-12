<?php

?>


<div style="width: 100%; text-align: center;">
	<div id="background__"></div>

	<div id="conteiner-1">
		<!-- Card -->
		<div id="conteiner-2">
			<div style="width: 100%; text-align: left; padding: 16px 16px 0px; font-family:  Roboto, Arial, sans-serif;">
				<span style="font-size: 24px; color: rgba(0, 0, 0, 0.87); display: block; line-height: 36px;">
					Вход
				</span>
				<span style="font-size: 14px; color: rgba(0, 0, 0, 0.54); display: block;">
					Панель пользователя
				</span>


				<form style="text-align: left; padding: 16px 0px 0px 0px; color: rgba(0, 0, 0, 0.54);" id="login__FORM">
					  <div class="form-group">
						    <label for="login__INPUT">Login</label>
						    <input name="login__INPUT" type="text" class="form-control" id="login__INPUT" placeholder="Enter your login" required>
						    <div class="invalid-feedback"></div>
					  </div>

					  <div class="form-group">
					        <label for="password__INPUT">Password</label>
					        <input name="password__INPUT" type="text" class="form-control" id="password__INPUT" placeholder="Enter your password" autocomplete="off"  required>
					        <div class="invalid-feedback"></div>
					  </div>

					  <div class="form-group">
					  		<button id="submit__BUT" type="button" class="btn btn-primary">
					  			Sing In
					  		</button>
					  </div>
				</form>

			</div>
		</div>
	</div>
</div>



