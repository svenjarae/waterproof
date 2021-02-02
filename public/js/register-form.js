document.getElementById("active1").style.fontWeight = "500";
document.getElementById("dot-first").style.backgroundColor = "#123250";


/*---------------------------------------------------------*/
// Function that executes on click of first next button.
function next_step1() {
document.getElementById("first").style.display = "none";
document.getElementById("second").style.display = "block";

document.getElementById("dot-second").style.backgroundColor = "#123250";
document.getElementById("active2").style.fontWeight = "500";

}
// Function that executes on click of first previous button.
function prev_step1() {
document.getElementById("first").style.display = "block";
document.getElementById("second").style.display = "none";

document.getElementById("dot-first").style.backgroundColor = "#123250";
document.getElementById("active1").style.fontWeight = "500";

document.getElementById("dot-second").style.backgroundColor = "#bbb";
document.getElementById("active2").style.fontWeight = "200";
}

// Function that executes on click of second next button.
function next_step2() {
document.getElementById("second").style.display = "none";
document.getElementById("third").style.display = "block";
document.getElementById("dot-third").style.backgroundColor = "#123250";
document.getElementById("active3").style.fontWeight = "500";
}

// Function that executes on click of second previous button.
function prev_step2() {
document.getElementById("third").style.display = "none";
document.getElementById("second").style.display = "block";

document.getElementById("dot-second").style.backgroundColor = "#123250";
document.getElementById("active2").style.fontWeight = "500";

document.getElementById("dot-third").style.backgroundColor = "#bbb";
document.getElementById("active3").style.fontWeight = "200";
}