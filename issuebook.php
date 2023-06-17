<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Issued Book</h2>
           <div class="block"> 

                <?php
                if(isset($_POST['submit'])){
                        $student = $_POST['student'];
                        $book = $_POST['book'];
                        $issue_date = $_POST['issue_date'];
                        $return_date = $_POST['return_date'];
                        $issue_qty = $_POST['issue_qty'];
                        $status = $_POST['status'];

                        $qty_sql = "SELECT * FROM tbl_book WHERE book_id=$book";
                        $run_sql= mysqli_query($conn,$qty_sql);
                        $qty = mysqli_fetch_assoc($run_sql);
                        $db_qty = $qty['book_qty'];

                        if($db_qty>0 AND $db_qty>=$issue_qty){
                            $calculation = $db_qty-$issue_qty;
                           if( $calculation>=0){
                                $update = "UPDATE tbl_book SET book_qty=$calculation WHERE book_id=$book";
                                $run_updatel_sql=mysqli_query($conn,$update);
                        
                                $issue_sql= "INSERT INTO tbl_issue(student_id,book_id,issued_date,return_date,issue_quantity,issue_status) values('$student','$book','$issue_date','$return_date','$issue_qty','$status')";

                                $issued= mysqli_query($conn,$issue_sql);

                                if($issued){
                                    echo"<strong style='color:green;'>Book Successfully Issued.</strong>";
                                }else{
                                    echo"<strong style='color:Red;'>Book Not Issued..!</strong>";
                                }
                            }else{ 
                            echo"<strong style='color:Red;'>Book Empty..!</strong>"; 
                            }
                        }else{ 
                            echo"<strong style='color:Orange;'>Book  Less Then issued Quentity--!</strong>"; 
                        }

                    }
                ?>
             <form action="issuebook.php" method="POST">
                <table class="form"> 
                    <tr>
                        <td style="width:150px;"> <label>Select Book</label></td>
                        <td>
                             <select style="width: 56%;" class="medium" id="select" name="book">
                                 <option>Select a Book </option>
                               <?php 
                                $book_sql="SELECT * FROM tbl_book WHERE book_qty>=1";
                                $book_list = mysqli_query($conn,$book_sql);
                                while($data= mysqli_fetch_assoc($book_list)){;
                                ?> 
                                <option value="<?php echo $data['book_id']; ?>"> <?php echo $data['book_name']; ?></option>
                                 <?php } ?> 
                        </td>
                    </tr> 
                    <tr>
                         <td> <label>Select Student</label></td>
                        <td>
                            <select style="width: 56%;" class="medium" id="select" name="student">
                                <option>Select a Student </option>
                                <?php 
                                $student_sql="SELECT * FROM tbl_student WHERE student_rule=1";
                                $student_list = mysqli_query($conn,$student_sql);
                                while($data= mysqli_fetch_assoc($student_list)){;
                                ?> 
                                <option value="<?php echo $data['student_id']; ?>"><?php echo $data['student_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>                                    
                    <tr>
                        <td> <label>Issue Date</label></td>
                        <td>
                            <input class="medium" style="color:black;" type="text" name="issue_date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly"/>
                        </td>
                    </tr>

                    <tr>
                        <td> <label>Return Date</label></td>
                        <td>
                            <input class="medium" type="date" id="date-picker" name="return_date" />
                        </td>
                    </tr>

                    <tr>
                        <td> <label>Quantity</label></td>
                        <td>
                            <input class="medium" type="number"  name="issue_qty" />
                        </td>
                    </tr>                    
                    <tr>
                        <td>
                            <label>Status</label>
                        </td>
                        <td>
                            <select class="medium" id="select" name="status">
                                <option value="1">Issued</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><br><br></td>
                    </tr>                                                         
                    <tr> 
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Issued Book" />
                             <input type="submit" Value="Reset" />
                        </td>                      
                    </tr>
                </table>
                </form>

            </div>
        </div>
    </div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   

