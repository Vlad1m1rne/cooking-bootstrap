<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>Cooking</title>
</head>

<body>
  <header>
    <div class="container ">
      <h1 class="text-center text-white">Приятного аппетита!</h1>
      <div class="row row-header">
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="all" class="btn btn-outline-success btn-lg">Все рецепты</button></form></div>
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="first" class="btn btn-outline-success btn-lg">Первые блюда</button></form></div>
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="second" class="btn btn-outline-success btn-lg">Вторые блюда</button></form></div>
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="salat" class="btn btn-outline-success btn-lg">Салаты</button></form></div>
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="cake" class="btn btn-outline-success btn-lg">Выпечка</button></form></div>
        <div class="col text-center"><form method="POST"><button type="submit" name="show"  value="other" class="btn btn-outline-success btn-lg">Другое</button></form></div>
      </div>
    </div>
  </header>


  <main>

    <div class="container text-center">
      <h3><?
          if (!(isset($_POST['show']))) echo "Выберите категорию";
          if ($_POST['show'] == 'all') echo "Все рецепты";
          if ($_POST['show'] == 'first') echo "Первые блюда";
          if ($_POST['show'] == 'second') echo "Вторые блюда";
          if ($_POST['show'] == 'salat') echo "Салаты";
          if ($_POST['show'] == 'cake') echo "Выпечка";
          if ($_POST['show'] == 'other') echo "Другое";
          ?></h3>
    </div>



    <div class="container text-center img">
      <img class="mainImg img-fluid" src=<?
                                          if (!(isset($_POST['show']))) echo "\img\all.jpg";
                                          if ($_POST['show'] == 'all') echo "\img\all.jpg";
                                          if ($_POST['show'] == 'first') echo "./img/first.jpg";
                                          if ($_POST['show'] == 'second') echo "./img/second.jpg";
                                          if ($_POST['show'] == 'salat') echo "./img/salat.jpg";
                                          if ($_POST['show'] == 'cake') echo "./img/cake.jpg";
                                          if ($_POST['show'] == 'other') echo "./img/other.jpg";
                                          ?>>
    </div>
    <div class="container text-center">
      <button id="btn1" type="button" class="btn btn-danger">Добавить рецепт</button>
    </div>

    <div class="container text-center">

    <div class="updF" style="display: none">
        <h4>Изменить рецепт</h4>
        <form action="update.php" method="POST">
        <div class="mb-3" >
          <input hidden class="inpUpd form-control" type="number" name="recipeId">
          <label for="in1" class="form-label">ID</label>
          <input id="in1" disabled class="inpUpd form-control" type="number" name="recipeId">
          <label for="in2" class="form-label">Название рецепта</label>
          <input id="in2" type="text" class="form-control" name="nameRecipe">
          <label for="ar1" class="form-label">Ингредиенты</label>
          <textarea id="ar1" rows="2" class="form-control" name="ingredient"></textarea>
          <label for="ar2" class="form-label">Описание</label>
          <textarea id="ar2" rows="3" class="form-control" name="recipeDescription"></textarea>

          <label for="ur" class="form-label">Ссылка на рецепт</label>
          <input id="ur" type="url" class="form-control" name="link">
        </div>
          <input class="btn btn-success" type="submit" value="Отредактировать">
          <input class="btn btn-secondary" type="reset" id="btn4" value="Отмена редактирования">
        </form>

      </div>
    </div>


    <div class="container text-center">
    <div class="add_form" style="display: none">
        <h4>Добавить рецепт</h4>
        <form action="add.php" method="POST">
        <div class="mb-3" >
     <label for="sel" class="form-label">Категория</label>
          <select id="sel" class="form-select form-select-sm" name="categoryId">
            <option selected value="1">Первые блюда</option>
            <option value="2">Вторые блюда</option>
            <option value="3">Салаты</option>
            <option value="4">Выпечка</option>
            <option value="5">Другое</option>
          </select>
          <label for="inp1" class="form-label">Название рецепта</label>
          <input id="inp1" class="form-control" type="text" size="48" name="nameRecipe">
         <label for="area1" class="form-label">Ингридиенты</label>
          <textarea id="area1" class="form-control" rows="3"  name="ingredient"></textarea>
          <label for="area2" class="form-label">Описание</label>
          <textarea id="area2" class="form-control" rows="5" name="recipeDescription"></textarea>
          <label for="inp2" class="form-label">Ссылка на рецепт</label>
          <input id="inp2" class="form-control" type="url" size="48" name="link">
          </div>
          <input class="btn btn-success" type="submit" value="Сохранить рецепт">
          <input class="btn btn-secondary" id="btn2" type="reset" value="Отмена">
        </form>

      </div>
    </div>


    <div class="container">
      <table class="mainT">
        <tr>
          <th>Id</th>
          <th>Категория</th>
          <th>Название</th>
          <th>Ингредиенты</th>
          <th>Рецепт</th>
          <th>Ссылка</th>
          <th>Дата добавления</th>
          <th>Редактировать</th>
        </tr>

        <?php
        if (isset($_POST['show'])) {
          if ($_POST['show'] == 'all') {
            $sql = "SELECT  recipeId,nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) ORDER BY categoryId";
          }
          if ($_POST['show'] == 'first') {
            $sql = "SELECT  recipeId,nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 1 ORDER BY categoryId";
          }
          if ($_POST['show'] == 'second') {
            $sql = "SELECT  recipeId,nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 2 ORDER BY categoryId";
          }
          if ($_POST['show'] == 'salat') {
            $sql = "SELECT  recipeId,nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 3 ORDER BY categoryId";
          }
          if ($_POST['show'] == 'cake') {
            $sql = "SELECT  recipeId,nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 4 ORDER BY categoryId";
          }
          if ($_POST['show'] == 'other') {
            $sql = "SELECT recipeId, nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 5 ORDER BY categoryId";
          }

          require "connect.php";
          $result =  $con->query($sql);
          while ($row = $result->fetch()) {
            echo "<tr> ";
            echo "<td> " . $row['recipeId'] . "</td>";
            echo "<td>" . $row['nameCategory'] . "</td>";
            echo "<td>" . $row['nameRecipe'] . "</td>";
            echo "<td>" . $row['ingredient'] . "</td>";
            echo "<td>" . $row['recipeDescription'] . "</td>";
            if ($row['link']) echo "<td><a href=" . $row['link'] . ">Ссылка</a></td>";
            else echo "<td>" . $row['link'] . "</td>";
            echo "<td>" . $row['dat'] . "</td>";
            echo "<td><button class='upd btn btn-primary' value='" .  $row["recipeId"] . "'>Изменить</button></td>";
            echo "</tr>";
          }
        }
        ?>
      </table>

    </div>


  </main>



  <footer>
    <div class="container text-center">
      <img class='dn' src="img/night.png" alt="Day/Night">
    </div>
  </footer>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/main.js"></script>
</body>

</html>