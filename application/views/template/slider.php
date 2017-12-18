
<!--Silider-->

<div idd="showcase-row">
  <div class="row-container">
    <div class="container">
        <div class="row">
          <div class="moduletable   span12"><div class="module_container">
              <div id="camera-slideshow_92" class=" camera_wrap pattern_1">

                  <?php foreach($slider as $row){ ?>
                    <div class="camera-item" data-src="<?php echo base_url();?>/upload/<?php echo $row["imag_slide"];?>">
                      <div class="camera_caption fadeIn">
                        <time datetime="2014-05-02 19:56" class="item_published"><?php echo fecha_es($row['date'], "L d F a", TRUE);?></time>
                        <h4 class="slide-title" ><a href='<?php echo $row['url_slide']; ?>'><?php echo $row["title"];?></a></h4>
                        <div style="font-size:20px"><?php echo $row["description"];?></div>       
                      </div>
                    </div>
                  <?php } ?> 
                  <?php //echo date('l, F jS, Y', $article->created_at); ?>
            </div>
            <script>
              jQuery(function(){
                jQuery('#camera-slideshow_92').camera({
                  alignment     : "topCenter", //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                  autoAdvance       : true, //true, false
                  mobileAutoAdvance : true, //true, false. Auto-advancing for mobile devices
                  barDirection      : "leftToRight",  //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                  barPosition       : "bottom", //'bottom', 'left', 'top', 'right'
                  cols              : 6,
                  easing            : "swing",  //for the complete list https://jqueryui.com/demos/effect/easing.html
                  mobileEasing      : "swing",  //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                  fx                : "simpleFade", 
                  mobileFx          : "simpleFade",   //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                  gridDifference    : 250,  //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                  height            : "38.03418803418803%", //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                  imagePath         : '/images/', //the path to the image folder (it serves for the blank.gif, when you want to display videos)
                  hover             : true, //true, false. Puase on state hover. Not available for mobile devices
                  loader            : "none", //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                  loaderColor       : "#eeeeee", 
                  loaderBgColor     : "#222222", 
                  loaderOpacity     : .8, //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                  loaderPadding     : 2,  //how many empty pixels you want to display between the loader and its background
                  loaderStroke      : 7,  //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                  minHeight         : "200px",  //you can also leave it blank
                  navigation        : false,  //true or false, to display or not the navigation buttons
                  navigationHover   : false,  //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be   visible always
                  mobileNavHover    : false,  //same as above, but only for mobile devices
                  opacityOnGrid     : false,  //true, false. Decide to apply a fade effect to blocks and slices: if your slideshow is fullscreen or simply big, I recommend to set it false to have a smoother effect 
                  overlayer         : false,  //a layer on the images to prevent the users grab them simply by clicking the right button of their mouse (.camera_overlayer)
                  pagination        : true,
                  playPause         : false,  //true or false, to display or not the play/pause buttons
                  pauseOnClick      : false,  //true, false. It stops the slideshow when you click the sliders.
                  pieDiameter       : 38,
                  piePosition       : "rightTop", //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                  portrait          : false, //true, false. Select true if you don't want that your images are cropped
                  rows              : 4,
                  slicedCols        : 6,  //if 0 the same value of cols
                  slicedRows        : 4,  //if 0 the same value of rows
                  // slideOn        : "", //next, prev, random: decide if the transition effect will be applied to the current (prev) or the next slide
                  thumbnails        : false,
                  time              : 7000, //milliseconds between the end of the sliding effect and the start of the nex one
                  transPeriod       : 1500  //lenght of the sliding effect in milliseconds
                  // onEndTransition    : function() {  },  //this callback is invoked when the transition effect ends
                  // onLoaded         : function() {  },  //this callback is invoked when the image on a slide has completely loaded
                  // onStartLoading   : function() {  },  //this callback is invoked when the image on a slide start loading
                  // onStartTransition  : function() {  } //this callback is invoked when the transition effect starts
                });
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Silider-->