<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Student List 
        <?php 
            if (isset($_SESSION['msg'])) {
                echo (" || ".$_SESSION['msg']);
                unset($_SESSION['msg']);
            }
        ?>
        </h2>
        <div class="block">  
            <table class="data display datatable" id="example">
            <thead>  
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Issued</th>
                    <th>Contact</th>
                    <th>Roll</th>
                    <th>Department</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th class="center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 

                $student_sql="SELECT * FROM tbl_student";

                //$publisher_list= $conn->query($publisher_sql);

                $student_list = mysqli_query($conn,$student_sql);

                $i=1;
                while($data= mysqli_fetch_assoc($student_list)){ ;

            ?>                        
                <tr class="odd gradeX">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $data['student_name']; ?></td>
                    <td><?php
                        $std_id= $data['student_id'];
                        $issue_query="SELECT SUM(issue_quantity) FROM tbl_issue WHERE student_id='$std_id'";
                        $issue_query_run= mysqli_query($conn,$issue_query);
                        while($issued_book= mysqli_fetch_assoc($issue_query_run)){
                            $issue_qty =  $issued_book['SUM(issue_quantity)'];
                            if ($issue_qty>0) {
                                echo $issue_qty;
                            }else{echo "0";}
                        }
                    ?>
                    </td>
                    <td><?php echo( $data["student_contact"] );?></td>
                    <td><?php echo( $data["student_roll"] );?></td>
                    <td><?php echo( $data["student_dep"] );?></td>
                    <td><?php echo( $data["student_address"] );?></td>
                    <td>
                        <?php 
                        $status =  $data["student_rule"];

                        if ($status ==1) { ?>
                          <a style="color:green;" href="studentlist.php?activeid=<?php echo($data['student_id']);?>">Active</a>
                        <?php
                        }else{?>
                            <a style="color:orange;" href="studentlist.php?deactiveid=<?php echo( $data['student_id']);?>">Deactive</a>
                        <?php 
                            }
                        if (isset($_GET['activeid'])) {
                            $active_id= $_GET['activeid'];
                            $active_query="UPDATE tbl_student SET student_rule=0 WHERE student_id='$active_id'";
                            $success = mysqli_query($conn,$active_query);
                            if ($success) {
                               echo "<script>window.location.href= 'studentlist.php';</script>";
                            }
                        }
                        if (isset($_GET['deactiveid'])) {
                            $deactiveid= $_GET['deactiveid'];
                            $deactive_query="UPDATE tbl_student SET student_rule=1 WHERE student_id='$deactiveid'";
                            $success = mysqli_query($conn,$deactive_query);
                            if ($success) {
                               echo "<script>window.location.href= 'studentlist.php';</script>";
                            }
                        }
                        ?>
                    </td>
                    <td class="center">
                        <a style="color:darkcyan;" href="studentedit.php?edit=<?php echo $data['student_id'];?>">Edit</a>    || 
                        <a style="color:hotpink;" href="studentlist.php?delid=<?php echo $data['student_id'];?>">Delete</a>
                    </td>
                </tr>
            <?php 

                }
                    if(isset($_GET['delid'])){
                        $del = $_GET['delid'];
                        
                        $student_del_sql = "DELETE FROM tbl_student WHERE student_id=$del";

                        $delete = mysqli_query($conn, $student_del_sql);
                        
                        if($delete){
                            echo"<strong style='color:orange;'>Student Successfully Deleted..!! <strong>";
                            //header("refresh:http://localhost/practise/");
                        }else{ echo"<strong style='color:Red;'>Student Not Deleted.!<strong>";}   
                    }  
                
                ?> 

            </tbody>
        </table>

       </div>
    </div>
</div>






    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>
<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
