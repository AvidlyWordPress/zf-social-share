<div class="zf-social-links">

	<ul class="social-links__list">

	<?php if ( true === get_theme_mod( 'zfss_facebook_checkbox' ) ) : ?>

		<li class="social-links__item social-links__item--facebook">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo rawurlencode( esc_attr( get_the_title() ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link--facebook">

				<?php
				echo zfss_share_get_svg( array(
					'icon'  => 'facebook',
					'title' => __( 'Facebook', 'zf-social-share' ),
				) );
				?>

			</a>
		</li>

	<?php endif; ?>

	<?php if ( true === get_theme_mod( 'zfss_twitter_checkbox' ) ) : ?>

		<li class="social-links__item social-links__item--twitter">
			<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php echo rawurlencode( esc_url( get_permalink( get_the_ID() ) ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link--twitter">

					<?php
					echo zfss_share_get_svg( array(
						'icon'  => 'twitter',
						'title' => __( 'Twitter', 'zf-social-share' ),
					) );
					?>

			</a>
		</li>

	<?php endif; ?>

	<?php if ( true === get_theme_mod( 'zfss_linkedin_checkbox' ) ) : ?>

		<li class="social-links__item social-links__item--linkedin">
			<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( get_permalink( get_the_ID() ) ) ); ?>&amp;title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link--linkedin">

					<?php
					echo zfss_share_get_svg( array(
						'icon'  => 'linkedin',
						'title' => __( 'LinkedIn', 'zf-social-share' ),
					) );
					?>

			</a>
		</li>

	<?php endif; ?>

	<?php if ( true === get_theme_mod( 'zfss_pinterest_checkbox' ) ) : ?>

		<li class="social-links__item social-links__item--pinterest">
			<a data-pin-do="buttonPin" data-pin-custom="true" href="https://www.pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo rawurlencode( esc_url( the_post_thumbnail_url() ) ); ?>&amp;description=<?php echo rawurlencode( esc_attr( get_the_excerpt() ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-links__link--pinterest">

				<?php
				echo zfss_share_get_svg( array(
					'icon'  => 'pinterest',
					'title' => __( 'Pinterest', 'zf-social-share' ),
				) );
				?>

			</a>

		</li>

	<?php endif; ?>

	<?php if ( true === get_theme_mod( 'zfss_email_checkbox' ) ) : ?>

		<li class="social-links__item social-links__item--email" >
			<a href="mailto:?Subject=<?php the_title(); ?>&amp;Body=<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="social-links__link--email">
				<?php
				echo zfss_share_get_svg( array(
					'icon'  => 'envelope-o',
					'title' => __( 'Email', 'zf-social-share' ),
				) );
				?>
			</a>
		</li>

	<?php endif; ?>

</ul>

</div><!--/zf-social-links-->
