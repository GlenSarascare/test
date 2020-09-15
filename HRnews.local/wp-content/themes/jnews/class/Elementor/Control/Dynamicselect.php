<?php

namespace JNews\Elementor\Control;

use Elementor\Base_Data_Control;

class Dynamicselect extends Base_Data_Control {
	public function get_type() {
		return 'dynamicselect';
	}

	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
        <div class="elementor-control-field">
            <label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label
                }}}</label>
            <div class="elementor-control-input-wrapper type-select">
                <# if ( 1 < data.multiple ) { #>
                <input id="<?php echo esc_attr( $control_uid ); ?>" type="text" class="tooltip-target input-sortable"
                       title="{{ data.title }}"
                       placeholder="{{ data.placeholder }}"
                       data-retriever="{{ data.retriever }}"
                       data-setting="{{ data.name }}"
                       data-tooltip="{{ data.title }}"
                       data-ajax="{{ data.ajax }}"
                       data-multiple="{{ data.multiple }}"
                       data-nonce="{{ data.nonce }}"/>
                <div class="data-option" style="display: none;">
                    {{ data.options }}
                </div>
                <# } else { #>
                <select id="<?php echo esc_attr( $control_uid ); ?>" class="widefat" data-setting="{{ data.name }}"
                        data-ajax="{{ data.ajax }}" data-nonce="{{ data.nonce }}">
                    <# for ( key in data.options ) { #>
                    <option value="{{ key }}">{{ data.options[ key ] }}</option>
                    <# } #>
                </select>
                <# } #>
            </div>
        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>
        <script type="text/javascript">
            (function ($) {
                window.open_control($('#<?php echo esc_attr( $control_uid ); ?>'));
            })(jQuery);
        </script>
		<?php
	}
}
