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
            throw new Exception("Story not found");
        }
    }
    else {
        throw new Exception("Missing parameter: Story id");
    }
 
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}


// $stories = Story::findAll($options = array('limit' => 1, 'offset' => 0));
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
	<link rel="stylesheet" href="CSS/single.css" />
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
					
        			<div class="imageHolder">
        				<img src="<?= $story->img_url?>"/>
					</div>
					<br>
					<div class="content">
						<h2>
							<a href="single.php?id=<?= $story->id ?>">
								<?= $story->headline ?>
							</a>
						</h2>
						<br>
						<div class=""><?= $story->article ?>
						<br> 
						<p><?= Author::findById($story->author_id)->first_name . " " . Author::findById($story->author_id)->last_name?></p>
						</div>
					</div>
			</div>
		</div>
	</section>
	<section class="discuss">
		<div class="container">
			<div class="width-12">
			<div class="head">
				<h1>Post a Comment</h1></div>
				<div><span id="comment">0</span> Comments</div>
				<div class="text"><p>Start discussing!</p></div>
				<div class="comments"></div>
				<div class="commentbox">
				<img src="user1.jpg" alt="">
				<div class="content">
					<h2>Comment as: </h2>
					<input type="text" value="Anonymous" class="user">
					<div class="commentinput">
						<input type="text" placeholder="Enter comment" class="usercomment">
						<div class="buttons">
							<button type="submit" disabled id="publish">Publish</button>
						</div>
					</div>
					<p class="policy">This site is protected by reCAPTCHA and the Google <a href="">privacy policy</a> and <a href="">Terms of service</a> apply.</p>
				</div>
			</div>
			</div>
			</div>
		</div>
	</section>

	<script>
		"use strict";

		const userId = {
			name:null,
			identity:null,
			image:null,
			message: null,
			date:null
		}

		const userComment = document.querySelector(".usercomment");
		const publishBtn = document.querySelector("#publish");
		const comments = document.querySelector(".comments");
		const userName = document.querySelector(".user");

		userComment.addEventListener("input", e => {
			if(!userComment.value){
				publishBtn.setAttribute("disabled", "disabled");
				publishBtn.classList.remove("abled");
			}
			else{
				publishBtn.removeAttribute("disabled");
				publishBtn.classList.add("abled");
			}

		})

		function addPost(){
			console.log("the button works!");
			if(!userComment.value) return;
			userId.name = userName.value;
			if(userId.name === "Anonymous"){
				userId.identity = false;
				userId.image = "anonymous.jpg";
			}
			else{
				userId.identity = true;
				userId.image = "user1.jpg";
			}

			userId.message = userComment.value;
			userId.date = new Date().toLocaleString();
			let published = 
			`<div class="parents">
				<img src="${userId.image}"
				<div class="commentcontent">
					<h1>${userId.name}<h1>
					<p>${userId.message}</p>
					<div class="engagements">
						<img src="like.png">
						<img src="share.png">
					</div>
					<span class= "date">${userId.date}</span>
				</div>
			 </div>
			`;

			comments.innerHTML += published;
			userComment.value = "";

			let commentsNum = document.querySelectorAll(".parents").length;
			document.getElementById("comment").textContent = commentsNum; 
		}

		publishBtn.addEventListener("click", addPost)


	</script>

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