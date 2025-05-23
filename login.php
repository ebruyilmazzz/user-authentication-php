<?php
  
  require_once 'db.php';

  
  $email = $password = '';
  $email_err = $password_err = '';

 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

  
    if(empty($email)){
      $email_err = 'Please enter email';
    }

    
    if(empty($password)){
      $password_err = 'Please enter password';
    }

    
    if(empty($email_err) && empty($password_err)){
   
      $sql = 'SELECT name, email, password FROM users WHERE email = :email';

  
      if($stmt = $pdo->prepare($sql)){
 
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        
        if($stmt->execute()){
          
          if($stmt->rowCount() === 1){
            if($row = $stmt->fetch()){
              $hashed_password = $row['password'];
              if(password_verify($password, $hashed_password)){
        
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                header('location: index.php');
              } else {
                $password_err = 'The password you entered is not valid';
              }
            }
          } else {
            $email_err = 'No account found for that email';
          }
        } else {
          die('Something went wrong');
        }
      }
      unset($stmt);
    }

    unset($pdo);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <title>Hesabınıza Giriş Yapın</title>
</head>
<body class="bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Giriş Yapın</h2>
          <p>Formu doldurarak hesabınıza giriş yapabilirsiniz</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">   
            <div class="form-group">
              <label for="email">Email Adresi</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group">
              <label for="password">Parola</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="submit" value="Giriş Yap" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="register.php" class="btn btn-light btn-block">Hesabınız var mı? Giriş Yap</a>      
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>