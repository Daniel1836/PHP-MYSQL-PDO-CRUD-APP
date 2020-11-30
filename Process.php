<?php

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
header("location: Assignment4PDO.php");
}

//Delete
if (isset($_GET['delete']))
{
$id = $_GET['delete'];
$sql = 'DElETE FROM crud4 WHERE id = ?';
$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);
header("location: Assignment4PDO.php");
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
         $id = $_POST['id'];
        $name = $_POST['name'];
        $location = $_POST['location'];
         // $sql= "UPDATE crud4 SET name=?, location=? WHERE id=?";
        //$stmt=$pdo->prepare($sql);
   //$stmt->execute([$name, $location]);
       $sql= 'UPDATE crud4 SET name=:name,location=:location WHERE id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute([':id'=> $id,':name'=> $name,':location'=> $location]);
        header("location: Assignment4PDO.php");     
 }
?>
