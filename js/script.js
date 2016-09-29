 function change_visibility(element){
    var next_el = element.nextSibling;
    
    while(next_el && !next_el.id){
       
        if (next_el.className=='hiddenrow') {
            next_el.className='';
        } else {
            next_el.className='hiddenrow';
        }
      next_el = next_el.nextSibling;
    }
 }