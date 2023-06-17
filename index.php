<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>

<div class="grid_10">

    <div class="box round first grid">
        <h2> Dashbord</h2>
        <div class="block">
            <div  style="width:25%; float: left;_border: 2px solid black;">
                <table>
                    <tr>
                        <td> 
                            <div style="background-color: #d1dee4;width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center;color:#587fa6;">
                                <h5>Total Book</h5>
                                <?php
                                //---- For Book-------- 
                                $book_sql ="SELECT SUM(book_qty) FROM tbl_book";
                                $run_book_sql=mysqli_query($conn,$book_sql);
                                $book_show=mysqli_fetch_assoc($run_book_sql);
                                $book=$book_show['SUM(book_qty)'];

                                //---- For Total Issued--------
                                $book_issed_sql="SELECT SUM(issue_quantity) FROM tbl_issue";
                                $run_book_issed_sql=mysqli_query($conn, $book_issed_sql);
                                $issued_show=mysqli_fetch_assoc($run_book_issed_sql);
                                $total_issue=$issued_show['SUM(issue_quantity)'];

                                //---- For Total book--------
                                $total_book=$book+$total_issue;

                                //---- For Total author--------
                                $author_sql ="SELECT COUNT(author_id) FROM tbl_author";
                                $run_author_sql=mysqli_query($conn,$author_sql);
                                $author_show=mysqli_fetch_assoc($run_author_sql);
                                $author=$author_show['COUNT(author_id)'];

                                //---- For Total author--------
                                $publisher_sql ="SELECT COUNT(publisher_id) FROM tbl_publisher";
                                $run_publisher_sql=mysqli_query($conn,$publisher_sql);
                                $publisher_show=mysqli_fetch_assoc($run_publisher_sql);
                                $publisher=$publisher_show['COUNT(publisher_id)'];

                                //---- For Total student--------
                                $student_sql ="SELECT COUNT(student_id) FROM tbl_student";
                                $run_student_sql=mysqli_query($conn,$student_sql);
                                $student_show=mysqli_fetch_assoc($run_student_sql);
                                $student=$student_show['COUNT(student_id)'];

                                //---- For Total active student--------
                                $active_student_sql ="SELECT COUNT(student_id) FROM tbl_student WHERE student_rule=1";
                                $run_active_student_sql=mysqli_query($conn,$active_student_sql);
                                $active_student_show=mysqli_fetch_assoc($run_active_student_sql);
                                $active_student=$active_student_show['COUNT(student_id)'];

                                ?>
                                <h3 style="color:darkslategray;"><?php echo $total_book;?></h3>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <div style="background-color: #d1dee4; color:lightblue; width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center; color:#587fa6;">
                                <h5>Issued Book</h5>
                                <h3 style="color:darkslategray;"><?php echo $total_issue;?></h3>
                            </div>
                        </td> 
                    </tr> 
                    <tr>
                </table>
            </div>
            <div style="width: 25%; float: left;_border: 2px solid black;">
                <table>
                    <tr>
                        <td> 
                            <div style="background-color: #d1dee4; color:white; width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center;color:#587fa6;">
                                <h5>Total Author</h5>
                                <h3 style="color:darkslategray;"><?php echo $author;?></h3>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <div style="background-color: #d1dee4; color:white; width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center;color:#587fa6;">
                                <h5>Publisher</h5>
                                <h3 style="color:darkslategray;"><?php echo $publisher;?></h3>
                            </div>
                        </td>
                    </tr>                   
                </table>               
            </div>
            <div style="width: 25%; float: left;_border: 2px solid black;">
                <table>
                    <td> 
                        <div style="background-color: #d1dee4; color:lightblue; width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center;color:#587fa6;">
                            <h5>Total Student</h5>
                            <h3 style="color:darkslategray;"><?php echo $student;?></h3>
                        </div>
                    </td> 
                    </tr>
                    <tr>
                        <td> 
                            <div style="background-color: #d1dee4; color:white; width: 100%;border: 8px solid #b7ced8;padding: 10px;margin: 5px;text-align:center;color:#587fa6;">
                                <h5>Active Student</h5>
                                <h3 style="color:darkslategray;"><?php echo $active_student;?></h3>
                            </div>
                        </td>
                    </tr>                    
                </table>               
            </div>            
        </div>
    </div>

</div>

<?php include("inc/footer.php"); }else{header("location:login.php");}?>   
