						</div>
					</div>
					<!-- COLUMNA DERECHA-->
					<div class='span4'>
					<!-- <?php //echo $video["url_video"];?> -->
						<div class="moduletable fright  span5__">
							<div class="module_container">
								<div class="mod-newsflash-adv news mod-newsflash-adv__fright cols-1" id="module_125">
									<div class="row-fluid">
										<article class="span5 item item_num3 item__module  lastItem" id="item_80">
											<div class="item_content">
												<?php echo $video["url_video"];?>
											</div>
										</article>
									</div>
								</div>

								<?php foreach($category as $row){ ?>
									<header><h3 class="moduleTitle ">
									<span class="item_title_part0 item_title_part_odd item_title_part_first_half item_title_part_first" style="color:#b2223c"><a href="<?php echo base_url("categoria/".$row->url_category); ?>"><?php echo strtoupper($row->name_cat);?></a></span> 					
									</h3></header>
									<div class="mod-newsflash-adv news mod-newsflash-adv__fright cols-1" id="module_125">
									<div class="row-fluid">
										<article class="span5 item item_num3 item__module  lastItem" id="item_80">
											<div class="item_content">	
												<a href="<?php echo base_url("categoria/".$row->url_category); ?>"><img src="<?php echo base_url();?>upload/<?php echo $row->imag_category;?>" alt=""></a>
											</div>
											<p><?php echo $row->description;?></p>
										</article>
									</div>
									</div>
								<?php } ?>

								<?php foreach($publicity as $row){ ?>
								<div class="mod-newsflash-adv news mod-newsflash-adv__fright cols-1" id="module_125">

									<div class="row-fluid">  <article class="span5 item item_num3 item__module  lastItem" id="item_80">
									<div class="item_content">	
									<a href="<?php echo $row->url_publi;?>" target="_new"><img src="<?php echo base_url();?>/upload/<?php echo $row->imag_publi;?>" alt=""></a>
									</div>
										</article>
										</div>
								</div>
								<?php } ?>

							</div>
						</div>
					</div>