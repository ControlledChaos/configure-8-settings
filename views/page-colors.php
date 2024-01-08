<?php
/**
 * Color Scheme Reference page
 *
 * @package    Configure 8 Options
 * @subpackage Views
 * @category   Guide page
 * @since      1.0.0
 */

// Access namespaced functions.
use function CFE_Colors\{
	color_schemes,
	default_color_scheme,
	current_color_scheme,
	hex_to_rgb
};

// Access global variables.
global $site;

$schemes = color_schemes();
$default = default_color_scheme();
$current = current_color_scheme();

// Settings page URL.
$settings_page = DOMAIN_ADMIN . 'configure-plugin/' . $this->className();

// Add class class to 'js' to `<body>` if JavaScript is enabled.
echo "<script>var bodyClass = document.body;bodyClass.classList ? bodyClass.classList.add('js') : bodyClass.className += ' js';</script>\n";

?>

<style>
.color-heading {
	margin: 1rem 0 0 0 !important;
	font-size: var( --cfe-admin--color-heading--font-size, 1.625rem );
}
.color-list-heading {
	margin: 1rem 0 0 0 !important;
	font-size: var( --cfe-admin--color-list-heading--font-size, 1.25rem );
}
.color-list {
	list-style: var( --cfe-admin--color-list--list-style, none );
	margin: 1rem 0 0 0 !important;
	padding: 0 !important;
}
.color-list li {
	line-height: var( --cfe-admin--color-list--item--line-height, 1.3 );
}
.color-list-label {
	font-weight: var( --cfe-admin--color-list-value--font-weight, 600 );
}
.color-list-preview {
	display: inline-block;
	vertical-align: middle;
	width: 6rem;
	height: 1em;
	border: var( --cfe-form-element--border );
}
code.select {
	cursor: pointer;
}
</style>

<?php echo Bootstrap :: pageTitle( [ 'title' => $L->g( 'Color Scheme Reference' ), 'element' => 'h1', 'icon' => 'eyedropper' ] ); ?>

<div class="alert alert-primary alert-search-forms" role="alert">
	<p class="m-0"><?php $L->p( "Go to the <a href='{$settings_page}#style'>theme options</a> page." ); ?></p>
</div>

<p><?php $L->p( 'Click any code value to select for copy.' ); ?></p>

<?php
printf(
	'<h2 class="color-heading">%s <a class="reference-link form-tooltip" href="http://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties" target="_blank" rel="noopener noreferrer" title="%s"><span class="fa fa-external-link-square"></span><span class="screen-reader-text">%s</span></a></h2>',
	$L->get( 'CSS Variables' ),
	$L->get( 'Reference on the Mozilla website' ),
	$L->get( 'Reference on the Mozilla website' )
);

printf(
	'<p>%s</p>',
	$L->get( 'The CSS color variables are used universally in the public theme and the admin theme for each color scheme. These variables are redefined in the <code>head</code> section by the various options. The <code>--cfe-</code> prefix refers to the Configure 8 theme.' )
);
printf(
	'<p>%s</p>',
	$L->get( 'To redefine these variables, simply copy the variable and paste it into the relevant custom CSS field, under the <code>:root</code> selector, with its new color.' )
);
printf(
	'<p><span class="color-list-label">%s</span> <code>:root{ --cfe-scheme-color--one: #ffcc00; }</code></p>',
	$L->get( 'Example:' )
);
echo '<hr />';
printf(
	'<p>%s</p>',
	$L->get( 'To use these variables as a value for an element, ID, or class, simply copy the variable and paste it into the relevant custom CSS field following a selector.' )
);
printf(
	'<p><span class="color-list-label">%s</span> <code>.div-class a { color: var( --cfe-scheme-color--three ); }</code></p>',
	$L->get( 'Example:' )
);

printf(
	'<h3 class="color-list-heading">%s</h3>',
	$L->get( 'Light Mode Variables' )
);

echo '<ul class="color-list color-list-light">';
foreach ( $default['light'] as $name => $color ) {
	printf(
		'<li><span class="color-list-label">%s %s:</span> <code class="select">%s</code></li>',
		ucwords( $name ),
		$L->get( 'variable:' ),
		"--cfe-scheme-color--{$name}"
	);
}

printf(
	'<h3 class="color-list-heading">%s</h3>',
	$L->get( 'Dark Mode Variables' )
);

echo '<ul class="color-list color-list-dark">';
foreach ( $default['dark'] as $name => $color ) {
	printf(
		'<li><span class="color-list-label">%s %s:</span> <code class="select">%s</code></li>',
		ucwords( $name ),
		$L->get( 'variable:' ),
		"--cfe-scheme-color--{$name}--dark"
	);
}
?>

<?php printf(
	'<h2 class="color-heading">%s %s</h2>',
	$L->get( 'Current Scheme:' ),
	$current['name']
); ?>

<?php
printf(
	'<h3 class="color-list-heading">%s</h3>',
	$L->get( 'Light Mode Colors' )
);

echo '<ul class="color-list color-list-light">';
foreach ( $current['light'] as $name => $color ) {

	if ( $color ) :
		echo '<li><ul class="color-list color-list-light">';
		printf(
			'<li><span class="color-list-label">%s hex:</span> <code class="select">%s</code></li>',
			ucwords( $name ),
			$color
		);
		printf(
			'<li><span class="color-list-label">%s rgb:</span> <code class="select">%s</code></li>',
			ucwords( $name ),
			hex_to_rgb( $color )
		);
		printf(
			'<li><span class="color-list-label">%s</span> <span class="color-list-preview" style="background-color: %s;"><span class="screen-reader-text">%s</span></span></li>',
			$L->get( 'Preview:' ),
			$color,
			$color
		);
		echo '</ul></li>';
	endif;
}
echo '</ul>';

printf(
	'<h3 class="color-list-heading">%s</h3>',
	$L->get( 'Dark Mode Colors' )
);

echo '<ul class="color-list color-list-dark">';
foreach ( $current['dark'] as $name => $color ) {

	if ( $color ) :
		echo '<li><ul class="color-list color-list-dark">';
		printf(
			'<li><span class="color-list-label">%s hex:</span> <code class="select">%s</code></li>',
			ucwords( $name ),
			$color
		);
		printf(
			'<li><span class="color-list-label">%s rgb:</span> <code class="select">%s</code></li>',
			ucwords( $name ),
			hex_to_rgb( $color )
		);
		printf(
			'<li><span class="color-list-label">%s</span> <span class="color-list-preview" style="background-color: %s;"><span class="screen-reader-text">%s</span></span></li>',
			$L->get( 'Preview:' ),
			$color,
			$color
		);
		echo '</ul></li>';
	endif;
}
echo '</ul>';

?>

<?php
foreach ( $schemes as $scheme => $option ) {

	if ( $this->color_scheme() == $option['slug'] ) {
		continue;
	}

	printf(
		'<h2 class="color-heading">%s</h2>',
		$option['name']
	);

	printf(
		'<h3 class="color-list-heading">%s</h3>',
		$L->get( 'Light Mode Colors' )
	);

	echo '<ul class="color-list color-list-light">';
	foreach ( $option['light'] as $color => $value ) {

		if ( $value ) :
			echo '<li><ul class="color-list color-list-light">';
			printf(
				'<li><span class="color-list-label">%s hex:</span> <code class="select">%s</code></li>',
				ucwords( $color ),
				$value
			);
			printf(
				'<li><span class="color-list-label">%s rgb:</span> <code class="select">%s</code></li>',
				ucwords( $color ),
				hex_to_rgb( $value )
			);
			printf(
				'<li><span class="color-list-label">%s</span> <span class="color-list-preview" style="background-color: %s;"><span class="screen-reader-text">%s</span></span></li>',
				$L->get( 'Preview:' ),
				$value,
				$value
			);
			echo '</ul></li>';
		endif;
	}
	echo '</ul>';

	printf(
		'<h3 class="color-list-heading">%s</h3>',
		$L->get( 'Dark Mode Colors' )
	);

	echo '<ul class="color-list color-list-dark">';
	foreach ( $option['dark'] as $color => $value ) {

		if ( $value ) :
			echo '<li><ul class="color-list color-list-dark">';
			printf(
				'<li><span class="color-list-label">%s hex:</span> <code class="select">%s</code></li>',
				ucwords( $color ),
				$value
			);
			printf(
				'<li><span class="color-list-label">%s rgb:</span> <code class="select">%s</code></li>',
				ucwords( $color ),
				hex_to_rgb( $value )
			);
			printf(
				'<li><span class="color-list-label">%s</span> <span class="color-list-preview" style="background-color: %s;"><span class="screen-reader-text">%s</span></span></li>',
				$L->get( 'Preview:' ),
				$value,
				$value
			);
			echo '</ul></li>';
		endif;
	}
	echo '</ul>';
} ?>

<script>
jQuery(document).ready( function($) {
	$( '.form-tooltip' ).tooltipster({
		distance : 5,
		delay : 150,
		animationDuration : 150,
		theme : 'cfe-tooltips'
	});
});
</script>