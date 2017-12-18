<!-- COLUMNA MEDIO-->
<div class='span8'>
<div class="moduletable   span7___">

<article class="page-item page-item__blog page-item__">
	<header class="page-header">
   	<h3>
 	<span class="item_title_part0 item_title_part_odd item_title_part_first_half item_title_part_first"><?php echo $news["title"];?></span> 
	</h3>
	</header>
		<!-- <div class="item_img img-full img-full__left item-image"> -->
		<div class="unknow">
		<span class="lazy_container" style="width: 600px;">
		<span class="lazy_preloader" style="padding-top: 44.042553191489%;"></span>
		<img src="<?php echo base_url();?>upload/<?php echo $news["imag_news"];?>" class="lazy" data-src="<?php echo base_url();?>upload/<?php echo $news["imag_news"];?>" alt="">/>

		</span>
		</div>
		<div class="item_info">
		<dl class="item_info_dl">
			<dt class="article-info-term"></dt>
			<dd>
				<address class="item_createdby"><?php echo $news['redaction'];?>  -  <?php echo fecha_es($news['date'], "L d F a", TRUE);?></address>
			</dd>
		</dl>
		</div>
		<header class="item_header">
		<h4 class="item_title">
		<span class="item_title_part0 item_title_part_odd item_title_part_first_half item_title_part_first"><?php echo $news["description_short"];?></span> 

		<span class="item_title_part8 item_title_part_odd item_title_part_second_half"></span> 
		</h4>	</header>

		<div class="item_fulltext">
			<p>
				<?php echo $news["description_full"];?>
			</p>
		</div>

		<div id="fb-root">
						
			<div class="addthis_toolbox addthis_default_style ">
                <ul class="list-inline social-colored">
                    <li class="empty-text">Compartir:</li>
                    <li>
                    	<a target="_blank" title="Share on Facebook" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[title]=<?php urlencode(site_url($news['title']));?>&amp;p[url]=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-facebook-square icon-fb"></i></a>
                    </li>

                    <li>
                    	<a target="_blank" title="Share on Twitter" href="http://twitter.com/share?url=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('http://twitter.com/share?url=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-twitter-square icon-twit"></i></a></li>
                    <li><a target="_blank" title="Share on Twitter" href="https://plus.google.com/share?url=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('https://plus.google.com/share?url=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-google-plus-square icon-plus"></i></a></li>
                </ul> <!--colored social-->

                <ul>


<?php

$title=urlencode('Title of Your iFrame Tab');

$url=urlencode(site_url("detalle/".$news["url_news"]));

$summary=urlencode('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');

$image=urlencode(site_url('upload/'.$news["imag_news"]));

?>


<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">Insert text or an image here.</a>


                	
                </ul>
			</div>
		</div>

</article>