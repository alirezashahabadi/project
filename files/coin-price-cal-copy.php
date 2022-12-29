<?php
function authentication_required()
{
    return true;
}

function get_title()
{
    return 'محاسبه حباب سکه';
}

function get_content()
{
    global $conn;
    global $current_user;
    $phone = $current_user['phone'];
    $status = $current_user['status'];
    $f_name = $current_user['first_name'];
    $l_name = $current_user['last_name'];
    $status_user = $current_user['status'];
    $last_activity = $current_user['last_activity'];
    // $_SESSION['step_invoice'] = 1;

?>
    <script>
        // alert(<?php echo $_SESSION['step_invoice']; ?>);
    </script>
    <style>

    </style>
    <div id="main-wrapper" class="show">
        <div class="content-body">
            <div class="container">
                <?php show_messages(); ?>
                <div class="row">
                <div class="col-md-12 mb-5">
                    <h1 class="fc-green f-w500">محاسبه حباب سکه و قیمت واقعی سکه</h1>
                </div>
                <?php
                    include('head-info.php');
                ?>
                <div class="col-md-12 d-flex">
                    <style>
                            .hr-btn {
                                margin: 20px auto;
                            }

                            .label-head-form-invoice {
                                color: #1bafa0;
                                font-weight: 900;
                                font-size: 22px;
                                margin-bottom: 25px;
                            }

                            .steps p {
                                font-size: 16px;
                                margin: unset;
                            }

                            .w-100px {
                                width: 100px;
                            }

                            .w-100px button {
                                width: 40px;
                                display: inline-block;
                            }

                            .w-100px button i {
                                font-size: 15px;
                                color: #fff;
                                margin: auto -7px;
                            }


                            .w-100px a i {
                                font-size: 15px;
                                color: #fff;
                                margin: auto -7px;
                            }

                            .none {
                                display: none;
                            }

                            .rounded-circle-receipt {
                                border-radius: 8px;
                                width: 70px;
                                height: 70px;
                                margin: auto;
                                display: block;
                            }
                    </style>
                    <div class="col-md-6 margin-r-cus">
 
                        <div class="card">
                            <div class="card-body row justify-content-center">
                            <form action="" class="row d-flex justify-content-center" method="post">
                            <div class="col-12 bg-style"> 
                                          
                            <div class="form-group">
                                    <label class="lable-style">نوع سکه</label>
                                    <select class="form-select" name="coins" aria-label="Default select example">
                                        <option selected value="1">سکه بهار آزادی</option>
                                        <option value="2">نیم سکه</option>
                                        <option value="3">ربع سکه</option>
                                        <option value="4">سکه امامی</option>
                                        <option value="5">سکه گرمی</option>
                                    </select>
                                </div>
                                
                                    <div class="form-group">
                                        <label class="lable-style mt-4">قیمت اونس</label>
                                        <input type="text" name="onsejahani-price" class="form-control" onkeyup="javascript:this.value=itpro(this.value);" placeholder="دلار">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="lable-style mt-4">قیمت دلار</label>
                                        <input type="text" name="dollar-price" class="form-control" onkeyup="javascript:this.value=itpro(this.value);" placeholder="تومان">
                                    </div>

                                    <div class="form-group">
                                        <label class="lable-style mt-4">قیمت فعلی سکه</label>
                                        <input type="text" name="tuman-price" class="form-control" onkeyup="javascript:this.value=itpro(this.value);" placeholder="تومان">
                                    </div>
                                <a id="cal" name="submit" class="btn btn-success btn-block mt-3 border-r-8">محاسبه</a>
                                
                            </div>
                            </form>

                                <?php
                                
                                       // محاسبه ارزش واقعی سکه

                                $tamam = 8.133;
                                $nim = 4.066;
                                $rob = 2.033;
                                $yek = 1.01;
                                $nimgerami = 0.5;
                                $haghezarb = 5000;
                                $taghsim = 31.1;


                                if (isset($_POST['submit'])) {
                                    $result1 = str_replace(',', '', $_POST['onsejahani-price']);
                                    $result2 = str_replace(',', '', $_POST['dollar-price']);
                                    $current_price = str_replace(',', '', $_POST['tuman-price']);
                                    $selectcoin =($_POST['coins']);


                                    switch ($selectcoin) {

                                        case "1":
                                            $res = ($tamam * 0.9 * $result1 * $result2) / ($taghsim) + $haghezarb;

                                            break;
                                        case "2":
                                            $res = ($nim * 0.9 * $result1 * $result2) / ($taghsim) + $haghezarb;
                                            break;
                                        case "3":
                                            $res = ($rob * 0.9 * $result1 * $result2) / ($taghsim) + $haghezarb;
                                            break;
                                        case "4":
                                            $res = ($yek * 0.9 * $result1 * $result2) / ($taghsim) + $haghezarb;
                                            break;
                                        case "5":
                                            $res = ($nimgerami * 0.9 * $result1 * $result2) / ($taghsim) + $haghezarb;
                                            break;
                                        default:
                                            echo "wrong";
                                            break;
                                    }

                                    //محاسبه حباب سکه

                                }

                                if (isset($_POST['submit'])) {
                                    $current_price = str_replace(',', '', $_POST['tuman-price']);
                                    $hobab = $current_price - $res;
                                    $hobabpercent=($hobab*100)/($current_price);
                                    $selectcoin1 = ($_POST['coins']);

                                    switch ($selectcoin1) {
                                        case "1":
                                            $hobab = $current_price - ($res);

                                            break;
                                        case "2":
                                            $hobab = $current_price - ($res);
                                            break;
                                        case "3":
                                            $hobab = $current_price - ($res);
                                            break;
                                        case "4":
                                            $hobab = $current_price - ($res);
                                            break;
                                        case "5":
                                            $hobab = $current_price - ($res);
                                            break;
                                        default:
                                            echo "wrong";
                                            break;
                                    }
                                }
                            session_start()
                                ?>
                                    

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 margin-l-cus">
                        <div class="card p-4">
                        <label class="lable-style">قیمت سکه (تومان)</label>
                            <div class="row col-12 m-auto mb-3 d-flex justify-content-center bg-yellow">
                                <div class="col text-center">سکه بهار آزادی</div>
                                <div class="col text-center">تومان16,150,000</div>
                            </div>
                            <div class="row col-12 m-auto mb-3 d-flex justify-content-center bg-yellow">
                                <div class="col text-center">نیم سکه</div>
                                <div class="col text-center">تومان8,850,000</div>
                            </div>
                            <div class="row col-12 m-auto mb-3 d-flex justify-content-center bg-yellow">
                                <div class="col text-center">ربع سکه</div>
                                <div class="col text-center">5,150,000</div>
                            </div>
                            <div class="row col-12 m-auto mb-3 d-flex justify-content-center bg-yellow">
                                <div class="col text-center">سکه گرمی</div>
                                <div class="col text-center">3,500,000</div>
                            </div>
                            <div class="row col-12 m-auto mb-3 d-flex justify-content-center bg-yellow">
                                <div class="col text-center">سکه امامی</div>
                                <div class="col text-center">تومان14,750,000</div>
                            </div>
                            <label class="lable-style mt-4">قیمت دلار (تومان)</label>
                            <div class="row col-12 m-auto d-flex justify-content-center bg-yellow">
                                <div class="col text-center">دلار</div>
                                <div class="col text-center">تومان35,100</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                            <div class="card-body row">
                                <div class="col">
                                    <div class="bg-cal-res">

                                        <span>ارزش واقعی سکه : <?php echo number_format($res)?>&nbsp;&nbsp;<span>تومان</span></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-cal-res">
                                        <span>میزان حباب سکه :<?php echo number_format($hobab)?>&nbsp;&nbsp;<span>تومان</span></span>
                                    </div>
                                     <!-- echo number_format($hobab)  -->
                                </div>
                                <div class="col">
                                    <div class="bg-cal-res bg-cal-res2">
                                        
                                         <!-- حباب مثبت یا منفی -->
                                        <?php

                                        $hobabpercent=($hobab*100)/($current_price);
                                        //echo$hobabpercent;
                                        
                                        $x = round($hobabpercent,2);
                                    if($hobab > 0){
                                        echo"<span class='pos-state' name='manfi'> حباب مثبت   (% $x) </span>";
                                    }
                                    elseif(!$hobab){
                                        echo"_";
                                    }
                                    else{
                                        
                                        echo"<span class='neg-state' name='mosbat'> حباب منفی  (% $x)</span>";
                                    }
                                    
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
    </div>
    </div>


    <script>
        $('#cal').on('click', function(event) {
            var res = document.getElementById("cal-result");
            if(res.style.display == "none"){
                res.style.display == "block";
            }else{
                res.style.display == "none";
            }
        });
        function showCalResult(){
            var res = document.getElementById("cal-result");
            if(res.style.display == "none"){
                res.style.display == "block";
            }else{
                res.style.display == "none";
            }
        }
    </script>

    <!-- کد عدداعشاری -->
    
        <script>
        function itpro(Number) 
  {
       Number+= '';
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z= x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
         while (rgx.test(y))
          y= y.replace(rgx, '$1' + ',' + '$2');
          return y+ z;
  }

    </script>
    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/basic-table/jquery.basictable.min.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/plugins/basic-table-init.js"></script>


    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/plugins/perfect-scrollbar-init.js"></script>

    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/apexchart/apexcharts.min.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/dashboard.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/plugins/apex-price.js"></script>

    <script src="<?php echo SITE_URL_ASSETS; ?>vendor/slick/slick.min.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/plugins/slick-init.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/scripts.js"></script>
    <script src="<?php echo SITE_URL_ASSETS; ?>js/plugins/rowfy.js"></script>
    <style>
        svg {
            font-family: 'IRANYekan' !important;
        }

        svg g {
            font-family: 'IRANYekan' !important;
        }

        svg g tspan {
            font-family: 'IRANYekan' !important;
        }

        .apexcharts-tooltip div {
            font-family: 'IRANYekan' !important;
        }

        .apexcharts-xaxistooltip div {
            font-family: 'IRANYekan' !important;
        }

        .apexcharts-tooltip-marker {
            margin-left: 10px !important;
        }
    </style>
    <script>
        var options = {
            chart: {
                height: 280,
                type: "area",
                // foreColor: "#1bafa0",
                toolbar: {
                    autoSelected: "pan",
                    show: false
                }
            },
            colors: ["#1bafa0"],
            stroke: {
                width: 2
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: "فروش",
                data: [40, 33, 45, 20, 79, 70, 99]
            }],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                },

            },
            xaxis: {
                categories: [
                    '' + "شنبه",
                    ' 1 ' + "شنبه",
                    ' 2 ' + "شنبه",
                    ' 3 ' + "شنبه",
                    ' 4 ' + "شنبه",
                    ' 5 ' + "شنبه",
                    '' + "جمعه"
                ]
            },

        };

        var chart = new ApexCharts(document.querySelector("#chartx"), options);

        chart.render();
    </script>
<?php
}


function process_inputs()
{
    if (isset($_POST['step_0'])) {
        global $conn;
        global $current_user;
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $code_meli = $_POST['code_meli'];
        $phone = $_POST['phone'];
        $date = time();
        $phone_operator = $current_user['phone'];


        if ($phone != null) {
            $get_customer = mysqli_query($conn, "SELECT * FROM `account_party` WHERE `phone`='$phone';");
            $echo_get_customer = mysqli_fetch_array($get_customer);

            if ($echo_get_customer['id'] == null) {
                $get_customer = mysqli_query($conn, "INSERT INTO `account_party` (`id`, `f_name`, `l_name`, `phone`) VALUES (NULL, '$f_name', '$l_name', '$phone');");
                $massage_customer = ' اطلاعات مشتری ثبت شد. ';
            } else {
                $massage_customer = ' اطلاعات مشتری قبلا ثبت شده است';
            }
            // var_dump($echo_get_customer['id']);
        }


        $read_messages = mysqli_query($conn, "INSERT INTO `invoice_melted` (`id`, `account_party`, `total`, `weight`, `operator`, `insert_date`, `last_update`, `status`) VALUES (NULL, '$phone', '0', '0', '$phone_operator', '$date', '$date', '1');");

        $get_end_id = mysqli_query($conn, "SELECT * FROM `invoice_melted` ORDER BY `invoice_melted`.`id` DESC");
        $echo_get_end_id = mysqli_fetch_array($get_end_id);

        $_SESSION['invoice_id'] = $echo_get_end_id['id'];
        $_SESSION['step_invoice'] = 2;

        add_message($massage_customer, '9');
    }

    if (isset($_POST['step_1'])) {
        global $conn;
        global $current_user;
        $invoice_id = $_POST['invoice_id'];
        $date = time();
        if ($invoice_id != null) {
            $get_customer = mysqli_query($conn, "UPDATE `invoice_melted` SET `status` = '2' ,  `last_update` = '$date' WHERE `invoice_melted`.`id` = $invoice_id;");
            $_SESSION['step_invoice'] = 3;
        }

        add_message('مقدایر آبشده وارد شد.', '9');
    }

    if (isset($_POST['step_2'])) {
        global $conn;
        global $current_user;
        $invoice_id = $_POST['invoice_id'];
        $date = time();
        if ($invoice_id != null) {
            $get_customer = mysqli_query($conn, "UPDATE `invoice_melted` SET `status` = '3' ,  `last_update` = '$date' WHERE `invoice_melted`.`id` = $invoice_id;");
            $_SESSION['step_invoice'] = 4;
        }

        add_message('مقدایر آبشده وارد شد.', '9');
    }

    if (isset($_POST['step_3'])) {
        global $conn;
        global $current_user;
        $invoice_id = $_POST['invoice_id'];
        // $invoice_id = $_SESSION['step_invoice'];
        $date = time();
        if ($invoice_id != null) {
            $query_03 = "UPDATE `invoice_melted` SET `status` = '4' ,  `last_update` = '$date' WHERE `invoice_melted`.`id` = $invoice_id;";
            var_dump($query_03);
            $get_customer = mysqli_query($conn, $query_03);
            $_SESSION['step_invoice'] = 0;
            $_SESSION['invoice_id'] = 0;
        }

        add_message('فاکتور با موفقیت ثبت شد.', '9');
    }

    if (isset($_POST['add_new'])) {
        global $conn;
        global $current_user;
        $price = $_POST['price'];
        $quote = $_POST['quote'];
        $weight = $_POST['weight'];
        $invoice_id = $_SESSION['invoice_id'];
        $date = time();
        $oprator = $current_user['phone'];


        $get_customer = mysqli_query($conn, "INSERT INTO `melted_meta` (`id`,`invoice_id`, `price`, `quote`, `weight`, `oprator`, `date`, `last_update`) VALUES (NULL, '$invoice_id','$price', '$quote', '$weight', '$oprator', '$date', '$date');");
        $massage_customer = 'اطلاعات آبشده اضافه شد.';

        add_message($massage_customer, '9');
    }

    if (isset($_POST['add_pay'])) {
        global $conn;
        global $current_user;
        $shaba = $_POST['shaba'];
        $value = $_POST['value'];
        $name = $_POST['name'];
        $account_party = $_POST['phone'];
        // $receipt = $_POST['receipt'];
        $invoice_id = $_SESSION['invoice_id'];
        $date = time();
        $oprator = $current_user['phone'];
        $files = $_FILES['receipt'];



        $rand_id = rand(100000000, 999999999);
        $time_upload = time();
        $result = check_file($files['name'], $files['size']);
        if ($result == 0) {
        } else {
            $size_file = $files['size'];
            $name_file = 'receipt_melted_pay|' . $rand_id . $files['name'];
            $type_file = $files['type'];
            $random_filename =  './modules/upload_files/' . $name_file;
            $result = move_uploaded_file($files['tmp_name'], $random_filename);

            $update_users = mysqli_query($conn, "INSERT INTO `files` (`id`, `user`, `type`, `type_file`, `size_file`, `name_file`, `uploaded`) VALUES (null, '$phone', 'receipt_pay_melted', '$type_file', '$size_file', '$name_file', '$time_upload');");


            $get_customer = mysqli_query($conn, "INSERT INTO `invoice_melted_pay` (`id`, `invoice_id`, `account_party`, `shaba`, `value`, `name`, `receipt`, `date`, `update`) VALUES (NULL, '$invoice_id', '$account_party', '$shaba', '$value', '$name', '$name_file', '$date', '$date');");
            $massage_customer = 'اطلاعات آبشده اضافه شد.';

            add_message($massage_customer, '9');
        }
    }




    if (isset($_POST['read'])) {
        global $conn;
        global $current_user;
        $phone_current_user = $current_user['phone'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];

        if ($phone_current_user == $phone) {
            $read_messages = mysqli_query($conn, "UPDATE `messages` SET `status` = 'view' WHERE `messages`.`id` = '$id';");
            if ($read_messages == null) {
                add_message('امکان تغییر وضعیت پیغام نیست', '6');
            } else {
                add_message('وضعیت پیغام به خوانده شده تغییر کرد.', '9');
            }
        } else {
            add_message('این یک پیغام همگانی هست امکان حذف آن وجود ندارد.', '6');
        }
    }

    if (isset($_POST['del'])) {
        global $conn;
        $id = $_POST['id'];
        $query_02 = "DELETE FROM `melted_meta` WHERE `melted_meta`.`id` = $id;";
        $read_messages = mysqli_query($conn, $query_02);
        if ($read_messages == null) {
            add_message('امکان حذف نیست.', '6');
        } else {
            add_message('حذف شد.', '9');
        }
    }

    if (isset($_POST['del_pay'])) {
        global $conn;
        $id = $_POST['id'];
        $query_02 = "DELETE FROM `invoice_melted_pay` WHERE `invoice_melted_pay`.`id` = $id;";
        $read_messages = mysqli_query($conn, $query_02);
        if ($read_messages == null) {
            add_message('امکان حذف نیست.', '6');
        } else {
            add_message('حذف شد.', '9');
        }
    }
}
