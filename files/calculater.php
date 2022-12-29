<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>calculater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>calculater</h1>
    <hr>

            <form method="post">


                    <input type="text" name="num1" placeholder="number1">
                    <input type="text" name="num2" placeholder="number2">
                    <select name="operator">
                            <option value="None">None</option>
                            <option value="Add">Add</option>
                            <option value="Subtract">Subtract</option>
                            <option value="Multiply">Multiply</option>
                            <option value="Divide">Divide</option>
                    </select>
                    
                    <br>
                    <!-- <input type="submit" name="submit" value="calculate" class="btn btn-primary"> -->
                    <input type="submit" name="submit" value="calculate"></input>

            </form>
            <p>The answer is :</p>

            <?php
                if(isset($_POST['submit'])){
                    $result1=$_POST['num1'];
                    $result2=$_POST['num2'];
                    $operator=$_POST['operator'];
                    ?>
                
                    
                    <?php
                    switch($operator){
                            case "None":
                            echo"you need to select a method";
                            break;
                            case "Add":
                            echo $result1 + $result2;
                            break;
                            case "Subtract":
                            echo $result1 - $result2;
                            break;
                            case "Multiply":
                            echo $result1 * $result2;
                            break;
                            case "Divide":
                            echo $result1 / $result2;
                            break;
                            default:
                            echo"wrong";
                            break;
                    }
                
                }
            ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>