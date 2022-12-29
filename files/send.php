
<?php include'../lib/db.php'?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body >

  <div class="container py-5 ">

  <?php
        if(isset($_GET['ok'])){
            echo"اطلاعات با موفقیت ارسال شد";
        }

        if(isset($_GET['notok'])){
            echo"خطا";
        }
  ?>
        <div class="row">
            <p class="text-center display-4 fw-bold">send</p>
            <div class="col-12 border border-4">

            <form action="check.php" method="post">

            <label for="">username</label>
            <input type="text" name="username"  class="form-control">

            <label for="">password</label>
            <input type="password" name="password" class="form-control" >

            <textarea name="content" id="" cols="30" rows="10" class="form-control" ></textarea>

            <input type="submit" class="btn btn-primary" name="sendbtn" value="send">

            </form>

            </div>
        </div>

  </div>

        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>