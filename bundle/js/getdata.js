 function adddata()
{
            var resp={};
            var locations={};
            resp['lat']=26; 
            resp['lang']=80;
            var query=JSON.stringify(resp);
            console.log(query);
            $.ajax(
            {
            type: 'POST',
            url: 'http://pclub.in/interiit/new2.php',
            data:{mydata: query},
            success: function(data) 
            { 
                var obj=$.parseJSON(data);
                console.log(obj);
                //alert(obj.length);
                var i;
                for (i=0;i<(obj.length);i++)
                {
                    var desc;
                    var image;
                    if (obj[i]['type']==1)
                    {
                        desc="Damaged roads: "+obj[i]['desc'];
                        image="image/map_red.png";
                        console.log("true");
                    }
                    else if (obj[i]['type']==2)
                    {
                        desc="Garbage Dumps: "+obj[i]['desc'];
                       mage="image/map_green.png";
                    }
                    else if (obj[i]['type']==3)
                    {
                        desc="Water Logging: "+obj[i]['desc'];
                       image="image/map_yellow.png";
                    }
                    else if (obj[i]['type']==4)
                    {
                        desc="Sewage Problems: "+obj[i]['desc'];
                        image="image/map_orange.png";
                    }
                    else 
                    {
                        desc="Others: "+obj[i]['desc'];
                       image="image/map_pink.png";
                    }
                    console.log(obj[i]['lat']);
                    addMarker(obj[i]['lat'],obj[i]['lang'],image,desc);
                }
                //alert("done");
                },
            error: function( jqXHR, textStatus ) 
            {
                $("#afui").popup("Request failed:Check your internet connection!");
            },
            });
}
    

                    
                    
                    
                    
                   