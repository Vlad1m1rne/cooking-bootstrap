<?
if (isset($_POST['categoryId']) and isset($_POST['nameRecipe']) and isset($_POST['ingredient']) and isset($_POST['recipeDescription'])) {
 if($_POST['nameRecipe']=="" or $_POST['ingredient']=="" or $_POST['recipeDescription']==""){
  header("Refresh:3;url=index.php");
  echo "Заполните все поля формы";
  die();
 }
  require 'connect.php';
  $sql = "INSERT INTO recipe (categoryId,nameRecipe,ingredient,recipeDescription,link,dat)values(:categoryId,:nameRecipe,:ingredient,:recipeDescription,:link,CURDATE())";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(":categoryId", $_POST['categoryId']);
  $stmt->bindParam(":nameRecipe", $_POST['nameRecipe']);
  $stmt->bindParam(":ingredient", $_POST['ingredient']);
  $stmt->bindParam(":recipeDescription", $_POST['recipeDescription']);
  $stmt->bindParam(":link", $_POST['link']);
  $r = $stmt->execute();
  if ($r > 0) {
    echo "рецепт добавлен, $r строк";
  } else echo "ошибка добавления<br>";
}
header("Location: index.php");
