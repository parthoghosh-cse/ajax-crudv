<?php
 $i='1';
 
$connection = new mysqli('localhost','root','','ajax129');

$data=$connection->query("SELECT * FROM students");

while($stu=$data->fetch_object()) :



?>

               <tr>
              
                   <td><?php echo $i;$i++;?></td>
                   <td><?php echo $stu->name?></td>
                   <td><?php echo $stu->email?></td>
                   <td><?php echo $stu->cell?></td>
                   <td><img style='width:75px;height:75px' src="photos/<?php echo $stu->photo?> "alt=""></td>
                 
               <td>
                    <a id="profile" profile_id="<?php echo $stu->id?>" class="btn btn-sm btn-primary"href="">View</a>
                    <a id="edit" edit_id="<?php echo $stu->id?>" class="btn btn-sm btn-success"href="">Edit</a>
                    <a delete_id="<?php echo $stu->id?>" class="btn btn-sm btn-danger delete-btn" href="">Delete</a>
               </td>
     
              </tr>

<?php



endwhile;

?>