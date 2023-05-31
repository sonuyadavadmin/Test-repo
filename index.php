<?php
//$curl = curl_init();
//curl_setopt_array($curl, array(
//    CURLOPT_URL => 'https://f004.backblazeb2.com/file/LDV2-Notices/58838/ret/58838_ACSAC_BRC0502_223108.0492511821',
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//    CURLOPT_CUSTOMREQUEST => 'GET',
//));
//
//$response = curl_exec($curl);
//curl_close($curl);
//$result = json_decode($response);
//
//$filedata = str_getcsv($response, "\n");
//$filedataLength = count($filedata);
//for ($i = 0; $i < $filedataLength; $i++) {
//    $fileDataArr[] = str_getcsv($filedata[$i], ",");
//}
//
//    
//if (!empty($fileDataArr)) {
////    header('Content-Type: text/csv; charset=utf-8');
////    header('Content-Disposition: attachment; filename=form_data.csv');
//    $output = fopen('php://output', 'w');
//    foreach ($fileDataArr as $file_data) {
//        $arr = array();
//        foreach ($file_data as $key => $value) {
//            $arr[] = $value;
//        }
//        fputcsv(
//                $output,
//                $arr
//        );
//    }
//    fclose($output);
//}
//
//
//
//echo "<pre>";
//print_r($arr);
//print_r($filedata);
//print_r($fileDataArr);
//exit;
?>

<?php
$date = '2023-03-20T00:00:00';
//echo date('Y-m-d', strtotime($date));
//echo date('Y-m-d', strtotime("+1 year $date"));
//exit;
//ini_set('session.gc_maxlifetime', 60);
session_start();

$policyno = '12345687901';
if (strpos($policyno, '-') !== false) {
    $policynoArr = explode("-", $policyno);
    $policy_number = $policynoArr[0];
} else {
    $policy_number = $policyno;
}
echo $policyno . " ========== " . $policy_number;
//$page = isset($_GET['page']) ? $_GET['page'] : "index";
//
//if (strpos($page, 'notices') !== false) {
//    require_once 'functions/noticesFunctions.php';
//    $notices = new Notices();
//}

if (isset($_GET['key'])) {
    $keyno = $_GET['key'];
    $jsonFileData = file_get_contents("response.json");
    $fileData = json_decode($jsonFileData, true);
    $dataArr = array("data not found");

    if (array_key_exists($keyno, $fileData['result'])) {
        $dataArr = $fileData['result'][$keyno];
    } else {
        $dataArr = array("data not found");
    }
    echo "<pre>";
    print_r($dataArr);
    exit;
}


echo "<br><br>";

if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    $comment = $_POST['comment'];
//    exit;
}

//$total_premium_amount = '13,380.00';
////echo intval(("28,900.00"*100).'');
//echo $total_premium_amount;
//echo "<br>";
//$asd = $total_premium_amount * 100;
//echo $asd;
$dt = strtotime(date("Y-m-d"));
//            $followup_date = date("Y-m-d", strtotime("+1 month", $dt));
$followup_date = date("Y-m-d", strtotime("+7 day", $dt));
//echo "----------------- " . $followup_date;
$existingHashFromDb = '$2y$10$Emqw4bm0nalg.zPxWx/U2OyMixTxof8jVOaj5Y7nHpsbhgopeLkU2';

$password = 'admin@123';
$hashToStoreInDb = password_hash($password, PASSWORD_DEFAULT);
echo "new hashed password====== " . $hashToStoreInDb . "<br>";
if (password_verify($password, $existingHashFromDb)) {
    echo "Password verified";
} else {
    echo "Password not verified";
}

//$total_premium_amount = '2419.00';
//$preamt = $total_premium_amount * 100;
//echo $preamt;
//echo "<br>";
//$amount = substr($preamt, 0, -1);
//echo $amount;
//echo "<br>";
//echo space_filler_numeric($amount, 8);

function space_filler_numeric($string, $actual_length) {
    $string_length = strlen($string);
    $length_diff = $actual_length - $string_length;
    if ($length_diff > 0) {
        $new_string = str_pad($string, $actual_length, "0", STR_PAD_LEFT);
    } elseif ($length_diff < 0) {
        $new_string = substr($string, $string_length - $actual_length, $actual_length);
    } else {
        $new_string = strtoupper($string);
    }
    return $new_string;
}

$policy_num = "RGT6466";
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--<script src="https://kit.fontawesome.com/67e08c4aff.js" crossorigin="anonymous"></script>-->
        <!--<link rel="stylesheet" href="https://kit.fontawesome.com/67e08c4aff.css" crossorigin="anonymous">-->
        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-success get_pdf_byajax_home_npt_ov" href="https://psdn-api-uat.neptuneflood.com/api/v1/public/documents/pdf?link=%2fEPwrsclWHiyPXA%2b9zMV933tcGitJ4fnOp5tWFe4rOV6BqD3hp7zpU2rLhFwmybsbuu3rlUMckzRha9fZlBjzOI%2f9dOQiHWnUw8SkUAX8VY%3d" >Download PDF </a>
                    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
                    <script>
                        $(document).ready(function () {
                            $('.get_pdf_byajax_home_npt_ov').click(function (e) {
                                e.preventDefault();
                                var eoipdfname = 'report' + '<?php echo $policy_num; ?>' + '_' + Date.now();
                                var href_link = $(this).attr("href");
                                fetch(href_link, {
                                    method: 'GET'
                                }).then(resp => resp.blob())
                                        .then(blob => {
                                            const url = window.URL.createObjectURL(blob);
                                            var link = document.createElement('a');
                                            link.href = url;
                                            link.download = "reportTNF3364363" + Date.now();
                                            link.click();
                                        });
                            });
                        });
                    </script>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div id="divToPrint" style="display:none;">
                        <div style="width:200px;height:300px;background-color:teal;">
                            <p> have a load of divs with the class testimonial and I want to use jquery to loop through them to check for each div if a specific condition is true. If it is true, it should perform an action.</p>
                        </div>
                    </div>
                    <div>
                        <input type="button" value="print" class="printMe" />
                    </div>
                    <?php ?>
                    <a href="JavaScript:void(0);" class="down_file">Download here</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm4">
                    <div class="text-center">                                                
                        <div class="text-center display-3">
                            <i aria-hidden="true" class="far fa-star"></i>
                        </div>
                        <h4 class="mb-2 p-0">Entrée autonome?</h4>
                        <p class="mb-0">Pour un accès en toute liberté?</p>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="  crossorigin="anonymous"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".down_file").click(function () {
                                var provider = "37691";
                                var filename = "lenderdock_corrections_20230411.txt";
                                $.ajax({
                                    type: "POST",
                                    url: "ajax.php",
                                    data: {filename: filename, provider: provider, action: 'download_pdf_search_policy_detail_single'},
                                    success: function (data) {
                                        console.log(data);
                                    }
                                });
                            });

//            setTimeout(function () {
////                alert('Reloading Page');
//                location.reload(true);
//            }, 2000);
                        });

//            $('.printMe').click(function () {
//                window.print();
//            });
//        $('.printMe').click(function () {
//            $("#divToPrint").print();
//        });
    </script>
</body>
</html>
