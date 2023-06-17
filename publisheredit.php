<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php"); 


        if(isset($_GET['editid'])){
             $id = $_GET['editid'];
             //echo $id;
             $view = "select * from tbl_publisher where publisher_id=$id";
             $viewdata = mysqli_query($conn,$view);
             $data = mysqli_fetch_assoc($viewdata);
             //print_r($data['name']);
         }

        //update 
        if(isset($_POST['edit'])){
            $publisher_id = $_POST['publisher_id'];
            $publisher_name = $_POST['publisher_name'];
            $publisher_address = $_POST['publisher_address'];
            $publisher_contact = $_POST['publisher_contact'];
            $publisher_email = $_POST['publisher_email'];
            
            $usql = "UPDATE tbl_publisher SET 
                publisher_name='$publisher_name', 
                publisher_address='$publisher_address',
                publisher_contact='$publisher_contact',
                publisher_email='$publisher_email' WHERE 
                publisher_id = '$publisher_id'";

            $update = mysqli_query($conn,$usql);

            if($update){
                $_SESSION['msg']='Successfully Updated.';
            echo "<script>window.location.href='publisherlist.php';</script>";
            }
        }
?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Publisher</h2>
           <div class="block copyblock"> 
             <form action="publisheredit.php" method="POST" >
                <table class="form">
                 <input type="hidden" name="publisher_id" value="<?php echo $data['publisher_id'];?>" hidden/>					
                    <tr>
                        <td>
                            <input type="text" name="publisher_name" value="<?php echo $data['publisher_name'];?>" class="large"  />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="publisher_contact" value="<?php echo $data['publisher_contact'];?>" class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="email" name="publisher_email" value="<?php echo $data['publisher_email'];?>"  class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="publisher_address" value="<?php echo $data['publisher_address'];?>"  class="large"  />
                        </td>
                    </tr>
    				<tr> 
                        <td>
                            <input id="success" type="submit" name="edit" Value="Update Publisher"/>

                             <a href="http://localhost/library/publisherlist.php" style="background: #ddd; padding: 5px 10px 3px 10px; color:#444; font-size: 18px;">Back</a>
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
<!-- 
<script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'error',
      title: 'Successfully Updated'
    })
</script> -->
<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
