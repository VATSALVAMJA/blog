<?php
	include('connect.php');
$name = $_REQUEST['name'];
 $email = $_REQUEST['email'];
 $subject = $_REQUEST['subject'];
 $message = $_REQUEST['message'];
$sql = "SELECT * FROM contacts where email = '" . $email . "'";
$result = $conn->query($sql);



    if ($name == '') {
        header('Location:contact.php?err_msg=Name is required.!');
    } 
    else if ($email == '') {
        if (isset($_REQUEST['edit_id'])) {
            header('Location:contact.php?err_msg=Email Id is required.!');
        } 
        else {
            header('Location:contact.php?err_msg=Email Id is required.!');
        }
    } 
    else if ($subject == '') {
        header('Location:contact.php?err_msg=subject is required.!');
    } 
    else if ($message == '') {
        header('Location:contact.php?err_msg=Comment is required.!');
    } 
	else{
 
// code to save data in database table
if (isset($_REQUEST['edit_id'])) {
	$sql = "UPDATE contacts SET name='$name', email = '$email', subject = '$subject', message='$message' 
    WHERE id='" . $_REQUEST['edit_id'] . "'";
	if ($conn->query($sql) === TRUE) {
		header('Location:contact.php?success_msg=Data Updated Successfully.!');
	} 
	else {
		header('Location:contact.php?msg=Error in Data Updation.!');
	}
}
else {
 	$sql = "INSERT INTO contacts (name, email, subject, message) 
     VALUES ('$name','$email','$subject','$message')";
 if ($conn->query($sql) === TRUE) {
 	header('Location:contact.php?success_msg=Data Saved Successfully.!');
 } 
 else {
 	header('Location:contact.php?msg=Error in Data Insertion.!');
 }
}
	}
?>