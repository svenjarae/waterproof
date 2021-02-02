  document.querySelector('.confirm-action').addEventListener('submit', function(e) {
    var form = this;
  
    e.preventDefault(); // <--- prevent form from submitting
  
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover!",
        icon: "warning",
        buttons: [
          'No, cancel it!',
          'Yes, I am sure!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          form.submit(); // <--- submit form programmatically
        } else {
          swal("Cancelled", "Your are safe :)", "error");
        }
      })
  });