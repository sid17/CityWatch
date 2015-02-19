function chtype_rep(x)
{
     beepOnce();
    if (x.id=="type1")
    {
        document.getElementById('rep_type_ch').value=1;
     
    }
    else if (x.id=="type2")
    {
        document.getElementById('rep_type_ch').value=2;
      
    }
    else if (x.id=="type3")
    {
        document.getElementById('rep_type_ch').value=3;
    } 
    else if (x.id=="type4")
    {
        document.getElementById('rep_type_ch').value=4;
    }
    else if (x.id=="type5")
    {
        document.getElementById('rep_type_ch').value=5;
    }
}

function update_location()
{
    beepOnce();
    if (document.getElementById('rep_type_ch').value==0)
    {
         $("#afui").popup("Select type of Report");
    } 
    
    document.getElementById('visit_location').value=1;
   
        
}
function update_reporter()
{   
   beepOnce();
    if (document.getElementById('rep_type_ch').value==0)
    {
         $("#afui").popup("Select type of Report");
    } 
    
    document.getElementById('visit_reporter').value=1;
    
}
function update_desc()
{   
     beepOnce();
    if (document.getElementById('rep_type_ch').value==0)
    {
         $("#afui").popup("Select type of Report");
    } 
    
        document.getElementById('visit_desc').value=1;
    
  
}
function update_image()
{   
    beepOnce();
    if (document.getElementById('rep_type_ch').value==0)
    {
         $("#afui").popup("Select type of Report");
    } 
    
    document.getElementById('visit_image').value=1;
   
}
