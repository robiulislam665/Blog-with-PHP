</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	   <?php 
	        $query = "SELECT * FROM tbl_copyright WHERE id = '1'";
	        $copyrightname = $db->select($query);
	        if ($copyrightname) {
	            while ($result = $copyrightname->fetch_assoc()) {
	        
	    ?>
	  <p>&copy; <?php echo $result['name']; ?> <?php echo date("Y");?></p>
	<?php } } ?>
	</div>
	<div class="fixedicon clear">
		<?php 
            $query = "SELECT * FROM tbl_social WHERE id = '1'";
            $social = $db->select($query);
            if ($social) {
                while ($result = $social->fetch_assoc()) {
                   

        ?>
		<a href="<?php echo $result['facebook']; ?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['twitter']; ?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['linkedin']; ?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['goole_plus']; ?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php } } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>