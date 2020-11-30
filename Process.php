<?php
session_start();
require_once 'connex.php';

foreach($_POST as $key=>$value)
{
	$$key=$value;
}

//Insert
if (isset($_POST['save']))
{
$sql='insert into crud4(name, location)values(?, ?);';
$stmt=$pdo->prepare($sql);
$stmt->execute(array($name, $location));
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";
header("location: index.php");
}

//Delete
if (isset($_GET['delete']))
{
$id = $_GET['delete'];
$sql = 'DElETE FROM crud4 WHERE id = ?';
$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);
$_SESSION['message'] = "Record has been deleted!";
$_SESSION['msg_type'] = "danger";
header("location: index.php");
}

//Read
$sql = 'select * from crud4';
$stmt=$pdo->prepare($sql);
$stmt->execute();
$info = $stmt->fetchAll();

//Edit
if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;
    $sql = 'select * from crud4 WHERE id=?';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$id]);
    $info = $stmt->fetchAll();

    if (count($info==1))
    {
      foreach($info as $data):
      	$name = $data[1];
        $id= $data[0];
        $location = $data[2];
        endforeach;
    }
}

//Update
 if (isset($_POST['update']))
 {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $sql= 'UPDATE crud4 SET name=:name,location=:location WHERE id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute([':id'=> $id,':name'=> $name,':location'=> $location]);
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "info";
        header("location: index.php");     
 }
?>
