                                  <div class='clearfix'>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- FIN VANESSA-->

                            <!-- Content-bottom -->
                            <div id="content-bottom-row" class="row">
                                <div id="content-bottom">
                                </div>
                            </div>

                            <div id="footer-wrapper">

                            <div class="td-pb-span4">
                              <aside class="widget widget_text">      
                              <div class="textwidget"><div style="text-align: center;">
                                <img src="images/logo_viejo_topo_pie.png"  data-recalc-dims="1">
                                </div></div>
                              </aside>    
                            </div>

                            <div class="td-pb-span4">
                              <aside class="widget widget_execphp">
                              <div class="execphpwidget">    <div style="font-size: .85em;border-left: 3px solid #b2223c;padding-left: 1em;">
                                <b>Director General:</b> Carlos Lamas
                                <br>
                                <b>Director Periodístico:</b> Carlos Lamas
                                <br>
                                <b>Contacto:</b> contacto@viejotopo.com
                                  </div>
                                </div>
                              </aside>            
                            </div>
                          </div>
                        </main>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>

    <div id="back-top">
      <a href="#"><span></span> </a>
    </div>

    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.centerIn.js"></script>
    <script>
      jQuery(function($) {
        $('.modal.loginPopup').alwaysCenterIn(window);
      });
    </script>
        <script src="<?php echo base_url(); ?>assets/vane_theme/js/desktop-mobile.js"></script>
        <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.BlackAndWhite.min.js"></script>
    <script>
      (function($, undefined) {
      $.fn.BlackAndWhite_init = function () {
        var selector = $(this);
        selector.not('.touchGalleryLink').BlackAndWhite({
          invertHoverEffect: ".$this->params->get('invertHoverEffect').",
          intensity: 1,
          responsive: true,
          speed: {
              fadeIn: ".$this->params->get('fadeIn').",
              fadeOut: ".$this->params->get('fadeOut')." 
          }
        });
      }
      })(jQuery);
      jQuery(window).load(function($){
        jQuery('.item_img a').each(function(){
          jQuery(this).find('img').not('.lazy').parent().BlackAndWhite_init();
        })
      });
    </script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.fancybox-buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.fancybox-media.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.fancybox-thumbs.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.pep.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/jquery.vide.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vane_theme/js/scripts.js"></script>
 
</body>
</html>