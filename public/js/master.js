function include(file) { 
  
  var script  = document.createElement('script'); 
  script.src  = file; 
  script.type = 'text/javascript'; 
  script.defer = true; 
  
  document.getElementsByTagName('head').item(0).appendChild(script); 
} 
  
/* Include Many js files */
include('/js/custom-select.js'); 
include('/js/nav.js'); 
include('/js/tabs-service.js'); 
include('/js/active-nav.js'); 
include('/js/slider.js'); 
include('/js/chat.js'); 
include('/js/search.js');
include('/js/modal/edit-account.js');
include('/js/modal/edit-address.js');
include('/js/modal/edit-password.js');
include('/js/modal/edit-equipment.js');
include('/js/scroll-to-top-btn.js');
include('/js/messages/confirm.js');
include('/js/register-form.js');
include('/js/agree.js');



