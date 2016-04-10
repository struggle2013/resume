 function delCfm() { 
        if (!confirm("确认要删除？")) { 
            window.event.returnValue = false; 
        } 
    } 
 function suggestion(email){

      var suggestion= document.getElementById(email);
      if (suggestion.style.display=="none") {
        suggestion.style.display="block";
      }
      else{suggestion.style.display="none";};
    }
