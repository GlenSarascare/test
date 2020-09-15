<?php
/**
 * Groups control (container) to contain several other controls
 */
class Bunyad_Customizer_Controls_Group extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Denotes a control with per-device settings
	 */
	public $type = 'group';
	public $group_type = '';
	public $style = 'default';
	public $collapsed = true;

	public function to_json()
	{
		parent::to_json();
		$this->json['group_type'] = $this->group_type;
		$this->json['collapsed']  = $this->collapsed;
	}

	public function content_template()
	{
		?>
		<#
			var renderDesc = 'content';
			if (data.style == 'edit') {
				renderDesc = 'head';
			}
		#>
		<div class="bunyad-cz-group bunyad-cz-group-{{ data.style }} <# if ( ! data.collapsed ) { #>is-active<# } #>">
			<div class="group-head">


				<# if ( data.style === 'collapsible' ) { #>
				
					<button class="head-label">
						<span aria-hidden="true">
							<svg class="hl-arrow" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><g><path fill="none" d="M0,0h24v24H0V0z"></path></g><g><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"></path></g></svg>
						</span>

						<# if ( data.label ) { #>
							<span class="title customize-control-title">{{{ data.label }}}</span>
						<# } #>	

					</button>
				
				<# } else { #>
					
					<div class="head-label">
						<# if ( data.label ) { #>
							<span class="title customize-control-title">{{{ data.label }}}</span>
						<# } #>	
						
						<# if ( renderDesc == 'head') { #>
							<span class="description">{{{ data.description }}}</span>
						<# } #>
					</div>

					<# if ( data.style == 'edit' ) { #>
						<button class="head-edit group-content-toggle" title="<?php echo esc_attr_x('Show Panel', 'Admin', 'cheerup'); ?>">
							<i class="icon dashicons dashicons-edit"></i>
						</button>
					<# } #>

				<# } #>
			</div>

			<div class="group-content">

				<# if ( renderDesc == 'content' && data.description ) { #>
					<span class="description">{{{ data.description }}}</span>
				<# } #>

				<ul class="controls"></ul>

			</div>
		</div>

		<?php
	}
}