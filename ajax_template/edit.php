
<?php
 
 $id = $_POST['id'];
 $connection = new mysqli('localhost','root','','ajax129');
 $data=$connection->query("SELECT * FROM students WHERE id='$id'");
 
 $edit_data = $data->fetch_object();
?>
  
    
  



<div class="wrap ">
 
 <br>
     <div class="card shadow">
         <div class="card-body">
             <h2>Edit student data </h2>
         
             <form id="edit_student_form" method="POST" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="">Name</label>
                     <input  name="name" class="form-control name" type="text" value="<?php echo $edit_data ->name;?>" >
                 </div>
                 <div class="form-group">
                     <label for="">Email</label>
                     <input  name="email" class="form-control email" type="text" value="<?php echo $edit_data ->email;?>">
                 </div>
                 <div class="form-group">
                     <label for="">Cell</label>
                     <input  name="cell" class="form-control cell" type="text" value="<?php echo $edit_data ->cell;?>">
                 </div>
                 <div class="form-group">
                     <label for="">Username</label>
                     <input name="username" class="form-control username" type="text"value="<?php echo $edit_data ->username;?>">
                 </div>
                 <div class="form-group">
                     <label for="">Photo</label>
                     <input  name="photo" class="" type="file">
                 </div>
                 <div class="form-group">
                     <input name="sign up" class="btn btn-primary edit_submit" type="submit" data-id="<?php echo $edit_data ->id; ?>" value="sign up">
                 </div>

                 <input type="hidden" value="<?php echo $edit_data->id;?>" name="hidden_id" >
             </form>
         </div>
     </div>
  
 </div> 

