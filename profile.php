<?php

 $id = $_POST['id'];

 $connection = new mysqli('localhost','root','','ajax129');
 $data=$connection->query("SELECT * FROM students WHERE id='$id'");
 
 $profile_data = $data->fetch_object();

?>
    <div class="wrap shadow">
        <div class="card">
            <div class="card-body">
                <h2 style="text-align:center" >Student Profile</h2>
                <img style="width:300px; height:300px; border-radius: 50%; margin:50px auto; display:block;" src="photos/<?php echo $profile_data->photo?>" alt="">
                <h1 style="text-align:center" ><?php echo $profile_data->name?></h1>

                <table class="table">
                    <tr>
                        <td>Name :</td>
                        <td><?php echo $profile_data->name?></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><?php echo $profile_data->email?></td>
                    </tr>
                    <tr>
                        <td>Username :</td>
                        <td><?php echo $profile_data->username?></td>
                    </tr>
                    <tr>
                        <td>Cell :</td>
                        <td><?php echo $profile_data->cell?></td>
                    </tr>
                </table>
                <a id="back" class="btn btn-primary btn-sm" href="">Back</a>
            </div>
        </div>
    
    </div>

