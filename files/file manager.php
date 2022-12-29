<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<style>
    .main{

        margin-left: 15px;
        float:left;


    }
    .main1{

        margin-left: 15px;
        float:left;


    }

    .iconfolder{
        background-image: url("public_html/img/icons8-folder-100.png");
        width:100px;
        height:100px;

    }
    .foldertitle{
        text-align:center;
        display: inline-block;
    }
    .iconfile{
        background-image: url("public_html/img/file.png");
        width:100px;
        height:100px;

    }
    .filetitle{
        text-align: right;

    }

    .iconback{
        background-image: url("public_html/img/icons8-left-arrow-96.png");
        width:100px;
        height:100px;

    }
    .iconcreatefolder{
        background-image: url("public_html/img/icons8-add-folder-96.png");
        width:100px;
        height:100px;
    }
</style>
<?php
if (isset($_GET['dir']) && !empty($_GET['dir'])){
    $filename = $_GET['dir'].'/';
}else{
    $filename="public_html/";
}



?>
<script >
    function createfolder(){
        var foldername = prompt("نام فولدر را وارد کنید","")
        if (foldername == null){
            return false;
        }
        else if (foldername == ''){
            alert("پر کردن نام الزامیست")
        }
        else {
            window.location ="createfolder.php?dir=<?php echo $filename?>&newfolder="+foldername

        }
    }
</script>
<?php

if ($filename != "public_html/"){
echo "<a href='?dir=".dirname($filename)."'>";
echo"<div class='main'>";
echo"<div class='iconback'> </div>";
echo"<div class='foldertitle'>back</div>";

echo"</div>";
echo "</a>";
}
$fileedit=glob("$filename*");
foreach($fileedit as $newfile){
    if(is_dir($newfile)){
        echo "<a href='?dir=$newfile'>";
        echo"<div class='main'>";
        echo"<div class='iconfolder'> </div>";
        echo"<div class='foldertitle'>".str_replace("$filename"," ","$newfile")."</div>";

        echo"</div>";
        echo "</a>";
    }
    else{
        echo"<div class='main1'>";
        echo"<div class='iconfile'> </div>";
        echo"<div class='filetitle'>".str_replace("$filename"," ","$newfile")."</div>";

        echo"</div>";

    }

}


//create folder
echo "<a onclick='createfolder()'>";
echo"<div class='main'>";
echo"<div class='iconcreatefolder'> </div>";
echo"<div class='foldertitle'>create folder</div>";

echo"</div>";
echo "</a>";





?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
