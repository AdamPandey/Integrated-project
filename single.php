<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$categoryId = 3;
$stories = Story::findByCategory($categoryId, $options = array('limit' => 5, 'offset' => 0));

// $locationId = 8;
// $stories = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

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
			<div class="width-10">
				<div class="content">
					<h3><a href="#">Transformers: Age of Extinction’ Hits $1 Billion Globally</a></h3>
					<div class="imageHolder">
						<img src="images/16.jpg">
					</div>
					<p class="author">
						BY VINSON CUNNINGHAM, NAOMI FRY, & ALEXANDRA SCHWARTZ
					</p>
					<p>Transformers: Age of Extinction became the first film this year to pass $1 billion at the
						global box office.</p>
					<p>The Michael Bay film is the second picture in the giant robots franchise to hit those lofty
						heights, after 2009’s “Transformers: Dark of the Moon.” The latest “Transformers” was propelled
						by a record-breaking reception in China, where the film has earned north of $300 million, a new
						high-water mark for the world’s second-largest movie market. Its cumulative total includes
						$763.8 million internationally and $241.2 million at the domestic box office.</p>
					<p>For the fourth film in the franchise, Paramount shook things up, upgrading original series star
						Shia LaBeouf for Mark Wahlberg and shooting large parts of the movie in China in order to better
						appeal to that burgeoning market.</p>
					<p>The studio is making sure it doesn’t let its golden goose fly the coop. This week it announced a
						three-year deal extension with Bay and his production company, Platinum Dunes.The fourth
						installment of the Paramount/Hasbro-backed series, once again directed by Michael Bay, is
						believed to possibly become the first film of 2014 to hit $100 million in its box-office debut.
						Overseas, Age of Extinction has already earned $30 million, including record-setting Thursday
						midnight previews in China ($3.5 million) and a stellar $5.5 million Thursday start in Russia,
						the second biggest opening day of all time.</p>
					<p>Read what top critics are saying about Transformers: Age of Extinction:</p>
					<p>The Hollywood Reporter‘s film critic Clarence Tsui says in his review that “there’s a lot of
						state-of-the-art 3D chicanery, and the film is a marked improvement over the wholesale inhuman
						chaos of the last two installments, 2009’s Revenge of the Fallen and 2011’s Dark of the Moon.
						But the bloat of this latest entry — at 165 minutes, the longest of the lot — suggests that
						Michael Bay and his team are struggling to rejuvenate the whole premise. … It has neither the
						first film’s sporadic comedic pleasures born of the interactions between its humans and robots,
						nor does it attain the hyper-sensationalism that makes the second and third installments utterly
						over-the-top showcases of gratuitous demolition.”</p>
					<p>Besides being “dull,” the film includes odd allusions to directors like Stanley Kubrick and John
						Ford, but a few digs at Bay himself for “cheap laughs,” and “even when the action switches to
						Hong Kong — a twist designed to qualify the film for Chinese co-production status and a bigger
						slice of the Asian box-office pie — the noise never abates.” Even more so, Wahlberg’s “troubled
						interactions with Tessa [Peltz] and barbed exchanges with Shane [Reynor] are cliched or
						underwritten, and his ability to morph into a bazooka-wielding warrior (“This alien gun can
						really kick ass!”) limits his register further.” Tucci’s “clownish antics while racing for
						survival in a Hong Kong tenement block are probably the highlight of the film.”</p>

				</div>
			</div>
			<div class="content width-2">
				<h3>More stories</h3>
				<?php foreach ($stories as $s) { ?>
        		<div class="imageHolder">
        		<img src="<?= $s->img_url ?>" />
				<h4><?= $s->headline ?></h4>
           		<div class=""> 
					<h4>Read more<h4>
        		</div>
				<br>
        		</div>
    			<?php } ?>
				</div>

				<!-- <h1>More stories</h1>
				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>
				<h4><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
						Years Later
					</a>
				</h4>
				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>
				<h4><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
						Years Later
					</a>
				</h4>
				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>
				<h4><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
						Years Later
					</a>
				</h4>
				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>
				<h4><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
						Years Later
					</a>
				</h4>
				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>
				<h4><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
						Years Later
					</a>
				</h4> -->
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