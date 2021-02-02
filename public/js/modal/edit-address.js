// Get the modal
var modalAdd = document.getElementById("myModal-editAdd");

// Get the button that opens the modal
var btnAdd = document.getElementById("myBtn-editAdd");

// Get the <span> element that closes the modal
var spanAdd = document.getElementsByClassName("close-editAdd")[0];

// When the user clicks the button, open the modal 
btnAdd.onclick = function() {
  modalAdd.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanAdd.onclick = function() {
  modalAdd.style.display = "none";
}

//FIX ME: Disturbed by edit-password.js modal function. Why?

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalAdd) {
    modalAdd.style.display = "none";
  }
}
