			<!-- COLUMNA IZQUIERDA-->
				<div class='span3'>
					<div class="moduletable fright  span5___">
						<div class="module_container">
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

						</div>
					</div>
				</div>