<div class="zf-social-links">

	<ul class="social-links__list">
	<li class="social-links__item--facebook">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode( esc_attr( get_the_title() ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link">
		<span class="social-links__text">

			<?php echo zfss_share_get_svg(
				array(
					'icon' => 'facebook',
					'title' => __( 'Facebook', 'zf-social-share' ),
					)
			); ?>

		</span>
	  </a>
	</li>
	<li class="social-links__item--twitter">
		<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php echo urlencode( esc_url( get_permalink( get_the_ID() ) ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link">
		<span class="social-links__text">

			<?php echo zfss_share_get_svg(
				array(
					'icon' => 'twitter',
					'title' => __( 'Twitter', 'zf-social-share' ),
				)
			); ?>

		</span>
	  </a>
	</li>
	<li class="social-links__item--linkedin">
	  <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( esc_url( get_permalink( get_the_ID() ) ) ); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link">
		<span class="social-links__text">

			<?php echo zfss_share_get_svg(
				array(
					'icon' => 'linkedin',
					'title' => __( 'LinkedIn', 'zf-social-share' ),
					)
			); ?>

		</span>
	  </a>
	</li>
</ul>


</div><!--/zf-social-links-->
