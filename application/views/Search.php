<!-- COLUMNA MEDIO-->
<div class='span8'>
<div class="moduletable   span7___">

<section class="page-category page-category__history">
		<header class="page_header">
		<h3><span class="item_title_part0 item_title_part_odd item_title_part_first_half item_title_part_first"><?php echo $title; ?></span> </h3>	
		</header>
</section>
	
<div class="items-row__ cols-2 row-0_ row-fluid______">
<?php if(!empty($searching)): ?>
<?php foreach($searching as $row){ ?>
<div classssss='span6 cols-2'>
<article class='item column-2'>
<header class='item_header'>
	<h4 class='item_title'>	<a href='<?php echo site_url("detalle/".$row->url_news); ?>'> 
	<span class='item_title_part0 item_title_part_odd item_title_part_first_half item_title_part_first'><?php echo $row->title;?></span> </a></h4>
</header>		
		
<div class='mod-newsflash-adv news mod-newsflash-adv__fright cols-1' id='module_125'> 
<div class='item_content'>
<b>Escribe:</b> <?php echo $row->redaction;?>  -  <?php echo fecha_es($row->date, "L d F a", TRUE);?>
</div>							
<figure class='item_img img-intro img-intro__left'> 
	<a href='<?php echo site_url("detalle/".$row->url_news); ?>'><img src="<?php echo base_url();?>/upload/<?php echo $row->imag_news;?>" alt=""></a>
</figure>	
	
<div class='item_introtext'><p><?php echo $row->description_short; ?></p>
</div>

</div>
<div id='fb-root'>
    <ul class="list-inline social-colored">
        <li class="empty-text">Compartir:</li>

        <li>
        	<a target="_blank" title="Share on Facebook" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>" rel="nofollow" onclick="popUp = window.open('http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false">
        		<i class="fa fa-facebook-square icon-fb"></i>
        	</a>
        </li>



        <li><a target="_blank" title="Share on Twitter" href="http://twitter.com/share?url=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>" rel="nofollow" onclick="popUp = window.open('http://twitter.com/share?url=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-twitter-square icon-twit"></i></a></li>
        <li><a target="_blank" title="Share on Twitter" href="https://plus.google.com/share?url=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>" rel="nofollow" onclick="popUp = window.open('https://plus.google.com/share?url=<?php echo urlencode(site_url("detalle/".$row->url_news)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-google-plus-square icon-plus"></i></a></li>
    </ul> <!--colored social-->
</div>												
</article>
</div>
<div class="separador"></div>
<?php } ?> 
    <?php else: ?>
        <p>No hay noticias que coincidan con sus criterios de búsqueda</p>
    <?php endif; ?>
</div>
<?php echo $this->pagination->create_links()?>