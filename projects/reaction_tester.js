// Get Random Color
// ****************

function getRandomColor() {
	var letters = "0123456789ABCDEF".split("");
	var color = "#"
	for (var i = 0; i < 6; i++) {
		color += letters[Math.round(Math.random() * 15)];
	}
	return color;
}


// Define Variables
// ****************

var clickedTime;

var createdTime;

var reactionTime;


// Make the boxes with their color, sizes and shapes
// *************************************************

function makeBox() {

	createdTime = Date.now();

	var time = Math.random();

	time = time * 100;

	setTimeout(function() {

		// Define the shape of the box
		// ***************************

		if (Math.random() > 0.5) {

			document.getElementById("box").style.borderRadius = "50%";

		} else {

			document.getElementById("box").style.borderRadius = "0";
			
		}

		// Define the position of the box
		// ******************************

		var top = Math.random();

		top = top * 300;

		var left = Math.random();

		left = left * 500;


		// Define the size of the box
		// **************************

		var height = Math.random();

		height = height * 200;

		var width = Math.random();	

		width = width * 200;
			
		document.getElementById("box").style.top = top + "px";	
		
		document.getElementById("box").style.left = left + "px";

		document.getElementById("box").style.height = height + "px";

		document.getElementById("box").style.width = width + "px";	

		document.getElementById("box").style.backgroundColor = getRandomColor();
		
		document.getElementById("box").style.display="block";

		createdTime = Date.now();

	}, time);

}


// Define the reaction time in seconds
// ***********************************

document.getElementById("box").onclick=function() {
	clickedTime = Date.now();
	// to get from miliseconds to seconds we divide by 1000, 
	// to get the time in seconds
	reactionTime = (clickedTime - createdTime)/1000;
	// alert(reactionTime); 
	document.getElementById("time").innerHTML = reactionTime;
	this.style.display="none";
	makeBox();
}

// Call the function!
// ******************

makeBox();