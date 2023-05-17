<h1><a>gallery</a></h1>
<link rel="stylesheet" type="text/css" href="css\gallery.css">
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image Slider</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

 
    <div class="slider">
      <div class="slides">
 
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
   
        <div class="slide first">
          <img src="fotos\cascade-mountains-range-USMNTNS0720-db9bdf21ee2e47b1868232c551c01006.jpg" alt="">
        </div>
        <div class="slide">
          <img src="fotos\Cuernos_del_Paine_from_Lake_Pehoé.jpg" alt="">
        </div>
        <div class="slide">
          <img src="fotos\rainlook-2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="fotos\Sierra-Nevada-Mountain-Range-USA.jpg" alt="">
        </div>
 
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>

      </div>
  
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
   
    </div>


    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 4000);
    </script>

  </body>
</html>

