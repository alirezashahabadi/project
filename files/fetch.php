

<?php
    // $result=$conn->prepare("SELECT * FROM `test`");
    // $result->execute();
    // $users=$result->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>  
</head>
  <body>
    
    <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">action</th>
        <th scope="col">user</th>
        <th scope="col">password</th>
       
      </tr>
    </thead> 
    <tbody>
      
    <tr id="list-users">
        <th scope="row">1</th>
          <td><button class="btn btn-primary">ارسال</button>
          <button class="btn btn-danger"> حذف</button>
        </td>
        <td>2242</td>
        <td>2242</td>
       
      </tr>      <tr id="list-users">
        <th scope="row">1</th>
          <td><button class="btn btn-primary">ارسال</button>
          <button class="btn btn-danger"> حذف</button>
        </td>
        <td>2242</td>
        <td>2242</td>
       
      </tr>   

    </tbody>
  </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>