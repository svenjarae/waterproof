function setActive() {
    
    aObj = document.getElementById('active-nav').getElementsByTagName('a');
    bObj = document.getElementById('active-nav').getElementsByTagName('svg');
    
    for(var i=0;i<aObj.length;i++) { 
      if(document.location.href.indexOf(aObj[i].href)>=0) {
        aObj[i].className='active';

        // if(aObj[i].className.contains('active')){
        //   for(var j=0;j<bObj.length;j++){
        //     bObj[j].style.fill = "white";
        //   }
        // }

      }
    }
  }
  
  window.onload = setActive;

