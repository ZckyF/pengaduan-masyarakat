<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
    <link rel="stylesheet" href="/cssnya/admin/login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
			</div>

			<div class="login">
				<form action="/login" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Login</label>
                    @if (session()->has('errorLogin'))
                        <p style="text-align: center; color: red">Gagal login !</p>
                    @endif
					<input required type="Username" name="username" placeholder="Username" required="">
					<input required type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>