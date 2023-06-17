<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>


    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Student</h2>
           <div class="block copyblock"> 

                <?php
                if(isset($_POST['submit'])){
                        $student_name = $_POST['student_name'];
                        $student_roll = $_POST['student_roll'];
                        $student_dep = $_POST['student_dep'];
                        $student_contact = $_POST['student_contact'];
                        $student_address = $_POST['student_address'];

                    $check_roll_sql="SELECT * FROM tbl_student";
                    $check_roll_sql_run= mysqli_query($conn,$check_roll_sql);
                    while($roll_data= mysqli_fetch_assoc($check_roll_sql_run)){
                        $roll_check= $roll_data['student_roll'];
                    }
                    if ($student_roll!==$roll_check ) {

                        $add_student_sql = "INSERT INTO tbl_student(
                            student_name,
                            student_roll,
                            student_dep,
                            student_contact,
                            student_address) 
                        values(
                            '$student_name',
                            '$student_roll',
                            '$student_dep',
                            '$student_contact',
                            '$student_address')";

                        $student_add= mysqli_query($conn,$add_student_sql);

                        if($student_add){
                            echo"<strong style='color:green;'>Student Successfully Registered.<strong>";
                        }else{
                            echo"<strong style='color:Red;'>Student Not Registered..!<strong>";
                        }
                    }else{
                            echo"<strong style='color:Blue;'>Student Already  Registered..!<strong>";
                        }
                }
                ?>
             <form action="studentadd.php" method="POST">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="student_name" placeholder="Enter Student Name..." class="large" required />
                        </td>
                    </tr>  
                    <tr>  
                        <td>
                            <input type="text" name="student_roll" placeholder="Enter Student Roll..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="student_dep" placeholder="Enter Student Department Name..." class="large" required />
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <input type="text" name="student_contact" placeholder="Enter Student contact..." class="large" required />
                        </td>
                    </tr>                    
                    <tr>    
                        <td>
                            <input type="text" name="student_address" placeholder="Enter Student Address..." class="large" required />
                        </td>
                    </tr>
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Add Student" />
                             <input type="submit" Value="Reset" />
                        </td>                       
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
