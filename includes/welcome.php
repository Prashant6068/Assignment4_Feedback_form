<?php
if (!empty($user)) {
?>
<style>
    .p2{
        box-shadow: 5px 5px 10px black;
        
    }
</style>
<div class="container my-5 pt-5">
<form action="" method="POST" class="form-si p-4 bg-white p2" enctype="multipart/form-data">
    <!-- <section class="container   "> -->
        <aside class="row">
            <div class="col col-sm col-md my-auto text-center  ">
                <div class="my-5 text-center">
                    <img src="https://pbs.twimg.com/profile_images/1318934357642338304/Eh1dUzzL_400x400.jpg" class="logo wel-logo img-fluid" alt="">
                    <p class='lead'>Your are logged in as: <b><?php echo $user; ?></b></p>
                    <p class="lead mb-4">Click here on below button for giving feedback</p>
                    <a href="?p=feedback" class="btn btn-dark btn-lg">Feedback</a>
                </div>
            </div>
        </aside>
</div>
</form>
<?php
} else {
?>
<style>
.p1{
    width: 500px;
    
   
    box-shadow: 5px 5px 10px black;
   background-color: #EDF6E5;
}
.lead{
    font-family:Georgia, 'Times New Roman', Times, serif;
  
}

</style>
    <section class="container content p1">
        <aside class="row">
            <!-- <div class="col col-sm col-md my-auto text-center border rounded shadow "> -->
                <div class="my-5 text-center ">
                    <p class="lead mb-4">Click here on below button for giving feedback</p>
                    <a href="?p=feedback" class="btn btn-dark btn-lg">Feedback</a>
                </div>
            </div>

            <!-- <div class="col col-sm col-md my-auto text-center border rounded shadow">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4nvOgQTC-t89xR6fC2vAJp9dQolOUx6aQaNDiLiBtxbbLlFDjtgWUJvXP_vml2SL7h5g&usqp=CAU" alt="">
               
            </div> -->

        </aside>
    </section>
<?php
}
?>