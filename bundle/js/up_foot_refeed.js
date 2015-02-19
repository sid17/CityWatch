function updateabfooter1()
{
    beepOnce();
    document.getElementById('option1').href="#main";
}
function updateabfooter2()
{
      beepOnce();
      document.getElementById('option1').href="#ch_report";
    
}
function updateabfooter3()
{
    
     beepOnce();
    document.getElementById('option1').href="#make_report";
   
}

function updateabfooter4()
{
    
     beepOnce();
    document.getElementById('option1').href="#new_recent";
   
}

function updateabfooter5()
{
    
     beepOnce();
    document.getElementById('option1').href="#ch_zone";
   
}


function updateabfooter6()
{
    
     beepOnce();
    document.getElementById('option1').href="#zone_info";
   
}

function controller_recent()
{
beepOnce();
var x=document.getElementById('called_recent').value;
if(x==0)
  {
  
    $("#afui_mask").show();
    document.getElementById('image_box').style.height=($(window).height())*0.35+'px';
    var resp={};
    resp['id']= 0;
    resp['number']=15;
    resp['height']=$(window).height()*0.1934;
    var query=JSON.stringify(resp);
    console.log(query);
    $.ajax(
    {
    type: 'POST',
    url: 'http://pclub.in/interiit/select.php',
    data:{mydata: query},
    success: function(data) 
    { 
          document.getElementById('called_recent').value=1; 
        $("#updateList").append(data);
        $("#updateList").html($("#updateList").html()); 
        $("#afui_mask").hide();
        console.log(data); 
        adddata();
    },
    error: function( jqXHR, textStatus ) 
    {
       $("#afui").popup("Request failed:Check your internet connection!");
         $("#afui_mask").hide();
    },
    });
}
}
