<?
if (isset($_POST['recipeId'])) {
  if ($_POST['recipeId'] != "") {
    $id = $_POST['recipeId'];
    require 'connect.php';
    $sql = "DELETE from recipe WHERE recipeId = $id";
    $res = $con->exec($sql);
    if ($res == 1) {
      header("Refresh:2;url=index.php");
      echo "Рецепт удален";
    } else {
      header("Refresh:2;url=index.php");
      echo "Введите действующий id рецепта!";
    }
  } else {
    header("Refresh:2;url=index.php");
    echo "Введите действующий id рецепта!";
  }
}
