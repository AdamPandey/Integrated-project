<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

$stories_all = Story::findAll($options = array('limit' => 2, 'offset' => 2));

$authorId = 7;
$author = Story::findByAuthor($authorId, $options = array('limit' => 1, 'offset' => 0));

$categoryId = 1;
$stories1 = Story::findByCategory($categoryId, $options = array('limit' => 2, 'offset' => 0));

$categoryId = 2;
$stories2 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));

$categoryId = 4;
$stories3 = Story::findByCategory($categoryId, $options = array('limit' => 3, 'offset' => 1));

$categoryId = 5;
$stories4 = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 0));

$categoryId = 3;
$stories6 = Story::findByCategory($categoryId, $options = array('limit' => 2, 'offset' => 0));

$categoryId = 3;
$stories7 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 5));

$locationId = 8;
$location = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

?>
<!DOCTYPE html>
<html lang="en">

<head>
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
	<title>the Gaming Nest</title>
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
			<div class="panel large width-8">
				<?php foreach ($stories2 as $s) { ?>
        		<div class="imageHolder">
        		<img src="<?= $s->img_url ?>" />
				</div>
				<div class="content">
				<h2>
					<a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a>
				</h2>
				<p><?= $s-> author_id ?></p>
				</div>
    			<?php } ?>
			</div>
			
			<div class="width-4">
				<?php foreach ($stories1 as $s) { ?>
        		<div class="panel small">
        		<img src="<?= $s->img_url ?>" />
    
        		<div class="content">
				<h4><a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a></h4>
           		<div class=""><?= substr($s->article,0,200) ?> 
				</div>
        		</div>
        		</div>
    			<?php } ?>
			</div>


			<?php foreach ($stories3 as $s) { ?>
				<div class="width-4 panel medium">
        		<div class="content">
        		<img src="<?= $s->img_url ?>" />
        		<div class="title">
				<h4><a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a></h4>
        		</div>
        		</div>
				</div>
    		<?php } ?>

			<div class="bottom width-4">
			<?php foreach ($stories4 as $s) { ?>
        		<div class="panel mini">
        		<div class="content">
				<h3><a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a></h3>
				<div class="description">
				<p><?= substr($s->article,0,100) ?> </p>
        		</div>
        		</div>
				</div>
    		<?php } ?>
			</div>

			<?php foreach ($stories6 as $s) { ?>
				<div class="width-4 panel medium">
        		<div class="content">
        		<img src="<?= $s->img_url ?>" />
        		<div class="title">
				<h4><a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a></h4>
        		</div>
        		</div>
				</div>
    		<?php } ?>

			<div class="panel large width-12">
			<?php foreach ($stories7 as $s) { ?>
        		<div class="imageHolder">
        		<img src="<?= $s->img_url ?>" />
				</div>
        		<div class="content">
				<h3><a href="single.php?id=<?= $s->id ?>">
						<?= $s->headline ?>
					</a></h3>
        		</div>
    		<?php } ?>
			</div>
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