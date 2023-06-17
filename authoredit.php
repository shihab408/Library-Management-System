<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php"); 


        if(isset($_GET['edit'])){
             $id = $_GET['edit'];
             //echo $id;
             $view = "select * from tbl_author where author_id=$id";
             $viewdata = mysqli_query($conn,$view);
             $data = mysqli_fetch_assoc($viewdata);
             //print_r($data['name']);
         }

        //update 
        if(isset($_POST['submit'])){
            $author_id = $_POST['author_id'];
            $author_name = $_POST['author_name'];
            $author_address = $_POST['author_address'];
            $author_contact = $_POST['author_contact'];
            $author_email = $_POST['author_email'];
            $author_education = $_POST['author_education'];
            
            $usql = "UPDATE tbl_author SET 
                author_name='$author_name', 
                author_address='$author_address',
                author_contact='$author_contact',
                author_email='$author_email',
                author_education='$author_education'
                WHERE author_id = '$author_id'";

            $update = mysqli_query($conn,$usql);

            if($update){
                $_SESSION['msg']='Successfully Updated.';
            echo "<script>window.location.href='authorlist.php';</script>";
            }
        }
?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Author</h2>
           <div class="block copyblock"> 
             <form action="authoredit.php" method="POST" >
                <table class="form">
                 <input type="hidden" name="author_id" value="<?php echo $data['author_id'];?>" hidden/>					
                    <tr>
                        <td>
                            <input type="text" name="author_name" value="<?php echo $data['author_name'];?>" class="large"  />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="author_contact" value="<?php echo $data['author_contact'];?>" class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="email" name="author_email" value="<?php echo $data['author_email'];?>"  class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="author_address" value="<?php echo $data['author_address'];?>"  class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="author_education" value="<?php echo $data['author_education'];?>"  class="large"  />
                        </td>
                    </tr>                    
    				<tr> 
                        <td>
                            <input id="success" type="submit" name="submit" Value="Update Author"/>

                             <a href="http://localhost/library/authorlist.php" style="background: #ddd; padding: 5px 10px 3px 10px; color:#444; font-size: 18px;">Back</a>
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
