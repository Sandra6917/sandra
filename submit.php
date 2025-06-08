<?php
$email = $_POST['email'];
$name = $_POST['name'];
$dateofbirth = $_POST['phonenumber'];

$gender = $_POST['entermsg'];
 
$conn = new mysqli('localhost', 'root', '', 'practice');

$sql = "SELECT * FROM register WHERE email = '$email'";
if($conn->query($sql)->num_rows > 0){
    $resp['status'] = 'failed';
    $resp['msg'] = 'This email has already been used';
    echo json_encode($resp);
    exit;
}

$sql="INSERT INTO register(name, email, dateofbirth, contact, gender) VALUES('$name', '$email','$dateofbirth', '$contact', '$gender')";

if($conn->query ($sql)){
    $resp['status'] = 'success';
    $resp['msg'] = 'Submitted successfully';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured, try again';
}

echo json_encode($resp);

?>