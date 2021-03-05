<?php
require "header.php";
/*include 'includes/db.inc.php';

if ($connection) {
echo "successful";
}*/
?>



<main>
	<?php
	if (isset($_SESSION['username'])) {
		echo "<p>You are logged in</p>";
	}
	else{
		echo "<p>You are not logged in</p>";
	}
	?>
</main>

<?php
require "footer.php";
?>