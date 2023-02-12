<?php
/**
 * Media Exchange admin-options.
 *
 * @package  media-exchange/includes
 * @since 5.0.3
 */

/**
 * Admin init.
 */
function gcme_admin_init() {
	register_setting( 'gcme_group', 'gcme_name', 'gcme_callback' );
}
add_action( 'admin_init', 'gcme_admin_init' );

/**
 * Admin menu.
 */
function gcme_admin_menu() {
	add_menu_page( 'メディア切替', 'メディア切替', 'edit_theme_options', 'gcme_menu', 'gcme_options_page', 'dashicons-admin-media', 10 );
}
add_action( 'admin_menu', 'gcme_admin_menu' );

/**
 * Create options page.
 */
function gcme_options_page() {
	global $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['settings-updated'] ) ), 'settings_nonce' ) ) {
		$_REQUEST['settings-updated'] = false;
	}
	?>

<div class="wrap">

	<h1 class="wp-heading-inline">メディア切替</h1>

	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade">
			<p><strong>保存しました</strong></p>
		</div>
	<?php endif; ?>

	<aside class="preparation">
		<h2 class="preparation-title">サイト管理者の方へ</h2>
		<p>下準備として<br>
		<?php echo esc_url( get_theme_file_uri( 'mov/' ) ); ?><br>
		に動画ファイルを、<br>
		<?php echo esc_url( get_theme_file_uri( 'images/' ) ); ?><br>
		に画像ファイルを、<em>下記ファイル名で</em>アップロードしておいてください。</p>
		<ul class="file-list">
			<li><em>kumamotokotsu_mov_converted0622.mp4</em>（動画ファイル）</li>
			<li><em>slider-01.jpg</em>（スライダー画像①のファイル）</li>
			<li><em>slider-02.jpg</em>（スライダー画像②のファイル）</li>
			<li><em>slider-03.jpg</em>（スライダー画像③のファイル）</li>
			<li><em>slider-04.jpg</em>（スライダー画像④のファイル）</li>
			<li><em>slider-05.jpg</em>（スライダー画像⑤のファイル）</li>
			<li><em>still-image.jpg</em>（静止画像ファイル）</li>
		</ul>
	</aside>

	<form method="post" action="options.php">
		<?php settings_fields( 'gcme_group' ); ?>
		<?php do_settings_sections( 'gcme_group' ); ?>
		<?php $options = get_option( 'gcme_name' ); ?>

		<fieldset>
			<legend>メディアの表示方法を選択してください</legend>
			<?php
			$radio_options = array(
				'videos'      => array(
					'value' => 'videos',
					'label' => '動画',
				),
				'slick'       => array(
					'value' => 'slick',
					'label' => 'スライダー',
				),
				'still_image' => array(
					'value' => 'still_image',
					'label' => '静止画',
				),
			);
			if ( ! isset( $checked ) ) {
				$checked = '';
			}
			foreach ( $radio_options as $option ) {
				$radio_setting = $options['gcme_radio'];
				$option_value  = $option['value'];
				$option_label  = $option['label'];
				if ( null !== $radio_setting ) {
					if ( $radio_setting === $option_value ) {
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
				} else {
					if ( 'videos' === $option_value ) {
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
				}
				?>
				<label class="gcme-radio">
					<input type="radio" name="gcme_name[gcme_radio]" value="<?php echo esc_attr( $option_value ); ?>" <?php echo esc_attr( $checked ); ?>> <?php echo esc_html( $option_label ); ?>
				</label>
			<?php } ?>
		</fieldset>

		<fieldset>
			<legend>スライダーで表示する画像を選択してください</legend>

			<p><input type="checkbox" id="image01-view" class="image01-view" name="gcme_name[image01_view]" value="1" <?php checked( $options['image01_view'], '1' ); ?>>
			<label for="image01-view">画像①</label></p>

			<p><input type="checkbox" id="image02-view" class="image02-view" name="gcme_name[image02_view]" value="1" <?php checked( $options['image02_view'], '1' ); ?>>
			<label for="image02-view">画像②</label></p>

			<p><input type="checkbox" id="image03-view" class="image03-view" name="gcme_name[image03_view]" value="1" <?php checked( $options['image03_view'], '1' ); ?>>
			<label for="image03-view">画像③</label></p>

			<p><input type="checkbox" id="image04-view" class="image04-view" name="gcme_name[image04_view]" value="1" <?php checked( $options['image04_view'], '1' ); ?>>
			<label for="image04-view">画像④</label></p>

			<p><input type="checkbox" id="image05-view" class="image05-view" name="gcme_name[image05_view]" value="1" <?php checked( $options['image05_view'], '1' ); ?>>
			<label for="image05-view">画像⑤</label></p>
		</fieldset>

		<fieldset>
			<legend>画像にリンクを貼る場合は入力してください</legend>
			<p class="imgurl-description">例えばリンク先を「会社案内」にしたい場合は　company　と記入。</p>

			<p><label>スライダー画像①：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="image01-url" class="image01-url" name="gcme_name[image01_url]" value="<?php echo esc_attr( $options['image01_url'] ); ?>" placeholder="リンク先ページ"></label></p>

			<p><label>スライダー画像②：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="image02-url" class="image02-url" name="gcme_name[image02_url]" value="<?php echo esc_attr( $options['image02_url'] ); ?>" placeholder="リンク先ページ"></label></p>

			<p><label>スライダー画像③：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="image03-url" class="image03-url" name="gcme_name[image03_url]" value="<?php echo esc_attr( $options['image03_url'] ); ?>" placeholder="リンク先ページ"></label></p>

			<p><label>スライダー画像④：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="image04-url" class="image04-url" name="gcme_name[image04_url]" value="<?php echo esc_attr( $options['image04_url'] ); ?>" placeholder="リンク先ページ"></label></p>

			<p><label>スライダー画像⑤：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="image05-url" class="image05-url" name="gcme_name[image05_url]" value="<?php echo esc_attr( $options['image05_url'] ); ?>" placeholder="リンク先ページ"></label></p>

			<p><label>静止画像：<?php echo esc_url( home_url( '/' ) ); ?><input type="text" id="still-image-url" class="still-image-url" name="gcme_name[still_image_url]" value="<?php echo esc_attr( $options['still_image_url'] ); ?>" placeholder="リンク先ページ"></label></p>
		</fieldset>

		<p class="submit">
			<input type="submit" class="button-primary" value="保存する">
		</p>
	</form>

</div>

<?php } ?>
<?php
/**
 * Sanitize and validate input.
 *
 * @param type $input Sanitize.
 */
function gcme_callback( $input ) {
	// radio.
	if ( ! isset( $input['gcme_radio'] ) ) {
		$input['gcme_radio'] = null;
	}

	// checkbox.
	if ( ! isset( $input['image01_view'] ) ) {
		$input['image01_view'] = null;
	} else {
		if ( '1' === $input['image01_view'] ) {
			$input['image01_view'] = '1';
		} else {
			$input['image01_view'] = '0';
		}
	}
	if ( ! isset( $input['image02_view'] ) ) {
		$input['image02_view'] = null;
	} else {
		if ( '1' === $input['image02_view'] ) {
			$input['image02_view'] = '1';
		} else {
			$input['image02_view'] = '0';
		}
	}
	if ( ! isset( $input['image03_view'] ) ) {
		$input['image03_view'] = null;
	} else {
		if ( '1' === $input['image03_view'] ) {
			$input['image03_view'] = '1';
		} else {
			$input['image03_view'] = '0';
		}
	}
	if ( ! isset( $input['image04_view'] ) ) {
		$input['image04_view'] = null;
	} else {
		if ( '1' === $input['image04_view'] ) {
			$input['image04_view'] = '1';
		} else {
			$input['image04_view'] = '0';
		}
	}
	if ( ! isset( $input['image05_view'] ) ) {
		$input['image05_view'] = null;
	} else {
		if ( '1' === $input['image05_view'] ) {
			$input['image05_view'] = '1';
		} else {
			$input['image05_view'] = '0';
		}
	}

	// text.
	if ( isset( $input['image01_url'] ) ) {
		$input['image01_url'] = sanitize_text_field( $input['image01_url'] );
	}
	if ( isset( $input['image02_url'] ) ) {
		$input['image02_url'] = sanitize_text_field( $input['image02_url'] );
	}
	if ( isset( $input['image03_url'] ) ) {
		$input['image03_url'] = sanitize_text_field( $input['image03_url'] );
	}
	if ( isset( $input['image04_url'] ) ) {
		$input['image04_url'] = sanitize_text_field( $input['image04_url'] );
	}
	if ( isset( $input['image05_url'] ) ) {
		$input['image05_url'] = sanitize_text_field( $input['image05_url'] );
	}
	if ( isset( $input['still_image_url'] ) ) {
		$input['still_image_url'] = sanitize_text_field( $input['still_image_url'] );
	}

	return $input;
}
?>
