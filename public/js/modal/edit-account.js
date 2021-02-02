// Get the modal
var modalAcc = document.getElementById("myModal-editAcc");

// Get the button that opens the modal
var btnAcc = document.getElementById("myBtn-editAcc");

// Get the <span> element that closes the modal
var spanAcc = document.getElementsByClassName("close-editAcc")[0];

// When the user clicks the button, open the modal 
btnAcc.onclick = function() {
  modalAcc.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanAcc.onclick = function() {
  modalAcc.style.display = "none";
}

//FIX ME: Disturbed by edit-password.js modal function. Why?

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalAcc) {
    modalAcc.style.display = "none";
  }
}
