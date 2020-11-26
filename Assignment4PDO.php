<!DOCTYPE html>
<html>
<head>
            <link rel="stylesheet" href="crudcss.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
   <title>CRUD App</title>
        </head>
   <body> 

 <?php 
 require 'ProcessPDO.php';
 ?>

 <?php if (isset($_SESSION['message'])): ?>
 <div class="alert alert-<?=$_SESSION['msg_type']?>">

 <?php 
 echo $_SESSION['message'];
 unset($_SESSION['message']);
 ?>
 
</div>


<?php endif ?>
     
       <form action="ProcessPDO.php" method="POST">
       <input type="hidden" name="id" value="<?php echo $id;?>">
       <label>ID</label>
           <input type="text" name="id" value="<?php echo $id;?>" placeholder="Enter ID">
       <label>Video Title</label>
           <input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter Video Title">
       <label>Video Genre</label>
           <input type="text" name="location" value="<?php echo $location;?>" placeholder="Enter Video Genre">
           <?php if ($update == true):?>
<button type="submit" name="update" class='btn btn-info'>Update</button>
<?php else:?>
           
           <button type="submit" name="save" class='btn btn-success'>Save</button>
           <?php endif ?>
       </form>
       
       <table class="table table-striped table-hover">
       
        <thead>
          <tr>
          
              <th>ID</th>
              <th>Video Title</th>
              <th>Genre</th>
              <th colspan="2">Action</th>
          </tr>
        </thead>

    <?php foreach($info as $data): ?>
    <tr>
   <td> <?= $data[0]; ?></td>
   <td> <?= $data[2]; ?></td>
   <td> <?= $data[1]; ?></td>
   <td>
          <a href='Assignment4PDO.php?edit=<?=$data[0]?>' class='btn btn-info'>Edit</a>
          <a href='ProcessPDO.php?delete=<?= $data[0]?>' class='btn btn-danger'>Delete</a>
   </td>
</tr>
  
    <?php endforeach; ?>


   </body>
</html>