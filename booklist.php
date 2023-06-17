<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Book List
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
                            <th>Book U_ID</th>
                            <th>Quantity</th>
                            <th>Issued</th>
                            <th>Total</th>
                            <th>Category</th>
                            <th>Publication</th>
                            <th>Author</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                        $student_sql= "SELECT 
                            tbl_book.book_id,
                            tbl_category.category_name,
                            tbl_book.book_name,
                            tbl_book.book_unique_id,
                            tbl_book.book_qty,
                            tbl_author.author_name,
                            tbl_publisher.publisher_name,
                            tbl_issue.issue_id,
                            SUM(tbl_issue.issue_quantity)
                        FROM tbl_book 

                        LEFT JOIN tbl_category
                        ON tbl_book.book_category = tbl_category.category_id

                        LEFT JOIN tbl_author 
                        ON tbl_book.book_author = tbl_author.author_id

                        LEFT JOIN tbl_publisher 
                        ON tbl_book.book_publisher = tbl_publisher.publisher_id

                        LEFT JOIN tbl_issue 
                        ON tbl_book.book_id = tbl_issue.book_id
                        GROUP BY tbl_book.book_id";

                        $student_list = mysqli_query($conn,$student_sql);

                         $i=1;
                        while($data= mysqli_fetch_assoc($student_list)){
                    ?>                        
                        <tr class="odd gradeX">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['book_name']; ?></td>
                            <td><?php echo $data['book_unique_id']; ?></td>
                            <td  style="text-align: center;"><?php echo( $data["book_qty"] );?></td>
                            <td>
                                <?php
                                    $book_id= $data['book_id'];
                                    $issue_query="SELECT SUM(issue_quantity) FROM tbl_issue WHERE book_id='$book_id'";
                                    $issue_query_run= mysqli_query($conn,$issue_query);
                                    while($issued_book= mysqli_fetch_assoc($issue_query_run)){
                                        $issue_qty =  $issued_book['SUM(issue_quantity)'];
                                        if ($issue_qty>0) {
                                            echo $issue_qty;
                                        }else{echo "0";}
                                    }                        
                                ?>
                            </td>
                            <td><?php echo( $issue_qty+$data["book_qty"] );?></td>
                            <td><?php echo( $data["category_name"] );?></td>
                            <td><?php echo( $data["publisher_name"] );?></td>
                            <td><?php echo( $data["author_name"] );?></td>
                            <td class="center">
                                <a href="bookedit.php?edit=<?php echo $data['book_id'];?>">Edit</a>    || 
                                <a href="booklist.php?delid=<?php echo $data['book_id'];?>">Delete</a>
                            </td>
                        </tr>
                    <?php 

                        }
                            if(isset($_GET['delid'])){
                                $del = $_GET['delid'];
                                
                                $book_del_sql = "DELETE FROM tbl_book WHERE book_id=$del";

                                $book_del_from_issue = "DELETE FROM tbl_issue WHERE book_id=$del";

                                $delete = mysqli_query($conn, $book_del_sql);
                                $book_delete_issue=mysqli_query($conn, $book_del_from_issue);
                                
                                if($delete AND $book_delete_issue){
                                    echo"<strong style='color:orange;'>Book Successfully Deleted..!! <strong>";
                                    //header("refresh:http://localhost/practise/");
                                }else{ echo"<strong style='color:Red;'>Book Not Deleted.!<strong>";}   
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
