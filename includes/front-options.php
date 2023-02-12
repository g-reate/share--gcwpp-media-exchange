<?php
/**
 * Media Exchange front-options.
 *
 * @package  media-exchange/includes
 * @since 5.0.3
 */

/**
 * Show front.
 */
function gcme_show_front() {
	$options         = get_option( 'gcme_name' );
	$radio_setting   = $options['gcme_radio'];
	$image01_view    = $options['image01_view'];
	$image02_view    = $options['image02_view'];
	$image03_view    = $options['image03_view'];
	$image04_view    = $options['image04_view'];
	$image05_view    = $options['image05_view'];
	$image01_url     = $options['image01_url'];
	$image02_url     = $options['image02_url'];
	$image03_url     = $options['image03_url'];
	$image04_url     = $options['image04_url'];
	$image05_url     = $options['image05_url'];
	$still_image_url = $options['still_image_url'];
	$poster          = get_theme_file_uri( 'images/slider-01.jpg' );
	$video_src       = get_theme_file_uri( 'mov/kumamotokotsu_mov_converted0622.mp4' );
	$image01_src     = get_theme_file_uri( 'images/slider-01.jpg' );
	$image02_src     = get_theme_file_uri( 'images/slider-02.jpg' );
	$image03_src     = get_theme_file_uri( 'images/slider-03.jpg' );
	$image04_src     = get_theme_file_uri( 'images/slider-04.jpg' );
	$image05_src     = get_theme_file_uri( 'images/slider-05.jpg' );
	$still_image_src = get_theme_file_uri( 'images/still-image.jpg' );

	if ( 'videos' === $radio_setting ) {
		echo '<video autoplay loop id="bgvid" poster="' . esc_url( $poster ) . '">' . "\n";
		echo '<source src="' . esc_url( $video_src ) . '" type="video/mp4">' . "\n";
		echo '<embed src="' . esc_url( $video_src ) . '" width="1280" height="720" type="video/mp4" autoplay="true" controller="true" pluginspage=http://www.apple.com/jp/quicktime/download/">' . "\n";
		echo '</video>';
	} elseif ( 'slick' === $radio_setting ) {
		echo '<div class="main-visual">' . "\n";

		// 画像01.
		if ( '1' === $image01_view ) {
			if ( '' !== $image01_url ) {
				echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $image01_url ) . '">' . "\n";
			}
			echo '<img src="' . esc_url( $image01_src ) . '" alt="">' . "\n";
			if ( '' !== $image01_url ) {
				echo '</a>' . "\n";
			}
		}

		// 画像02.
		if ( '1' === $image02_view ) {
			if ( '' !== $image02_url ) {
				echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $image02_url ) . '">' . "\n";
			}
			echo '<img src="' . esc_url( $image02_src ) . '" alt="">' . "\n";
			if ( '' !== $image02_url ) {
				echo '</a>' . "\n";
			}
		}

		// 画像03.
		if ( '1' === $image03_view ) {
			if ( '' !== $image03_url ) {
				echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $image03_url ) . '">' . "\n";
			}
			echo '<img src="' . esc_url( $image03_src ) . '" alt="">' . "\n";
			if ( '' !== $image03_url ) {
				echo '</a>' . "\n";
			}
		}

		// 画像04.
		if ( '1' === $image04_view ) {
			if ( '' !== $image04_url ) {
				echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $image04_url ) . '">' . "\n";
			}
			echo '<img src="' . esc_url( $image04_src ) . '" alt="">' . "\n";
			if ( '' !== $image04_url ) {
				echo '</a>' . "\n";
			}
		}

		// 画像05.
		if ( '1' === $image05_view ) {
			if ( '' !== $image05_url ) {
				echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $image05_url ) . '">' . "\n";
			}
			echo '<img src="' . esc_url( $image05_src ) . '" alt="">' . "\n";
			if ( '' !== $image05_url ) {
				echo '</a>' . "\n";
			}
		}

		echo '</div>';
	} elseif ( 'still_image' === $radio_setting ) {
			echo '<div class="main-visual">' . "\n";
		if ( '' !== $still_image_url ) {
			echo '<a href="' . esc_url( home_url( '/' ) ) . esc_html( $still_image_url ) . '">' . "\n";
		}
			echo '<img src="' . esc_url( $still_image_src ) . '" alt="">' . "\n";
		if ( '' !== $still_image_url ) {
			echo '</a>' . "\n";
		}
			echo '</div>';
	}
}
