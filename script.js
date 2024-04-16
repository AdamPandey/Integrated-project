document.addEventListener("DOMContentLoaded", () => {
    "use strict";

const userId = {
    name: null,
    identity: null,
    image: null,
    message: null,
    date: null
}

const userComment = document.querySelector(".usercomment");
const publishBtn = document.querySelector("#publish");
const comments = document.querySelector(".comments");
const userName = document.querySelector(".user");

userComment.addEventListener("input", e => {
    if (!userComment.value) {
        publishBtn.setAttribute("disabled", "disabled");
        publishBtn.classList.remove("abled");
    }
    else {
        publishBtn.removeAttribute("disabled");
        publishBtn.classList.add("abled");
    }

})

function addPost() {
    console.log("the button works!");
    if (!userComment.value) return;
    userId.name = userName.value;
    if (userId.name === "Anonymous") {
        userId.identity = false;
        userId.image = "anonymous.jpg";
    }
    else {
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

publishBtn.addEventListener("click", addPost);

});

