

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
</head>
<body>
<br>
  <div class="manu ">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <a id ="all" class="btn btn-primary btn-sm" href="">All students</a>
                  <a id="add_student" class="btn btn-primary btn-sm " href="">Add new student</a>
                 
              </div>
          </div>
      </div>
  </div>
<br>
 <div class="app">


  

 
 </div>

	<!-- JS FILES  -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>


$(document).ready(function(){

 $('#add_student').click(function(){
 
 $.ajax({

  url : 'create.php',
  success : function(data){
  
  $('.app').html(data);
   

  }

 });
  return false;
 });

    $(document).on('submit','#edit_student_form',function(){

      $.ajax({
        url:'ajax_template/edit-action.php',
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data){
        swal({title: "Edit Done", text: "Student data edited successful",icon:'success'}).then(function(){ 
            location.reload();
            }
          );
        }

      });


      return false ;
    });


      alldata();

      function alldata(){

      
        $.ajax({
        url:'ajax_template/all_student_show.php',
        success: function(data){
        $('.all_student_data').html(data);
        }


        });
      }


  $(document).on('click','#profile',function(e){
    e.preventDefault();

    let id = $(this).attr('profile_id');

    $.ajax({
    url:'profile.php',
    method:'POST',
    data:{id:id},
    success:function(data){
      $('.app').html(data);

    }
      
    });
 
});

$(document).on('click','#edit',function(e){
  e.preventDefault();
  let id =$(this).attr('edit_id');

  $.ajax({
   url:'ajax_template/edit.php',
   method:"POST",
   data:{
     id:id
   },
   success:function(data){
     $('.app').html(data);
    }

  });
 

});



$(document).on('click','#back',function(e){
 e.preventDefault();
 
 $.ajax({
 url:'allstudent.php',
 success:function(data){
   $('.app').html(data);

   alldata();
 }
  
 });
 
});



 $('#all').click(function(){

    $.ajax({
      url: 'allstudent.php',
      success: function(data){

        $('.app').html(data);

        alldata();
      }


    });

    return false;
 });

 $.ajax({
      url: 'allstudent.php',
      success: function(data){

        $('.app').html(data);


      }


    });


$(document).on('submit','#student_form',function(){


  $.ajax({
   url:'ajax_template/db_create.php',
   method:'POST',
   data:new FormData(this),
   contentType:false,
   processData:false,
   success:function(data){

    swal({
      title:'Data added ',
      text:'Student added successful',
      icon:'success'
    });
    
      $('#student_form')[0].reset();
   }

   
 });

  return false ;

});




alldata();

function alldata(){

  
$.ajax({
 url:'ajax_template/all_student_show.php',
 success: function(data){
  $('.all_student_data').html(data);
 }


});
}


$(document).on('click','a.delete-btn',function(){
  
let id = $(this).attr('delete_id');

swal({
 title:'Are you sure ??',
 text: 'Delete student data',
 icon:'warning',
 buttons:true,
 dangerMode:true
}).then((conf)=>{

  if(conf){
    $.ajax({
url:'ajax_template/delete.php',
method: "POST",
data : {

  id : id
},

success:function(data){

swal({

  title:'Done',
  text:'Data deleted successful',
  icon:'success'
});

 alldata();


}

});


  }else{

    swal({

     title:' safe',
     text: 'Data safe now',
     icon:'success'
});
     
  }


});







  return false;
});

});

</script>


</body>
</html>