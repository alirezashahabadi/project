<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHECK-AJAX-UPLOAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
            <?php
                    if(isset($_FILES['file'])){

                        $filename="images/".$_FILES['file']['name'];
                        $filetmp=$_FILES['file']['tmp_name'];

                        if(is_uploaded_file($filetmp)){
                            if(move_uploaded_file($filetmp,$filename)){
                                echo"<b><font color=green>اطلاعات با موفقیت آپلود شد</font></b>";
                               
                            }
                            else{
                                echo"<font color=red>خطا در آپلود فایل</font>";        
                            }
                        }


                    }
                    else{
                      echo"<font color=red> فایلی انتخاب نشده است</font>";        
                  }
                    
            
            
            
            
            ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>