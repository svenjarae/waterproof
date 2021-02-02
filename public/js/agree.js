document.getElementById("submit").disabled = true;
document.getElementById("submit").style.backgroundColor = "grey";

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
        document.getElementById("submit").style.backgroundColor = "#CB6318";
       }
       else  {
        document.getElementById("submit").disabled = true;
        document.getElementById("submit").style.backgroundColor = "grey";
      }

  }