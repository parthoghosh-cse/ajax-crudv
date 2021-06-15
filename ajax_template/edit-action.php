<?php

$id = $_POST['hidden_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$cell =  $_POST['cell'];
$username = $_POST['username'];

$file_name = time() . $_FILES['photo']['name'];
$file_tmp_name = $_FILES['photo']['tmp_name'];


$connection = new mysqli('localhost','root','','ajax129');

$img = $connection->query("SELECT * FROM students WHERE id= '$id'");
$data=$connection->query("UPDATE students SET name='$name', email='$email', cell='$cell',username='$username',photo='$file_name' WHERE id='$id'");
move_uploaded_file($file_tmp_name,'../photos/'.$file_name);
$image = $img->fetch_object();

if( $image->photo ){
    unlink('../photos/'.$image->photo);
}



?>