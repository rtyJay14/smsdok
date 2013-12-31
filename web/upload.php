<?php include "scripts/riceplusplus.php";

$new_image_name = time().random::string(5).".jpg";
move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$new_image_name);

$_POST['image'] = $new_image_name;
if(riceplusplus::add_report($_POST)) {
	echo "Yes";
} else {
	echo "No";
}

?>