<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$categoryId = 1;
$stories = Story::findByCategory($categoryId, $options = array('limit' => 2, 'offset' => 0));

// $locationId = 8;
// $stories = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

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

				<div class="imageHolder">
					<img src="images/9.jpg">
				</div>

				<div class="content">
					<h3><a href="single.html">OpenAI is adding new watermarks to DALL-E 3</a></h3>

					<div class="authorGenre">
						<p class="author">LESLIE JAMISON</p>
						<p>|</p>
						<p class="genre">PSYCHOLOGY</p>
					</div>
				</div>

			</div>
			
			<div class="width-4">
			<!-- <div class="panel small">
					<img src="images/15.jpg">


					<div class="content">
						<h3><a href="#">8 charts on technology used around the world</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							The concept of Impostor Syndrome has become ubiquitous. Critics, and
							even the idea's originators, question its value.
						</p>

					</div>

			</div>

				<div class="panel small width-4">
					<img src="images/Chotiner-xi-balloon.webp">

					<div class="content">
						<h3><a href="#">Beverly Hills Cop: Axel F Release Date Confirmed For July</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							The concept of Impostor Syndrome has become ubiquitous. Critics, and
							even the idea's originators, question its value.
						</p>

					</div>


				</div> -->
				
				<?php foreach ($stories as $s) { ?>
        		<div class="panel small">
        		<img src="<?= $s->img_url ?>" />
    
        		<div class="content">
				<h4><?= $s->headline ?></h4>
           		<div class=""><?= substr($s->article,0,200) ?> 
				</div>
        		</div>
        		</div>
    			<?php } ?>
				</div>

			<div class="width-4 panel medium">

				<div class="content">
					<img src="images/23.jpg">
					<div class="title">
						<h3><a href="#">Henry Cavill says heading up the Warhammer 40,000 cinematic universe is 'the
							greatest privilege of my professional career'
						</a>
					</h3>
					</div>

					<div class="authorGenre">
						<p class="author">LESLIE JAMISON</p>
						<p>|</p>
						<p class="genre">PSYCHOLOGY</p>
					</div>

				</div>

			</div>

			<div class="width-4 panel medium">

				<div class="content">
					<img src="images/25.jpg">
					<div class="title">
						<h3><a href="#">Suicide Squad: Kill the Justice League review – straddles the brilliant and the banal
						</a>
					</h3>
					</div>
					<div class="authorGenre">
						<p class="author">LESLIE JAMISON</p>
						<p>|</p>
						<p class="genre">PSYCHOLOGY</p>
					</div>


				</div>

			</div>

			<div class="width-4 panel medium">
				<div class="content">
					<img src="images/16.jpg">
					<div class="title">
						<h3><a href="#">'‘Transformers: Age of Extinction’ Hits $1 Billion Globally. “The Biggest, most
							spectacular movie you will see this year”-Michael Bay
						</a>
					</h3>
					</div>
					<div class="authorGenre">
						<p class="author">LESLIE JAMISON</p>
						<p>|</p>
						<p class="genre">PSYCHOLOGY</p>
					</div>
				</div>

			</div>

			<div class="bottom width-4">
				<div class="panel mini">


					<div class="content">
						<h3><a href="#">How Vince McMahon Got TKO’d</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							When Vince McMahon stepped into the New York Stock Exchange on Jan. 23, he was on hand to
							celebrate what was supposed to be a triumph for TKO Group Holdings, the company for which he
							was executive chairman, and the owner of the WWE, the wrestling promotion that McMahon
							turned into a multibillion-dollar business.
						</p>

					</div>


				</div>

				<div class="panel mini width-4">

					<div class="content">
						<h3><a href="#">Local Streaming Startup Zeam Hopes That John Stamos Can Introduce It to a
								Crowded Market (Exclusive)</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							A startup called Zeam is betting that it can, and it plans to use Super Bowl Sunday and
							actor John Stamos to help introduce itself to the market.
						</p>

					</div>


				</div>

				<div class="panel mini width-4">

					<div class="content">
						<h3><a href="#">Health Systems Are Improving Patient Outcomes With AI-Assisted Technology</a>
						</h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							A better approach would be to focus on the opportunities of AI—healthcare being a great
							example. AI could play a tremendous role in reducing clinician burden and improving patient
							experience.
						</p>

					</div>


				</div>

				<div class="panel mini width-4">

					<div class="content">
						<h3><a href="#">Local Streaming Startup Zeam Hopes That John Stamos Can Introduce It to a
								Crowded Market (Exclusive)</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							A startup called Zeam is betting that it can, and it plans to use Super Bowl Sunday and
							actor John Stamos to help introduce itself to the market.
						</p>

					</div>


				</div>

			</div>

			<div class="panel large width-8">

				<div class="mediumstories">
					<div class="smallcontent">
						<img src="images/16.jpg">
						<h3><a href="#">'‘Transformers: Age of Extinction’ Hits $1 Billion Globally. “The Biggest, most
								spectacular movie you will see this year”-Michael Bay</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							The concept of Impostor Syndrome has become ubiquitous. Critics, and
							even the idea's originators, question its value.
						</p>

					</div>

					<div class="smallcontent">
						<img src="images/16.jpg">
						<h3><a href="#">'‘Transformers: Age of Extinction’ Hits $1 Billion Globally. “The Biggest, most
								spectacular movie you will see this year”-Michael Bay</a></h3>

						<div class="authorGenre">
							<p class="author">LESLIE JAMISON</p>
							<p>|</p>
							<p class="genre">PSYCHOLOGY</p>
						</div>

						<p class="description">
							The concept of Impostor Syndrome has become ubiquitous. Critics, and
							even the idea's originators, question its value.
						</p>

					</div>
				</div>

				<div class="imageHolder">
					<img src="images/10.jpg">
				</div>

				<div class="content">
					<h3><a href="#">Tom & Jerry's Critically Panned Live-Action Movie Gets Second Life On Netflix 3
							Years Later</a></h3>

					<div class="authorGenre">
						<p class="author">LESLIE JAMISON</p>
						<p>|</p>
						<p class="genre">PSYCHOLOGY</p>
					</div>
				</div>

				<!-- <p class="description">
						The concept of Impostor Syndrome has become ubiquitous. Critics, and
						even the idea's originators, question its value.
					</p> -->
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



	<!-- Mini Articles -->
	<!-- <section class="miniArticles">
			<div class="container">
				<div class="width-4">
					<div class="content">
						<h3><a href="#">SEX, LOVE, AND THE STATE OF ROM-COM</a></h3>
						<p class="author">
							BY VINSON CUNNINGHAM, NAOMI FRY, & ALEXANDRA SCHWARTZ
						</p>
					</div>
				</div>

				<div class="width-4">
					<div class="content">
						<h3><a href="#">MY FAVOURITE TIMES TO USE INCOGNITO MODE</a></h3>
						<p class="author">BY JADE ORLANDO</p>
					</div>
				</div>

				<div class="width-4">
					<div class="content">
						<h3><a href="#">A G.P.S ROUTE FOR MY ANXIETY</a></h3>
						<p class="author">BY JESSE EISENBERG</p>
					</div>
				</div>

				<div class="width-4">
					<div class="content">
						<h3>
							<a href="#">A NATIONAL EXPERIMENT IN REFUGEE RESETTLEMENT</a>
						</h3>
						<p class="author">BY GERALDO CADAVA</p>
					</div>
				</div>

				<div class="width-4">
					<div class="content">
						<h3><a href="#">WHAT'S BEHIND THE CHINESE SPY BALLOON</a></h3>
						<p class="author">BY ISAAC CHOTINER</p>
					</div>
				</div>

				<div class="width-4">
					<div class="content">
						<h3><a href="#">IS ARTIFICIAL LIGHT POISONING THE PLANET?</a></h3>
						<p class="author">BY ADAM GOPNIK</p>
					</div>
				</div>
			</div>
		</section> -->
</body>

</html>