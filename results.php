<?php 
    $title = filter_input(INPUT_POST, 'title');
    $category = filter_input(INPUT_POST, 'category');
    $price = filter_input(INPUT_POST, 'price'); 

    if(isset($_POST['submit'])) {

        // title validation
        if(empty($title)){
            $title_error = "Please provide a name for your quiz";
        } elseif(strlen($title) < 5) {
            $title_error = "The title can't be shorter than 5 chars";
        } elseif(strlen($title) > 50){
            $title_error = "The title can't be longer than 50 chars";
        }

        //image validation
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'png');

            // if user provide image
        if($fileError === 0){
            // check file extension
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    // get image url
                    $aExtraInfo = getimagesize($fileTmpName);
                    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($fileTmpName));
                } else {
                    return null;
                }
            } else {
                $logo_error = "Please provide .JPG or .PNG format only";
            }
        } else {
            $logo_error = "Please provide a logo for your quiz";
        }

        // category
        if(empty($category)){
            $cat_error = "Please select category of quiz";
        }

        // currency
        if(empty($price)){
            $price_error = "Please provide a price";
        } elseif($price === "£0.00" ){
            $price_error = "Please provide a correct price";
        } else {
            $price_number = explode("£", $price);
            $price_value = number_format($price_number[1],2,'.',' ');
            $price = "£".$price_value;
        }
    } 

    // forwarding
    if( empty($title_error) && empty($logo_error) && empty($cat_error) && empty($price_error)){
        include('success.php');
    } else {
        include('index.php');
    }
?>
