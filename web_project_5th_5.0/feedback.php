<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$mail=$_POST['mailid'];
$country=$_POST['country'];
$message=$_POST['message'];

if(!empty($fname)||!empty($lname) || !empty($mail) || !empty($country) || !empty($message))
{
    $host = "localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="feedback";

    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error())
    {
        die('Connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else
    {
       /* unique email
        $SELECT="SELECT email from feedback_table where email=? LImit 1";*/
        $INSERT="INSERT into feedback_table table(fname,lname,mail,country,message) values(?,?,?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->execute();
        echo "new record";
        $stmt->close();
        $conn->close();
    }
}
else{
    echo "No fields can be empty!";
    die();
}


?>
  
  </body>
</html