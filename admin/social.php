<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $facebook    = $fm->validation($_POST['facebook']);
        $twitter     = $fm->validation($_POST['twitter']);
        $linkedin    = $fm->validation($_POST['linkedin']);
        $google_plus = $fm->validation($_POST['google_plus']);

        $facebook    = mysqli_real_escape_string($db->link,$facebook);
        $twitter     = mysqli_real_escape_string($db->link,$twitter);
        $linkedin    = mysqli_real_escape_string($db->link,$linkedin);
        $google_plus = mysqli_real_escape_string($db->link,$google_plus);

        if ($facebook == "" || $twitter == "" || $linkedin == "" || $google_plus == "") {
           echo "<span class='error'>Field must not be empty !</span>";        
       } else {
            $query = "UPDATE tbl_social
                     SET
                     facebook    = '$facebook',
                     twitter     = '$twitter',
                     linkedin    = '$linkedin',
                     google_plus = '$google_plus'
                     WHERE id ='1'";
                     $updated_row = $db->update($query);
                     if ($updated_row) {
                         echo "<span class='success'>Data Updated Successfully.</span>";
                     } else {
                        echo "<span class='error'>Data Not Updated !</span>";
                     }
       }
    }
?>
        <div class="block"> 
        <?php 
            $query = "SELECT * FROM tbl_social WHERE id = '1'";
            $social = $db->select($query);
            if ($social) {
                while ($result = $social->fetch_assoc()) {
                   

        ?>              
         <form action="social.php" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $result['facebook']; ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $result['twitter']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $result['linkedin']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="google_plus" value="<?php echo $result['google_plus']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>