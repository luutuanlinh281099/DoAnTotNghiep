<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <title>Test Camera</title>
</head>
<style>
     #camera {
          width: 800px;
          height: 450px;
          border: 2px solid red;
     }

     #image {
          width: 800px;
          height: 450px;
          border: 2px solid black;
     }
</style>

<body>
     <div class="row">
          <p>Camera</p>
          <div id="camera"></div>
          <br />
          <button onclick="take_snapshot()">Chụp ảnh</button>
          <p>Ảnh chụp</p>
          <div id="image"></div>
          <br>
          <button onclick="save_snap()">Lưu ảnh</button>
     </div>
</body>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js "></script>
<script>
     var data_temp;
     Webcam.set({
          width: 800,
          height: 450,
          image_format: "jpeg",
          jpg_quality: 720,
     });
     Webcam.attach("#camera");

     function take_snapshot() {
          Webcam.snap(function(data_image) {
               document.getElementById("image").innerHTML =
                    '<img id="base64image" src="' + data_image + '"/>';
               data_temp = data_image;
          });
     }

     function save_snap() {
          var uriContent = "data:application/octet-stream," + encodeURIComponent(data_temp);
          var newWindow = window.open(uriContent, 'newDocument.txt');
     }
</script>

</html>