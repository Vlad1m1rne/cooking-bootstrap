<?
if (isset($_POST['recipeId']) and isset($_POST['nameRecipe']) and isset($_POST['ingredient']) and isset($_POST['recipeDescription'])) {
if($_POST['nameRecipe']!="" and $_POST['ingredient']!="" and $_POST['recipeDescription']!=""){
    require "connect.php";

  $sql = "UPDATE recipe 
SET nameRecipe = :nameRecipe, ingredient = :ing, recipeDescription = :descr, link = :link
WHERE recipeId = :id";

  $stmt = $con->prepare($sql);

  $stmt->bindParam(":id", $_POST['recipeId']);
  $stmt->bindParam(":nameRecipe", $_POST['nameRecipe']);
  $stmt->bindParam(":ing", $_POST['ingredient']);
  $stmt->bindParam(":descr", $_POST['recipeDescription']);
  $stmt->bindParam(":link", $_POST['link']);

  $result = $stmt->execute();
  header("Refresh:2;url=index.php");
  echo "Рецепт обновлен";
}
else echo "Заполните все данные из формы";
 header("Refresh:2;url=index.php");
} else echo "Error update!!!";
