<!-- Slider Start -->
<div class="row-fluid featured">
    <div class="span12">
        <div class="header-bottom wrapper">
            <ul id="slider">
            <?php
                $features = mysqli_getAll('caythuoc', 4, 0, true);
                foreach( $features as $key => $val ) : 
            ?>
            	<li>
            		<img src="<?=(isset($val['anh']) && $val['anh'] != '' ? UPLOAD_DIR . $val['anh'] : IMAGES_URL . 'no-logo.png')?>" alt="" />
            		<div>
            			<strong><a href="<?=SITE_URL.'product.php?id='.$val['id'].'&control=idcaythuoc'?>"><?=$val['ten']?></a></strong>
            			<p><?=the_excerpt($val['mota'], 200)?>...</p>
            		</div>
            	</li>
             <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!-- Slider End -->