<?
try{
  $con = new PDO("mysql:host=localhost;dbname=cooking","root","root");
}
catch(PDOException $e){
  echo"Error DataBase" . $e->getMessage();
}