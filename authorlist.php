<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php") ?>
 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Author List
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
                            <th>Contact</th>
                            <th>E-mail</th>
                            <th>Education</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                        $autor_sql="SELECT * FROM tbl_author";

                        //$autor_list= $conn->query($autor_sql);

                        $autor_list = mysqli_query($conn,$autor_sql);

                        $i=1;
                        while($data= mysqli_fetch_assoc($autor_list)){ ;

                    ?>                        
                        <tr class="odd gradeX">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['author_name']; ?></td>
                            <td><?php echo( $data["author_contact"] );?></td>
                            <td><?php echo( $data["author_email"] );?></td>
                            <td><?php echo( $data["author_education"] );?></td>
                            <td class="center">
                                <a href="authoredit.php?edit=<?php echo $data['author_id'];?>">Edit</a>    || 
                                <a href="authorlist.php?delid=<?php echo $data['author_id'];?>">Delete</a>
                            </td>
                        </tr>
                    <?php 

                        }
                            if(isset($_GET['delid'])){
                                $del = $_GET['delid'];
                                
                                $author_del_sql = "DELETE FROM tbl_author WHERE author_id=$del";

                                $delete = mysqli_query($conn, $author_del_sql);
                                
                                if($delete){
                                    echo"<strong style='color:orange;'>Author Successfully Deleted..!! <strong>";
                                    //header("refresh:http://localhost/practise/");
                                }else{ echo"<strong style='color:Red;'>Author Not Deleted.!<strong>";}   
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
