<?php include ROOT . '/views/layouts/header.php'; ?>

<body class="text-center">
<!-- 	<div class="container">
		<form class="form-signin">
		
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			
		</form>
	</div>
 -->
	<div class="signup-form"><!--sign up form-->
	<div class='validateErrors'>
	<?php if(isset($errors) && is_array($errors)): ?>
	<ul>
	<?php foreach ($errors as $error): ?>
		<li><?php  echo $error; ?> </li>
	<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	</div>
		<form class="signup-form" action="#" method="post">
			<h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
			<label for="inputName" class="sr-only">Имя</label>
			<input type="text" name="name" id="inputName"  class="form-control" placeholder="Имя" value="<?php echo $name; ?>" />
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"  value="<?php echo $email; ?>" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?php echo $password; ?>" required>
			<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Регистрация" />
		</form>
	</div><!--/sign up form-->

</body>
</html>
