      var divElement = document.getElementById('viz1555134710541');                    
      var vizElement = divElement.getElementsByTagName('object')[0];                    
      if ( divElement.offsetWidth > 800 ) { 
        vizElement.style.minWidth='1080px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*0.75)+'px';} 
      else if ( divElement.offsetWidth > 500 ) { 
        vizElement.style.minWidth='500px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*0.75)+'px';} 
      else { 
        vizElement.style.minWidth='420px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*1.77)+'px';}
      var scriptElement = document.createElement('script');                    
        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
        vizElement.parentNode.insertBefore(scriptElement, vizElement);                
