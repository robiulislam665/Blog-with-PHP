<?php include 'inc/header.php' ;?>
<?php include 'inc/slider.php' ;?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!--Pagination-->
			<?php 
				$per_page = 3;
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
				$start_form = ($page-1) * $per_page;
			?>

			<!--Pagination-->
			<?php 
				$query = "SELECT * FROM tbl_post limit $start_form, $per_page";
				$post = $db->select($query);
				if ($post) {
					while ($result = $post->fetch_assoc()) {
						
			?>
			<div class="samepost clear">

				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $fm->textShorten($result['body']);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>

		<?php }?><!--while end-->

		<!--Pagination-->
		<?php 
		$query  = "SELECT * FROM tbl_post";
		$result = $db->select($query);
		$total_rows = mysqli_num_rows($result);
		$total_pages = ceil($total_rows/$per_page);

		echo "<span class='pagination'><a href='index.php?page=1'>".'<button>First Page</button> '."</a>" ;
		for ($i=1; $i <=$total_pages ; $i++) { 
			echo " <button><a href='index.php?page=".$i."'>".$i."</a></button> ";
		}
	    echo " <button><a href='index.php?page=1'>".'Last Page'."</a></button></span>" ?>
		<!--Pagination-->
		<?php } else{ header("location:404.php");}?>
		</div>

<?php include 'inc/sidebar.php';?>
<?php include "inc/footer.php";?>

	