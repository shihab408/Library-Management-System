<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Issued Book List 
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
                    <th>Book Name</th>
                    <th>Book ID</th>
                    <th>Std Name</th>
                    <th>Std Roll</th>
                    <th>Issued Date</th>
                    <th>Return Date</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th class="center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $issued_sql="SELECT 
                                tbl_student.student_name,
                                tbl_student.student_roll,
                                tbl_book.book_name,
                                tbl_book.book_unique_id,
                                tbl_issue.issued_date,
                                tbl_issue.return_date,
                                tbl_issue.issue_quantity,
                                tbl_issue.issue_id,
                                tbl_issue.issue_status
                            FROM tbl_issue
                            LEFT JOIN tbl_student
                                ON tbl_student.student_id = tbl_issue.student_id
                            LEFT JOIN tbl_book
                                ON tbl_book.book_id = tbl_issue.book_id;";

                $issued_list = mysqli_query($conn,$issued_sql);

                $i=1;
                while($data= mysqli_fetch_assoc($issued_list)){ ;

            ?>                        
                <tr class="odd gradeX">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $data['book_name']; ?></td>
                    <td><?php echo $data['book_unique_id']; ?></td>
                    <td><?php echo $data['student_name'];?> </td>
                    <td><?php echo( $data["student_roll"] );?></td>
                    <td><?php echo( $data["issued_date"] );?></td>
                    <td><?php echo( $data["return_date"] );?></td>
                    <td><?php echo( $data["issue_quantity"]);?></td>
                    <td>
                        <?php 
                        $status =  $data["issue_status"];

                        if ($status ==1) { ?>
                          <a style="color:green;" href="issuedlist.php?activeid=<?php echo($data['issue_id']);?>">Issued</a>
                        <?php
                        }else{?>
                            <a style="color:orange;" href="issuedlist.php?deactiveid=<?php echo( $data['issue_id']);?>">Non-Issued</a>
                        <?php 
                            }
                        if (isset($_GET['activeid'])) {
                            $active_id= $_GET['activeid'];
                            $active_query="UPDATE tbl_issue SET issue_status=0 WHERE issue_id='$active_id'";
                            $success = mysqli_query($conn,$active_query);
                            if ($success) {
                               echo "<script>window.location.href= 'issuedlist';</script>";
                            }
                        }
                        if(isset($_GET['deactiveid'])) {
                            $deactiveid= $_GET['deactiveid'];
                            $deactive_query="UPDATE tbl_issue SET issue_status=1 WHERE issue_id='$deactiveid'";
                            $success = mysqli_query($conn,$deactive_query);
                            if ($success) {
                               echo "<script>window.location.href= 'issuedlist';</script>";
                            }
                        }
                        ?>
                    </td>
                    <td class="center"><a style="color:darkcyan;" href="issuedlist?return=<?php echo $data['issue_id'];?>">Return</a> 
                    </td>
                </tr>
            <?php 
                }
                if(isset($_GET['return'])){
                    $return_id = $_GET['return'];

                    $return_sql = "SELECT * FROM tbl_issue WHERE issue_id='$return_id'";
                    $return_sql_run =mysqli_query($conn,$return_sql);
                    $return_data =mysqli_fetch_assoc($return_sql_run);
                    $ret_book = $return_data['book_id'];
                    $ret_qty = $return_data['issue_quantity'];

                    $select_book_sql = "SELECT * FROM tbl_book WHERE book_id='$ret_book'";
                    $select_book_sql_run =mysqli_query($conn,$select_book_sql);
                    $select_book_data =mysqli_fetch_assoc($select_book_sql_run);
                    $book_qty = $select_book_data['book_qty'];

                    $total_book = $ret_qty+$book_qty;

                    $update_book_qty="UPDATE tbl_book SET book_qty='$total_book'WHERE book_id='$ret_book'";
                    $update_book_qty_run=mysqli_query($conn,$update_book_qty);

                       if ($update_book_qty_run) {
                        $return_del_query="DELETE FROM tbl_issue WHERE issue_id='$return_id'";
                        $return_del = mysqli_query($conn,$return_del_query);
                        if ($return_del) {
                            $_SESSION['msg']='Successfully Returned.';
                        echo "<script>window.location.href='issuedlist.php';</script>";
                        }else{
                            $_SESSION['msg']='Book Not Returned.';
                            echo "<script>window.location.href='issuedlist.php';</script>";
                        }
                        
                    }
                    
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
