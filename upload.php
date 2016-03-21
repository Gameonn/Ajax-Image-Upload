<?php
require_once("php_include/db_connection.php");

if($_POST['case']=='delete'){
	echo 'test';
}
else{
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "images/".$_FILES['userImage']['name'];
$picname = $_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
<?php
}
}

$sql="INSERT INTO test(id,first_name,last_name,email,gender,phone,profile_pic,created_on) VALUES(DEFAULT,:first_name,:last_name,:email,:gender,:phone,:profile_pic,NOW())";
$sth=$conn->prepare($sql);
$sth->bindValue('first_name',$_POST['first_name']);
$sth->bindValue('last_name',$_POST['last_name']);
$sth->bindValue('email',$_POST['email']);
$sth->bindValue('gender',$_POST['gender']);
$sth->bindValue('phone',$_POST['phone']);
$sth->bindValue('phone',$_POST['phone']);
$sth->bindValue('profile_pic',$picname);
try{$sth->execute();}
catch(Exception $e){}
}
}
?>