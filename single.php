<?php
 require_once "./author.php";
 require_once "./category.php";
 require_once "./location.php";
 require_once "./story.php";

 try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }
 
    if(array_key_exists("id", $_GET)){
        $id = $_GET["id"];
        $story = Story::findById($id);
        if ($story === null){
            throw new Exception("Movie not found");
        }
    }
    else {
        throw new Exception("Missing parameter: Movie id");
    }
 
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}


$stories_all = Story::findAll($options = array('limit' => 1, 'offset' => 0));
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="CSS/reset.css" />
	<link rel="stylesheet" href="CSS/grid.css" />
	<link rel="stylesheet" href="CSS/style.css" />
	<link rel="stylesheet" href="CSS/fonts.css" />
	<link rel="stylesheet" href="CSS/header.css" />
	<link rel="stylesheet" href="CSS/footer.css" />
	<link rel="stylesheet" href="CSS/main.css" />
	<title>single story</title>
</head>

<body>
	<!-- Medium Arcticles -->
	<section class="header">
		<div class="pagetitle">
			<h1><a href="index.php">The Gaming Nest</a></h1>
		</div>
		<div class="navbar">
			<ul>
				<li>Technology</li>
				<li>Gaming</li>
				<li>Movies</li>
				<li>Editorial</li>
				<li>Business</li>
				<li>Celebrity</li>
			</ul>
		</div>
	</section>
	<section class="Articles">
		<div class="container">
			<div class="width-12">
					<?php foreach ($stories_all as $s) { ?>
        			<div class="imageHolder">
        				<img src="<?= $s->img_url ?>" />
					</div>
					<br>
					<div class="content">
						<h2>
							<a href="single.php?id=<?= $s->id ?>">
								<?= $s->headline ?>
							</a>
						</h2>
						<br>
						<div class=""><?= $s->article ?>
						<br> 
						<p><?= $s-> author_id ?></p>
					</div>
    				<?php } ?>
			</div>
		</div>
	</section>
	<section class="footer">
		<div class="footertitle">
			<h1>The Gaming Nest</h1>
		</div>
		<div class="footerelements">
			<ul>
				<li>Terms of use</li>
				<li>Privacy Notice</li>
				<li>Cookie Policy</li>
				<li>Do not sell or share my personal info</li>
				<li>Licensing FAQ</li>
			</ul>
			<ul>
				<li>Accesibility</li>
				<li>Platform status</li>
				<li>How we rate and review</li>
				<li>Products</li>
				<li>Contact</li>
			</ul>
			<ul>
				<li>Tip us</li>
				<li>Community guidelines</li>
				<li>About</li>
				<li>Ethics statement</li>
			</ul>
			<ul>
				<li>Advertise with us</li>
				<li>Copyright infringement</li>
				<li>Jobs at gaming nest</li>
			</ul>
		</div>
		<div class="copyright">
			<p>© 2024 GAMING MEDIA, LLC. ALL RIGHTS RESERVED</p>
		</div>
	</section>

</body>

</html>