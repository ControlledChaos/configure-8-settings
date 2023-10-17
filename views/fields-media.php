<?php
/**
 * Media options fields
 *
 * @package    Configure 8 Options
 * @subpackage Views
 * @since      1.0.0
 */

// Cover image background value.
$cover_bg_default = $this->cover_bg_default();
$cover_bg_color   = $cover_bg_default;
if ( ! empty( $this->getValue( 'cover_bg_color' ) ) ) {
	$cover_bg_color = $this->getValue( 'cover_bg_color' );
}

// Cover image text value.
$cover_text_default = $this->cover_text_default();
$cover_text_color   = $cover_text_default;
if ( ! empty( $this->getValue( 'cover_text_color' ) ) ) {
	$cover_text_color = $this->getValue( 'cover_text_color' );
}
?>

<script>
// Spectrum color pickers.
jQuery(document).ready( function($) {

	// Cover image background.
	$( '#cover_bg_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		palette         : [],
		preferredFormat : "rgb",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#cover_bg_color' ).show();

	$( '#cover_bg_color_default' ).click( function() {
		$( '#cover_bg_color' ).spectrum( 'set', $( '#cover_bg_default' ).val() );
	});

	// Cover image text.
	$( '#cover_text_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		palette         : [],
		preferredFormat : "hex",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#cover_text_color' ).show();

	$( '#cover_text_color_default' ).click( function() {
		$( '#cover_text_color' ).spectrum( 'set', $( '#cover_text_default' ).val() );
	});
});
</script>

<?php echo Bootstrap :: formTitle( [ 'title' => $L->g( 'Media Options' ) ] ); ?>
<fieldset>
	<legend class="screen-reader-text"><?php $L->p( 'Media' ); ?></legend>

	<p><?php $L->p( 'Image upload fields coming for bookmark icon (favicon) and default cover image.' ); ?></p>
</fieldset>

<?php echo Bootstrap :: formTitle( [ 'title' => $L->g( 'Cover Images' ) ] ); ?>
<fieldset>

	<legend class="screen-reader-text"><?php $L->p( 'Cover Images' ); ?></legend>

	<div class="form-field form-group row">
		<label class="form-label col-sm-2 col-form-label" for="cover_bg_color"><?php $L->p( 'Background Color' ); ?></label>
		<div class="col-sm-4 row">
			<input class="color-picker" id="cover_bg_color" name="cover_bg_color" value="<?php echo $cover_bg_color; ?>" />
			<input id="cover_bg_default" type="hidden" value="<?php echo $cover_bg_default; ?>" />
			<span class="btn btn-secondary btn-sm" id="cover_bg_color_default"><?php $L->p( 'Default' ); ?></span>
		</div>
	</div>

	<div class="form-field form-group row">
		<label class="form-label col-sm-2 col-form-label" for="cover_text_color"><?php $L->p( 'Text Color' ); ?></label>
		<div class="col-sm-4 row">
			<input class="color-picker" id="cover_text_color" name="cover_text_color" value="<?php echo $cover_text_color; ?>" />
			<input id="cover_text_default" type="hidden" value="<?php echo $cover_text_default; ?>" />
			<span class="btn btn-secondary btn-sm" id="cover_text_color_default"><?php $L->p( 'Default' ); ?></span>
		</div>
	</div>

	<div class="form-field form-group row">
		<label class="form-label col-sm-2 col-form-label" for="cover_text_shadow"><?php $L->p( 'Text Shadow' ); ?></label>
		<div class="col-sm-4">
			<select class="form-select" id="cover_text_shadow" name="cover_text_shadow">
				<option value="true" <?php echo ( $this->getValue( 'cover_text_shadow' ) === true ? 'selected' : '' ); ?>><?php $L->p( 'Show' ); ?></option>
				<option value="false" <?php echo ( $this->getValue( 'cover_text_shadow' ) === false ? 'selected' : '' ); ?>><?php $L->p( 'Hide' ); ?></option>
			</select>
			<small class="form-text text-muted"><?php $L->p( 'Shadow behind overlay text can provide needed contrast.' ); ?></small>
		</div>
	</div>

	<div class="form-field form-group row">
		<label class="form-label col-sm-2 col-form-label" for="cover_icon"><?php $L->p( 'Down Icon' ); ?></label>
		<div class="col-sm-4">
			<select class="form-select" id="cover_icon" name="cover_icon">

				<option value="angle-down" <?php echo ( $this->getValue( 'cover_icon' ) === 'angle-down' ? 'selected' : '' ); ?>><?php $L->p( 'Angle' ); ?></option>

				<option value="angle-down-light" <?php echo ( $this->getValue( 'cover_icon' ) === 'angle-down-light' ? 'selected' : '' ); ?>><?php $L->p( 'Angle Light' ); ?></option>

				<option value="angles-down" <?php echo ( $this->getValue( 'cover_icon' ) === 'angles-down' ? 'selected' : '' ); ?>><?php $L->p( 'Double Angle' ); ?></option>

				<option value="angles-down-light" <?php echo ( $this->getValue( 'cover_icon' ) === 'angles-down-light' ? 'selected' : '' ); ?>><?php $L->p( 'Double Angle Light' ); ?></option>

				<option value="arrow-down" <?php echo ( $this->getValue( 'cover_icon' ) === 'arrow-down' ? 'selected' : '' ); ?>><?php $L->p( 'Arrow' ); ?></option>

				<option value="arrow-down-light" <?php echo ( $this->getValue( 'cover_icon' ) === 'arrow-down-light' ? 'selected' : '' ); ?>><?php $L->p( 'Arrow Light' ); ?></option>
			</select>
			<small class="form-text text-muted">
				<?php $L->p( 'Choose the style of icon to scroll to content. For full-screen covers only.' ); ?>
			</small>
		</div>
	</div>
</fieldset>
