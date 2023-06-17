<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php"); 


        if(isset($_GET['edit'])){
             $id = $_GET['edit'];
             //echo $id;
             $view = "SELECT * FROM tbl_student WHERE student_id=$id";
             $viewdata = mysqli_query($conn,$view);
             $data = mysqli_fetch_assoc($viewdata);
             //print_r($data['name']);
         }

        //update 
        if(isset($_POST['edit'])){
            $student_id = $_POST['student_id'];
            $student_name = $_POST['student_name'];
            $student_roll = $_POST['student_roll'];
            $student_dep = $_POST['student_dep'];
            $student_contact = $_POST['student_contact'];
            $student_address = $_POST['student_address'];
            
            $usql = "UPDATE tbl_student SET 
                student_name='$student_name', 
                student_roll='$student_roll',
                student_dep='$student_dep',
                student_contact='$student_contact',
                student_address='$student_address'
                WHERE student_id = '$student_id'";

            $update = mysqli_query($conn,$usql);

            if($update){
                $_SESSION['msg']='Successfully Updated.';
            echo "<script>window.location.href='studentlist';</script>";
            }
        }
?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Student</h2>
           <div class="block copyblock"> 
             <form action="studentedit.php" method="POST" >
                <table class="form">
                 <input type="hidden" name="student_id" value="<?php echo $data['student_id'];?>" hidden/>					
                    <tr>
                        <td>
                            <input type="text" name="student_name" value="<?php echo $data['student_name'];?>" class="large"  />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="student_roll" value="<?php echo $data['student_roll'];?>" class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="student_dep" value="<?php echo $data['student_dep'];?>"  class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="student_contact" value="<?php echo $data['student_contact'];?>"  class="large"  />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="student_address" value="<?php echo $data['student_address'];?>"  class="large"  />
                        </td>
                    </tr>                                       
    				<tr> 
                        <td>
                            <input id="success" type="submit" name="edit" Value="Update Student"/>

                             <a href="http://localhost/library/studentlist.php" style="background: #ddd; padding: 5px 10px 3px 10px; color:#444; font-size: 18px;">Back</a>
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
