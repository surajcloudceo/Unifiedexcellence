


<?php
require_once('connect.php');

$to = "info@unifiedexcellence.com,contact@unifiedexcellence.com";
$subject = "Bussiness Enquiry - Unified Excellence LLP";

$message = "
<html>
<head>
<title>Unified Excellence</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<p>Hi Team,</p><br/>
<p>This is a system-generated e-mail. We request you not to reply to this message!</p>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Subject</th>
<th>Refer</th>
<th>Message</th>
</tr>
<tr>
<td>".$_POST['mname']."</td>
<td>".$_POST['memail']."</td>
<td>".$_POST['mphone']."</td>
<td>".$_POST['msubject']."</td>
<td>".$_POST['mrefer']."</td>
<td>".$_POST['message']."</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@unifiedexcellence.com>' . "\r\n";
$headers .= 'Cc: unifiedexcellence@gmail.com' . "\r\n";

if(mail($to,$subject,$message,$headers))
{
	$name = $_POST['mname'];	
	$email = $_POST['memail'];	
	$phone = $_POST['mphone'];	
	$subject = $_POST['msubject'];	
	$refer = $_POST['mrefer'];	
	$message = $_POST['message'];	
	$sql = "INSERT INTO `contact` (name, email, phone, subject, refer, message) VALUES ('$name', '$email', '$phone', '$subject', '$refer', '$message')";
	if(mysqli_query($mysqli, $sql))
	     {
	echo 'Registered Successfully, Our team will contact you with in 24 hours.';
	header("location: index.php");
		}
}
else
{
echo "Failed to send message, Try again";
header("location: contact.php");
}


/*$email = $_POST['memail'];	
$message = "<p style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;'>Dear Team, <br><br> Name:<strong>".$_POST['mname']."</strong><br><br> Email:<strong>".$_POST['memail']."</strong><br><br> Phone:<strong>".$_POST['mphone']."</strong><br><br> Subject:<strong>".$_POST['msubject']."</strong><br><br>  Refer:<strong>".$_POST['mrefer']."</strong><br><br> Message:".$_POST['message']."<br /><br />Yours Sincerely,<br /><br />Dream Events N Weddings Customer Service Team<br />This is a system-generated e-mail. We request you not to reply to this message.<p>";*/


?>
