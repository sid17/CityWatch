var x = 0;
var c=0;
var image;
document.addEventListener("intel.xdk.camera.picture.add",onSuccess); 
document.addEventListener("intel.xdk.camera.picture.busy",onSuccess); 
document.addEventListener("intel.xdk.camera.picture.cancel",onSuccess); 
function capturePhoto() 
{
  beepOnce();
    intel.xdk.camera.takePicture(50,false,"jpg");
}
function import_pic()
{
    beepOnce();
    try
    {
    intel.xdk.camera.importPicture();
    }
    catch(e)
    {
        console.log(e);
    }
    
}
function onSuccess(evt) 
{
    if (evt.success == true)
  {
                                image = document.createElement('img');
                                image.src = intel.xdk.camera.getPictureURL(evt.filename);
                                function convertImgToBase64(url, callback, outputFormat)
                                  {
                                        var canvas = document.createElement('CANVAS');
                                        var ctx = canvas.getContext('2d');
                                        var img = new Image;
                                        img.crossOrigin = 'Anonymous';
                                        img.onload = function()
                                        {
                                            canvas.height = 100;
                                            canvas.width = 100;
                                            ctx.drawImage(img,0,0,200,200);
                                            var dataURL = canvas.toDataURL(outputFormat || 'image/png');
                                            callback.call(this, dataURL);
                                            canvas = null; 
                                        };
                                    img.src = url;
                                    update_image();
                                }
                      
                                convertImgToBase64(image.src, function(base64Img)
                                {
                                    var  bytes = (base64Img.length - 814) / 1.37/1024;
                                    var a = document.querySelector('#data-url');    
                                    a.src =base64Img ;
                           
                                });
                      
  }
  else
    {
        if (evt.message != undefined)
        {
            alert(evt.message);
        }
    else
        {
           
             $("#afui").popup("error capturing picture");
        }
    }

}
         
















                       
