<?php include '../lib/db.php' ?>

<?php

// send//
if (isset($_GET['deleteid'])) {
?>
    <script>
        alert('انجام شد');
        window.location = "https://app.irantala.org/new/postmanager.php?delete=15";
    </script>
<?php
}


if (isset($_POST['sendbtn'])) {

    $postsql = "INSERT INTO `test` (`id`, `name`, `value`, `status`) VALUES ('', '" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['content'] . "');";

    // $get_settings = mysqli_query($conn, "SELECT * FROM `settings` WHERE `key`='$key';");
    $conn = mysqli_connect('localhost', 'irantala_app_01', 'uafTb-4z-]M{', 'irantala_app_01');
    $postquery = $conn->query($postsql);
    if ($postquery) {

        header("location:send.php?ok=10");
        exit();
    } else {

        header("location:send.php?notok=11");
        exit();
    }
}


// delete//

if (isset($_GET['deleteid'])) {

    $deleteid = $_GET['deleteid'];
    $deletesql = "DELETE FROM `test` WHERE `test`.`id` =$deleteid;";
    $conn = mysqli_connect('localhost', 'irantala_app_01', 'uafTb-4z-]M{', 'irantala_app_01');
    $deletequery = $conn->query($deletesql);
    if ($deletequery) {
        header("Location: http://www.example.com/");
        // header("location:https://app.irantala.org/new/postmanager.php?delete=15");
        exit();
    } else {
        header("location:https://app.irantala.org/new/postmanager.php?nodelete=16");
        exit();
    }
}


// update//
if (isset($_POST['new-update'])) {

    $myupdate = ($_POST['new-update']);
    $updatesql = "UPDATE `test` SET `id` = '', `name` = '" . $_POST['username'] . "', `value` = '" . $_POST['password'] . "', `status` = '" . $_POST['content'] . "' WHERE `test`.`id` = $myupdate;";
    $conn = mysqli_connect('localhost', 'irantala_app_01', 'uafTb-4z-]M{', 'irantala_app_01');
    $updatequery = $conn->query($updatesql);
    if ($updatequery) {
        header("location:edit.php?true=100");
        exit();
    } else {
        header("location:edit.php?false=101");
        exit();
    }
}

//upload file//

        if(isset($_POST['send-upload'])){

            if(true){

                $filename="img/".$_FILES['myfile']['name'];
                $filetype=$_FILES['myfile']['type'];
                $filesize=$_FILES['myfile']['size'];
                $filetmpname=$_FILES['myfile']['tmp_name'];
            }
            if(is_uploaded_file($filetmpname)){
                if(move_uploaded_file($filetmpname,$filename)){
                    echo"فایل با موفقیت آپلود شد";
                }
            }
        }

  





?>