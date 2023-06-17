<?php include("inc/header.php");
if (isset($_SESSION['user_name'])) {
 ?>
<?php include("inc/side_bar.php");?>
 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Publisher List 
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
                            <th>Address</th>
                            <th class="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                        $publisher_sql="SELECT * FROM tbl_publisher";

                        //$publisher_list= $conn->query($publisher_sql);

                        $publisher_list = mysqli_query($conn,$publisher_sql);

                        $i=1;
                        while($data= mysqli_fetch_assoc($publisher_list)){ ;

                    ?>                        
                        <tr class="odd gradeX">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['publisher_name']; ?></td>
                            <td><?php echo( $data["publisher_contact"] );?></td>
                            <td><?php echo( $data["publisher_email"] );?></td>
                            <td><?php echo( $data["publisher_address"] );?></td>
                            <td class="center">
                                <a href="publisheredit.php?editid=<?php echo $data['publisher_id'];?>">Edit</a>    || 
                                <a href="publisherlist.php?delid=<?php echo $data['publisher_id'];?>">Delete</a>
                            </td>
                        </tr>
                    <?php 

                        }
                            if(isset($_GET['delid'])){
                                $del = $_GET['delid'];
                                
                                $publisher_del_sql = "DELETE FROM tbl_publisher WHERE publisher_id=$del";

                                $delete = mysqli_query($conn, $publisher_del_sql);
                                
                                if($delete){
                                    echo"<strong style='color:orange;'>Publisher Successfully Deleted..!! <strong>";
                                    //header("refresh:http://localhost/practise/");
                                }else{ echo"<strong style='color:Red;'>Publisher Not Deleted.!<strong>";}   
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
