// Get the modal
var modalpassword = document.getElementById("myModal-password");

// Get the button that opens the modal
var btnpassword = document.getElementById("myBtn-password");

// Get the <span> element that closes the modal
var spanpassword = document.getElementsByClassName("close-password")[0];

// When the user clicks the button, open the modal 
btnpassword.onclick = function() {
  modalpassword.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanpassword.onclick = function() {
  modalpassword.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(eventpassword) {
  if (eventpassword.target == modalpassword) {
    modalpassword.style.display = "none";
  }
}
