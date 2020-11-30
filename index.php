<!DOCTYPE html>
<html>
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
     
       <form action="Process.php" method="POST">
       <input type="hidden" name="id" value="<?php echo $id;?>">
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
   <td> <?= $data[1]; ?></td>
   <td> <?= $data[2]; ?></td>
   <td>
          <a href='index.php?edit=<?=$data[0]?>' class='btn btn-info'>Edit</a>
          <a href='Process.php?delete=<?= $data[0]?>' class='btn btn-danger'>Delete</a>
   </td>
</tr>
  
    <?php endforeach; ?>
   </body>
</html>
