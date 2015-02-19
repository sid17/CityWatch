function upload_pic()
{
                                    beepOnce();
                                    var lang= $('.MapLon').val();
                                    var lat=$('.MapLat').val();
                                    var place=document.getElementById('searchbytext').value;
                                    var email=document.getElementById('rep_contain').value;
                                    var fx=email;
                                    var im;
                                    var loc;
                                    var ds=document.getElementById('visit_desc').value;
                                    var z=document.getElementById('desc_contain').value; 
                                    var ls=document.getElementById('visit_location').value;
                                    if (document.getElementById('rep_type_ch').value==0)
                                    {
                                         $("#afui").popup("Select type of Report");
                                    }
    
                                    else if (ls==0 || lang==0 || lat==0)
                                    {
                                    $("#afui").popup("Select a  Location");
                                    }
                                    else if (ds==0 || z=="")
                                    {  
                                        
                                         $("#afui").popup("Enter a Description");
                                    }
                                    else
                                    {
                                        if (document.getElementById('visit_image').value==0 )
                                        {
                                            var r=confirm("Will you like to proceed without an image?");
                                            if (r==true)
                                              {
                                              im=1;
                                               }
                                            else
                                              {
                                              im=0;
                                              }
                                            
                                        }
                                        
                                        if (email=="")
                                        {
                                            fx="Anonymous";
                                        }
                                        if (im!=0 && loc!=0 && ds==1)
                                        {
                            
                                        $("#afui_mask").show();
                                        var obj={};
                                        var as=document.getElementById('rep_type_ch');
                                        var a = document.querySelector('#data-url'); 
                                        var base64Img=a.src;
                                        obj['image']=base64Img;
                                            if (im==1)
                                            {
                                               obj['image']="icons/no_image.jpg"; 
                                            }
                                        obj['user_name']=fx;
                                 obj['lat']=lat;
                                        obj['lang']=lang;
                                        obj['place']=place;
                                        obj['desc']=z;
                                        obj['type']=as.value;
                                        obj['uuid']=intel.xdk.device.uuid;
                                            initialize_stats();
                                            drawPolygon();
                                        obj['zone']=(btnCheckPointExistence_onclick(lat,lang))+1 ;
                                        //alert(obj['zone']);
                                        var nj=JSON.stringify(obj);
                                        $.ajax({
                                                type: 'POST',
                                                url: 'http://pclub.in/interiit/recieve.php',
                                                data:{mydata: nj},
                                                success: function(data) 
                                                { 
                                                   
                                                    console.log(data); 
                                                    document.getElementById('visit_desc').value=0;
                                                    document.getElementById('visit_reporter').value=0;
                                                    document.getElementById('visit_image').value=0;
                                                    document.getElementById('visit_location').value=0;
                                                    document.getElementById('rep_contain').value="";
                                                    document.getElementById('desc_contain').value="";
                                                    $("#afui_mask").hide();
                                                    clear_all_data();
                                                    $("#afui").popup("Posted successfully");
                                                    
                                                },
                                                error: function( jqXHR, textStatus,errorThrown ) 
                                                {
                                                     $("#afui_mask").hide();
                                                     $("#afui").popup("Cannot Post Report.Check Your Internet Connection!");
                                                },
                                          });
                                    }
                                    else
                                    {
                                      $("#afui").popup("EnterValid Entries"); 
                                    }
    }
}


function uploadfeed()
{
    beepOnce();
    var obj={};
    obj['desc']=document.getElementById('feed_text').value;
    var nj=JSON.stringify(obj);
    $("#afui_mask").show();                             
    $.ajax({
    type: 'POST',
    url: 'http://pclub.in/interiit/feed.php',
    data:{mydata: nj},
    success: function(data) 
    { 
    console.log(data); 
    $("#afui_mask").hide();
    $("#afui").popup("Your feedback recieved successfully");
    
    },
    error: function( jqXHR, textStatus,errorThrown ) 
    {
    $("#afui").popup("Failed! Check Your Internet Connection");
    $("#afui_mask").hide();
    },
    });
}
