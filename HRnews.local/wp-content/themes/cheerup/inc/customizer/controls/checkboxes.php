<?php
/**
 * Control for multiple checkboxes.
 */
class Bunyad_Customizer_Controls_Checkboxes extends Bunyad_Customizer_Controls_Base
{
	public $type     = 'checkboxes';
	public $choices  = [];
	public $sortable = false;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() 
	{
		// Special style for 2 columns sortable.
		if ($this->style == 'sortable') {
			$this->style    = 'cols-2';
			$this->classes  = $this->classes . ' bc-sort';
			$this->sortable = true;
		}

		parent::to_json();

		$this->json['value']    = !is_array($this->value()) ? explode(',', $this->value()) : $this->value();
		$this->json['choices']  = $this->choices;
		$this->json['sortable'] = $this->sortable;
	}
	
	/**
	 * Render a JS template
	 */
	public function content_template() 
	{ 

	?>
		<# 
			// To preserve the sort, append saved value first.
			var value = data.value;
			if ( data.sortable && value.length && data.choices instanceof Object ) {
				
				var choices = Object.keys(data.choices).filter(function(v) {
					return value.indexOf(v) === -1; 
				});

				choices = value.concat(choices);
				var sortedChoices = {};
				for (i in choices) {
					var key = choices[i];
					sortedChoices[ key ] = data.choices[ key ];
				}

				data.choices = sortedChoices;
			}
		#>
		
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<div class="customize-control-content">
			<ul>
				<# _.each( data.choices, function( label, choice ) { #>
					<li>
						<label>
							<input type="checkbox" value="{{ choice }}" <# if ( -1 !== data.value.indexOf( choice ) ) { #> checked="checked" <# } #> />
							{{ label }}
						</label>

						<# if ( data.sortable ) { #>
							<span class="dashicons dashicons-menu icon-handle" title="Move"></span>
						<# } #>
					</li>
				<# } ) #>
			</ul>
		</div>
	<?php 
	
	}
}