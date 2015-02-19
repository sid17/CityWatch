function select_zone(a)
{
document.getElementById("zone_type").checked=false;
document.getElementById("zone_desc").checked=false;
document.getElementById("zone_location").checked=false;
beepOnce();
var x=a.id;
var y=x.substr(6);
document.getElementById('zone_child').innerHTML="";
document.getElementById('image_box_zone').style.height=($(window).height())*0.35+'px';
var resp={};
resp['zone']=parseInt(y);
resp['height']=$(window).height()*0.1934;
var query=JSON.stringify(resp);
console.log(query);
$.ajax(
{
type: 'POST',
url: 'http://pclub.in/interiit/review.php',
data:{mydata: query},
success: function(data) 
{ 
  
  $("#zone_child").append(data);
  $("#afui_mask").hide();
   console.log(data); 
   
},
error: function( jqXHR, textStatus ) 
{
   $("#afui").popup("Request failed:Check your internet connection!");
     $("#afui_mask").hide();
},
});
}





function getMyReport()
{
    
    beepOnce();
    document.getElementById('image_box_mine').style.height=($(window).height())*0.35+'px';
    var x=document.getElementById('my_report_get').value;
    if (x==0)
    {
    
var resp={};
resp['uuid']=intel.xdk.device.uuid;
resp['height']=$(window).height()*0.1934;
var query=JSON.stringify(resp);
console.log(query);
$.ajax(
{
type: 'POST',
url: 'http://pclub.in/interiit/mine.php',
data:{mydata: query},
success: function(data) 
{ 
    //document.getElementById('called_recent').value=1; 
  document.getElementById('my_report_get').value=1;
    $("#mine_child").append(data);
   // $("#updateList").html($("#updateList").html()); 
    $("#afui_mask").hide();
    console.log(data); 
   // adddata();
},
error: function( jqXHR, textStatus ) 
{
    $("#afui").popup("Request failed:Check your internet connection!");
     $("#afui_mask").hide();
},
});
}
}




function update_zone(a)
{
    beepOnce();
    console.log(a);
    var jq=$(a);
  //  alert(a.id);
    console.log(a.childNodes[2].innerHTML);
    console.log( a.childNodes[0].childNodes[0].src);
    var x=a.childNodes[1].childNodes[0].childNodes[0].innerHTML;
    var y=a.childNodes[1].childNodes[1].innerHTML;
    document.getElementById('recent_photo_zone').src=a.childNodes[0].childNodes[0].src;
    document.getElementById('recent_locationrep_zone').innerHTML=y;
    document.getElementById('recent_typerep_zone').innerHTML=x;
    document.getElementById('rec_desc_zone').innerHTML=a.childNodes[2].innerHTML;
    console.log(jq.data("lat"));
    console.log(jq.data("time"));
    var loc=document.getElementById('recent_locationrep_zone');
    document.getElementById('my_time_zone').innerHTML=jq.data("time");
    $(loc).data('long', jq.data("long"));
    $(loc).data('lat',jq.data("lat"));
    var set=document.getElementById('zone_info');
    $(set).data('id',(a.id));
    //alert($(set).data('id'));
    
}



function submit_zone()
{
    
    //var checkedValue = $('#zone_desc:checked').val();
    beepOnce();
    var desc,type,location;
    if (document.getElementById('zone_desc').checked)
    desc=1;
    else
    desc=0;
    if (document.getElementById('zone_type').checked)
    type=1;
    else
    type=0;
    if (document.getElementById('zone_location').checked)
    location=1;
    else
    location=0;
    //alert(type);
    //alert(location);
    //alert(desc);
    if ((type+location+desc)==3)
    {
    var set=document.getElementById('zone_info');
    //alert($(set).data('id'));
        
    var resp={};
    resp['id']=$(set).data('id');
    resp['uuid']=intel.xdk.device.uuid;
        var query=JSON.stringify(resp);
console.log(query);
    $.ajax(
    {
    type: 'POST',
    url: 'http://pclub.in/interiit/transfer.php',
    data:{mydata: query},
    success: function(data) 
    { 
        //document.getElementById('called_recent').value=1; 
      if (data==1)
      {
   
          $("#afui").popup("your review was successfully recorded");
          
      }
        else if (data==0)
        {
           
             $("#afui").popup("your cannot review your own comment");
        }
        else
        {
          
        $("#afui").popup(data);
        }
    $("#afui_mask").hide();
    console.log(data); 
      //  alert(data);
       // adddata();
    },
    error: function( jqXHR, textStatus ) 
    {
       $("#afui").popup("Request failed:Check your internet connection!");
         $("#afui_mask").hide();
    },
    });        
            
        
    }
    else
    {
       
        $("#afui").popup("verify report completely");
    }
    
    
    

//frm.Music[i].value
  //    var checkedValue1 = $('#zone_location:checked').val();
    //  var checkedValue2 = $('#zone_type:checked').val();
    //alert(checkedValue2 );
    //  alert(checkedValue1);
    //  alert(checkedValue);
     
}





