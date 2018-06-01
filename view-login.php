		<div class="card m-4">
			<!-- <img class="card-img-top" data-src="holder.js/100%x180/" alt="Card image cap"> -->
			<div class="card-block p-4">
				<h4 class="card-title">Log In</h4>
				<form action="action-login.php" method="post">
					<?php if (isset($_SESSION['noti'])) {
						echo $_SESSION['noti'];
						session_unset($_SESSION['noti']);
					} ?>
					<input class="form-control mb-1" type="text" name="email" placeholder="Your work email" required autofocus>
					<input class="form-control mb-1" type="password" name="password" placeholder="Your password" required>
					<div class="my-4">
						<button class="btn btn-primary" type="submit">Login</button>
						<button class="btn btn-danger" type="reset">Reset</button>
					</div>
				</form>
				<div class="my-4">
					<a href="?p=forgot-password">Forgot password</a>
				</div>
			</div>
		</div>