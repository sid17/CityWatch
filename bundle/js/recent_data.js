function update_recent(a)
{
   beepOnce();
    console.log(a);
    var jq=$(a);
    console.log(a.childNodes[2].innerHTML);
    console.log( a.childNodes[0].childNodes[0].src);
    var x=a.childNodes[1].childNodes[0].childNodes[0].innerHTML;
     var y=a.childNodes[1].childNodes[1].innerHTML;
    document.getElementById('recent_photo').src=a.childNodes[0].childNodes[0].src;
    //document.getElementById('recent_locationrep').innerHTML=x.substring(y+4);
    document.getElementById('recent_locationrep').innerHTML=y;
    document.getElementById('recent_typerep').innerHTML=x;
    document.getElementById('priority').innerHTML= "medium";  
    document.getElementById('rec_desc').innerHTML=a.childNodes[2].innerHTML;
    var status=jq.data("status");
    console.log(jq.data("lat"));
    console.log(jq.data("status"));
    console.log(jq.data("time"));
    if (status==0)
    {
        document.getElementById('priority').innerHTML="Work not yet started"; 
    }
    else if (status==1)
    {
        document.getElementById('priority').innerHTML= "Work in Progress"; 
    }
    else
    {
        document.getElementById('priority').innerHTML= "Work done"; 
    }
    var loc=document.getElementById('recent_locationrep');
    document.getElementById('my_time').innerHTML=jq.data("time");
    $(loc).data('long', jq.data("long"));
    $(loc).data('lat',jq.data("lat"));
    

}


function update_mine(a)
{
    beepOnce();
    console.log(a);
    var jq=$(a);
    console.log(a.childNodes[2].innerHTML);
    console.log( a.childNodes[0].childNodes[0].src);
    var x=a.childNodes[1].childNodes[0].childNodes[0].innerHTML;
     var y=a.childNodes[1].childNodes[1].innerHTML;
    //var y=x.indexOf(" at ");
    //console.log(x.substring(0,y));
    //console.log(x.substring(y+2));
    document.getElementById('recent_photo_mine').src=a.childNodes[0].childNodes[0].src;
    //document.getElementById('recent_locationrep').innerHTML=x.substring(y+4);
    document.getElementById('recent_locationrep_mine').innerHTML=y;
    document.getElementById('recent_typerep_mine').innerHTML=x;
    document.getElementById('priority_mine').innerHTML= "medium";  
    document.getElementById('rec_desc_mine').innerHTML=a.childNodes[2].innerHTML;
    var status=jq.data("status");
    console.log(jq.data("lat"));
    console.log(jq.data("status"));
    console.log(jq.data("time"));
    if (status==0)
    {
        document.getElementById('priority_mine').innerHTML="Work not yet started"; 
    }
    else if (status==1)
    {
        document.getElementById('priority_mine').innerHTML= "Work in Progress"; 
    }
    else
    {
        document.getElementById('priority_mine').innerHTML= "Work done"; 
    }
    var loc=document.getElementById('recent_locationrep_mine');
    document.getElementById('my_time_mine').innerHTML=jq.data("time");
    $(loc).data('long', jq.data("long"));
    $(loc).data('lat',jq.data("lat"));
    

}




