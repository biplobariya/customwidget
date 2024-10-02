



<div class="features fea-s-1 grid grid-cols-2 gap-5">
		<div class="features-items">
			<div class="single-feature text-center">
				<h6><?php echo $settings['feature_sub_title'];?></h6>
				<h4><?php echo $settings['feature_title'];?></h4>
				<div class="grid grid-cols-2 gap-5">
				<?php 
					if ( $settings['features_lists'] ) {
						foreach (  $settings['features_lists'] as $featureitem ) {
				?>
					<div class="col-xl-6">
						<div class="feature-box">
							<div class="about-feature-icon">
								<?php \Elementor\Icons_Manager::render_icon( $featureitem['feature_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</div>
							<h5><?php echo $featureitem['feature_item_title']?></h5>
							<p><?php echo $featureitem['feature_item_desc']?></p>
						</div>
					</div>
				<?php 
						}
					}
				?>
				</div>
			</div>
		</div>
		<div class="feature-image">
			<img src="<?php echo $settings['features_image']['url']; ?>" alt="">
		</div>
	</div>