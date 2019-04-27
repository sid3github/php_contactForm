<?php
// To check for submit
if(filter_has_var(INPUT_POST,'submit')){
 // Get the form data
 $name = htmlspecialchars($_POST['name']);
 $email = htmlspecialchars($_POST['email']);

 //Check required fields
 if(!empty($name) && (!empty($email))){
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $msg = 'Please use a valid email';
  }
  else 
  {
    //Recipient email
    $toEmail = 'siddharthpadwal3@gmail.com';
    $subject = 'Contact Request From' .$name;
    $body = '<h2>Contact Request</h2>
    <h3>Name</h3> <p>'.$name.'</p>
    <h3>Email Address</h3> <p>'.$email.'</p>
    ';
    //Email headers
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
    $headers .= "From: ".$name."<".$email.">"."\r\n";
    
    if(mail($toEmail,$subject,$headers,$body)){
      $output = 'Your email has been sent!';
    }else{
      $msg = 'Your email was not sent!';
    }
  }
 }
 else{
    $msg = 'Please fill all fields';
 }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Contact Form</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control"
                    value="<?php echo isset($_POST['name']) ? $name : ""; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control"
                    value="<?php echo isset($_POST['email']) ? $email : ""; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form><br>
        <div class="alert-success"><?php echo $output; ?></div>
        <div class="alert-danger"><?php echo $msg; ?></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>