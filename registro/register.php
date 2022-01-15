<?php

include "config.php";
error_reporting(0);
session_start();




if(isset($_SESSION["username"]))
{
    header("Location: panel.php");
}

if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password= md5($_POST["password"]);
    $cpassword= md5 ($_POST["cpassword"]);
    
    
    if($password==$cpassword){
        $sql="SELECT * FROM users WHERE email='$email'";
        $result= mysqli_query($conn, $sql);
        if(!$result->num_rows > 0){
            
            $sql="INSERT INTO users (username,email,password)
            VALUE ('$username', '$email', '$password')";
            $result=mysqli_query($conn,$sql);
            
            if($result){
                echo "<script>alert('Usuario registrado con éxito'); location.href = 'index.php'; </script>";
                $username="";
                $email="";
                $_POST["password"]="";
                $_POST["cpassword"]="";
                
            }else{
                echo "<script>alert('Hay un error')</script>";
            }
            
            
        }else{
            echo "<script>alert('El correo ya existe')</script>";
        }
    }else{
            echo "<script>alert('Las contraseñas no coinciden')</script>";        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div id="wrapper" class="container">
  
                
                 <center>

        <h1>REGISTRO</h1><hr>

		<form action="" method="POST" class="login-email">
 
            <div class="form-group">
            <div class="col-md-6">
            <label class="control-label" for="nome">USUARIO</label>
				<input type="text" placeholder="Usuario" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="form-group">
            <div class="col-md-6">
            <label class="control-label" for="nome">EMAIL</label>
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="form-group">
            <div class="col-md-6">
            <label class="control-label" for="nome">CONTRASEÑA</label>
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="form-group">
            <div class="col-md-6">
            <label class="control-label" for="nome">CONFIRMAR CONTRASEÑA</label>
				<input type="password" placeholder="Confirmar contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn btn-primary btn-lg btn-block info">REGISTRAR</button>
			</div>
			
		</form>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</html>