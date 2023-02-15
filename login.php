<?
 session_start();
if(isset($_POST['userName']) and isset($_POST['userPassword'])){
 
  $user = $_POST['userName'];
  $pass = $_POST['userPassword'];
  require "connect.php";
 $sql = "SELECT * FROM users WHERE userName = :userName AND userPassword = :pass";
$stmt = $con->prepare($sql);
$stmt->bindParam(':userName',$user);
$stmt->bindParam(":pass",$pass);
$stmt->execute();
if(!$stmt->rowCount()){

  header("Refresh:3;url=index.php");
      echo "Введите верные данные";
     
}
else{
   $_SESSION['user'] = 'user';
  header("Location:index.php");
}

}
else header("Location:index.php");




