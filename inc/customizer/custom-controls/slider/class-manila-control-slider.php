<?php
/**
 * Slider Customizer Control
 *
 * @package   Manila
 * @author    Easy WP Hotelier
 * @copyright Copyright (c) 2018, Easy WP Hotelier
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Manila_Customizer_Slider_Control' ) ) :

class Manila_Customizer_Slider_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'slider';

	/**
	 * Slider file type.
	 *
	 * @var string
	 */
	public $file_type = 'image';

	/**
	 * Button labels.
	 *
	 * @var array
	 */
	public $button_labels = array();

	/**
	 * Constructor for Slider control.
	 *
	 * @param \WP_Customize_Manager $manager Customizer instance.
	 * @param string                $id      Control ID.
	 * @param array                 $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );

		$this->button_labels = wp_parse_args( $this->button_labels, array(
			'select'       => esc_html__( 'Select Images', 'manila' ),
			'change'       => esc_html__( 'Modify Slider', 'manila' ),
			'reset'        => esc_html__( 'Reset Slider', 'manila' ),
			'default'      => esc_html__( 'Default', 'manila' ),
			'remove'       => esc_html__( 'Remove', 'manila' ),
			'placeholder'  => esc_html__( 'No images selected', 'manila' ),
			'frame_title'  => esc_html__( 'Select Slider Images', 'manila' ),
			'frame_button' => esc_html__( 'Choose Images', 'manila' ),
		) );
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 */
	protected function content_template() {
		$data = $this->json();
		?>
		<#

		_.defaults( data, <?php echo wp_json_encode( $data ) ?> );
		data.input_id = 'input-' + String( Math.random() );
		#>
			<span class="customize-control-title"><label for="{{ data.input_id }}">{{ data.label }}</label></span>
		<# if ( data.attachments ) { #>
			<div class="manila-slider-attachments">
				<# _.each( data.attachments, function( attachment ) { #>
					<div class="manila-slider-thumbnail-wrapper" data-post-id="{{ attachment.id }}">
						<img class="manila-attachment-thumb" src="{{ attachment.url }}" draggable="false" alt="" />
					</div>
				<#	} ) #>
			</div>
			<# } #>
			<div>
				<button type="button" class="button upload-button" id="manila-modify-slider">{{ data.button_labels.change }}</button>
				<button type="button" class="button" id="manila-reset-slider">{{ data.button_labels.reset }}</button>
			</div>
			<div class="customize-control-notifications"></div>

		<?php
	}

	/**
	 * Don't render any content for this control from PHP.
	 * JS template is doing the work.
	 */
	protected function render_content() {}

	/**
	 * Send the parameters to the JavaScript via JSON.
	 *
	 * @see \WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['label']         = html_entity_decode( $this->label, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$this->json['file_type']     = $this->file_type;
		$this->json['button_labels'] = $this->button_labels;
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$css_uri = MANILA_THEME_URI . 'inc/customizer/custom-controls/slider/';
		$js_uri  = MANILA_THEME_URI . 'inc/customizer/custom-controls/slider/';

		wp_enqueue_script( 'manila-slider', $js_uri . 'slider.js', array( 'jquery', 'customize-base' ), MANILA_THEME_VERSION, true );
		wp_enqueue_style( 'manila-slider', $css_uri . 'slider.css', null, MANILA_THEME_VERSION );
	}
}

endif;
