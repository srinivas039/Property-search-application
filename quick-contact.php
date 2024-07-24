<?php
$mailTo     = 'YOUR EMAIL ID HERE';

$successMsg = 'Thank you, mail sent successfuly!';

$fillMsg    = 'Please fill all fields!';

$errorMsg   = 'There is an error please check one again, please...';

?>
<?php
if(
    !isset($_POST['contact-name']) ||
	!isset($_POST['contact-email']) ||
	!isset($_POST['contact-message']) ||
    empty($_POST['contact-name']) ||
	empty($_POST['contact-email']) ||
	empty($_POST['contact-message'])
) {
	$json_arr = array( "type" => "error", "msg" => $fillMsg );
	echo json_encode( $json_arr );
} else {

    ?>
    <?php
	$msg = "Name: ".$_POST['contact-name']."\r\n";
	$msg .= "Email: ".$_POST['contact-email']."\r\n";
	$msg .= "Message: ".$_POST['contact-message']."\r\n";
	
    $success = @mail($mailTo, $_POST['contact-email'], $msg, 'From: ' . $_POST['contact-name'] . '<' . $_POST['contact-email'] . '>');
	
    if ($success) {
		$json_arr = array( "type" => "success", "msg" => $successMsg );
		echo json_encode( $json_arr );
    } else {
		$json_arr = array( "type" => "error", "msg" => $errorMsg );
		echo json_encode( $json_arr );
    }
}