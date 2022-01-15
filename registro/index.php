<?php 
include "config.php";
session_start();
error_reporting(0);

if(isset($_SESSION["username"])){
    header("Location: panel.php");
}


if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result= mysqli_query($conn, $sql);
    
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: panel.php");
    }else{
        echo "<script>alert('La contraseña o el email son incorrectos')</script>";
    }
    
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICAR SESION</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

	       <div id="wrapper" class="container">
  
                
                 <center>

        <h1>INICIO DE SESION</h1><hr>

		<form action="" method="POST" class="login-email">
		<fieldset>
                                
         	<div class="form-group">
            <div class="col-md-6">
            <label class="control-label" for="nome">EMAIL</label>
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="form-group">
			<div class="col-md-6">
            <label class="control-label" for="surname">CONTRASEÑA</label>
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit"  class="btn btn-primary btn-lg btn-block info">INICIAR SESION</button>
			</div>
			<p class="login-register-text">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>.</p>
		</form>
	</div>

	 </center>
              </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</html>