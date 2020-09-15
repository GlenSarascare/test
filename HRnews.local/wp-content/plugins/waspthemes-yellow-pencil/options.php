<?php
/**
 * CSS Properties
 *
 * @author 		WaspThemes
 * @category 	Options
 * @version     1.0
 */

// Don't run this file directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/* ---------------------------------------------------- */
/* All CSS Options and settings							*/
/* ---------------------------------------------------- */
echo "<ul class='editor-panel-list list-active'>
		
		<li class='text-option'>
		
			<h3>Text</h3>
			<div class='yp-this-content'>

				".yp_get_select_markup(
					'font-family',
					'Font Family',
					"google-fonts.json",
					"",
					'Set a font family.'
				)."

				<div class='option-group-class'>
				".yp_get_color_markup(
					'color',
					'Color',
					'Set the text color.'
				)."
							
				".yp_get_select_markup(
					'font-weight',
					'Weight',
					array(
						'300' => 'Light'.' 300',
						'400' => 'normal'.' 400',
						'500' => 'Semi-Bold'.' 500',
						'600' => 'Bold'.' 600',
						'700' => 'Extra-Bold'.' 700'
					),
					"",
					'Sets how thick or thin characters in text should be displayed.'
				)."
				</div>

				".yp_get_slider_markup(
					'font-size',
					'Font Size',
					"",
					1,        // steps
					'8,100',   // px value
					'0,100',  // percentage value
					'1,6',     // Em value
					'Sets the size of a font.'
				)."
				
				".yp_get_slider_markup(
					'line-height',
					'Line Height',
					"",
					0.1,        // steps
					'0,100',   // px value
					'0,100',  // percentage value
					'1,6',     // Em value,
					'Set the leading.'
				)."
				
				<div class='option-group-class option-group-less'>
				".yp_get_radio_markup(
					'font-style',
					'Style',
					array(
						'normal' => 'normal',
						'italic' => 'italic'
					),
					"",
					'Specifies the font style for a text.'
				)."
				
				".yp_get_radio_markup(
					'text-transform',
					'Transform',
					array(
						'none' => 'no',
						'capitalize' => 'Aa',
						'uppercase' => 'AA',
						'lowercase' => 'aa',
					),
					"",
					'Controls the capitalization of text.'					
				)."
				</div>

				<div class='option-group-class option-group-less'>
				".yp_get_radio_markup(
					'text-decoration',
					'Decoration',
					array(
						'none' => 'A',
						'overline' => 'A',
						'line-through' => 'A',
						'underline' => 'A'
					),
					"",
					'Specifies the decoration added to the text.'
				)."

				".yp_get_radio_markup(
					'text-align',
					'Align',
					array(
						'left' => '<span class="dashicons dashicons-editor-alignleft"></span>',
						'center' => '<span class="dashicons dashicons-editor-aligncenter"></span>',
						'right' => '<span class="dashicons dashicons-editor-alignright"></span>',
						'justify' => '<span class="dashicons dashicons-editor-justify"></span>'
					),
					"",
					'Specifies the horizontal alignment of text in an element.'
				)."
				</div>
				
				".yp_get_select_markup(
					'text-shadow',
					'Text Shadow',
					array(
						'none' => 'none',
						'rgba(0, 0, 0, 0.3) 0px 1px 1px' => 'Basic Shadow',
						'rgb(255, 255, 255) 1px 1px 0px, rgb(170, 170, 170) 2px 2px 0px' => 'Shadow Multiple',
						'rgb(255, 0, 0) -1px 0px 0px, rgb(0, 255, 255) 1px 0px 0px' => 'Anaglyph',
						'rgb(255, 255, 255) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px' => 'Emboss',
						'rgb(255, 255, 255) 0px 0px 2px, rgb(255, 255, 255) 0px 0px 4px, rgb(255, 255, 255) 0px 0px 6px, rgb(255, 119, 255) 0px 0px 8px, rgb(255, 0, 255) 0px 0px 12px, rgb(255, 0, 255) 0px 0px 16px, rgb(255, 0, 255) 0px 0px 20px, rgb(255, 0, 255) 0px 0px 24px' => 'Neon',
						'rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px' => 'Outline'
					),
					"",
					'Adds shadow to text.'
				)."

				
				".yp_get_slider_markup(
					'letter-spacing',
					'Letter Spacing',
					"normal",
					0.1,        // steps
					'-5,10',   // px value
					'0,100',  // percentage value
					'-1,3',     // Em value
					'Increases or decreases the space between characters in a text.'
				)."
				
				".yp_get_slider_markup(
					'word-spacing',
					'Word Spacing',
					"normal",
					0.1,        // steps
					'-5,20',   // px value
					'0,100',  // percentage value
					'-1,3',     // Em value,
					'Increases or decreases the white space between words.'
				)."				

				".yp_get_slider_markup(
					'text-indent',
					'Text Indent',
					'',
					1,        // steps
					'-50,50',   // px value
					'-100,100',  // percentage value
					'-15,15',     // Em value
					'Specifies the indentation of the first line in a text-block.'
				)."

				".yp_get_radio_markup(
					'word-wrap',
					'Word Wrap',
					array(
						'normal' => 'normal',
						'break-word' => 'break-word'
					),
					"",
					'Allows long words to be able to be broken and wrap onto the next line.'
				)."
				
			</div>
		</li>
		
		<li class='background-option'>
			<h3>Background</h3>
			<div class='yp-this-content'>
				
				".yp_get_color_markup(
					'background-color',
					'Color',
					'Sets the background color of an element.'
				)."
				
				".yp_get_input_markup(
					'background-image',
					'Image',
					'Sets background image for an element.'
				)."

				".yp_get_radio_markup(
					'background-size',
					'Size',
					array(
						'auto' => 'custom',
						'cover' => 'cover',
						'contain' => 'contain'
					),
					"",
					'The size of the background image.'
				)."

				<div class='option-group-class'>
				".yp_get_select_markup(
					'background-blend-mode',
					'Blend Mode',
					array(
						'normal' => 'normal',
						'multiply' => 'multiply',
						'screen' => 'screen',
						'overlay' => 'overlay',
						'darken' => 'darken',
						'lighten' => 'lighten',
						'color-dodge' => 'color-dodge',
						'saturation' => 'saturation',
						'color' => 'color',
						'luminosity' => 'luminosity'
					),
					"",
					'Defines the blending mode of background color and image.'
				)."

				".yp_get_radio_markup(
					'background-attachment',
					'Fixed',
					array(
						'fixed' => 'fixed',
						'scroll' => 'scroll',
					),
					"",
					'Sets whether a background image is fixed or scrolls with the rest of the page.'
				)."	

				</div>

				".yp_get_slider_markup(
					'background-position-x',
					'Horizontal Position',
					"",
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value,
					'Sets the horizontal starting position of a background image.'
				)."

				".yp_get_slider_markup(
					'background-position-y',
					'Vertical Position',
					"",
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value,
					'Sets the vertical starting position of a background image.'
				)."

				".yp_get_radio_markup(
					'background-repeat',
					'Tile',
					array(
						'repeat' => '<svg focusable="false" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M1 1h4v4H1zm5 0h4v4H6zm5 0h4v4h-4zM1 6h4v4H1zm5 0h4v4H6zm5 0h4v4h-4zM1 11h4v4H1zm5 0h4v4H6zm5 0h4v4h-4z"></path></svg>',
						'repeat-x' => '<svg focusable="false" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M1 6h4v4H1zm5 0h4v4H6zm5 0h4v4h-4z"></path></svg>',
						'repeat-y' => '<svg focusable="false" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M6 1h4v4H6zm0 5h4v4H6zm0 5h4v4H6z"></path></svg>',
						'no-repeat' => '<span class="dashicons dashicons-no-alt"></span>'
					),
					"",
					'Sets if the background image will be repeated.'
				)."	

				".yp_get_radio_markup(
					'background-clip',
					'Clip',
					array(
						'text' => 'text',
						'border-box' => 'border',
						'padding-box' => 'padding'
					),
					"",
					"Defines how far the background should extend within the element."
				)."

			</div>
		</li>
		
		<li class='margin-option'>
			<h3>Margin</h3>
			<div class='yp-this-content'>

				<div class='lock-btn'></div>

				".yp_get_slider_markup(
					'margin-left',
					'Margin Left',
					"auto",
					1,        // steps
					'-50,200',   // px value
					'-100,100',  // percentage value
					'-6,26',     // Em value,
					'Sets the left margin of an element.'
				)."
				
				".yp_get_slider_markup(
					'margin-right',
					'Margin Right',
					"auto",
					1,        // steps
					'-50,200',   // px value
					'-100,100',  // percentage value
					'-6,26',     // Em value
					'Sets the right margin of an element.'
				)."

				".yp_get_slider_markup(
					'margin-top',
					'Margin Top',
					'',
					1,        // steps
					'-50,200',   // px value
					'-100,100',  // percentage value
					'-6,26',     // Em value
					'Sets the top margin of an element.'
				)."
				
				".yp_get_slider_markup(
					'margin-bottom',
					'Margin Bottom',
					'',
					1,        // steps
					'-50,200',   // px value
					'-100,100',  // percentage value
					'-6,26',     // Em value
					'Sets the bottom margin of an element.'
				)."
				
			</div>
		</li>
		
		<li class='padding-option'>
			<h3>Padding</h3>
			<div class='yp-this-content'>
				
				<div class='lock-btn'></div>

				".yp_get_slider_markup(
					'padding-left',
					'Padding Left',
					'',
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value
					'Sets the left padding (space) of an element.'
				)."

				".yp_get_slider_markup(
					'padding-right',
					'Padding Right',
					'',
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value
					'Sets the right padding (space) of an element.'
				)."

				".yp_get_slider_markup(
					'padding-top',
					'Padding Top',
					'',
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value
					'Sets the top padding (space) of an element.'
				)."

				".yp_get_slider_markup(
					'padding-bottom',
					'Padding Bottom',
					'',
					1,        // steps
					'0,200',   // px value
					'0,100',  // percentage value
					'0,26',     // Em value
					'Sets the bottom padding (space) of an element.'
				)."

			</div>
		</li>

		
		<li class='border-option'>
			<h3>Border</h3>
			<div class='yp-this-content'>

				".yp_get_radio_markup(
					'border-type',
					'Border Type',
					array(
						'all' => 'all',
						'top' => 'top',
						'right' => 'right',
						'bottom' => 'bottom',
						'left' => 'left'
					),
					"",
					'Select the border you want to edit.'
				)."
				
				<div class='yp-border-all-section'>

					<div class='option-group-class'>
					".yp_get_color_markup(
						'border-color',
						'Color',
						'Sets the color of an element&#39;s four borders.'
					)."

					".yp_get_radio_markup(
						'border-style',
						'Style',
						array(
							'none' => '<span class="dashicons dashicons-no-alt"></span>',
							'solid' => '',
							'dotted' => '',
							'dashed' => ''
						),
						"",
						'Sets the style of an element&#39;s four borders.'
					)."
					</div>
					
					".yp_get_slider_markup(
						'border-width',
						'Width',
						'',
						1,        // steps
						'0,20',   // px value
						'0,100',  // percentage value
						'0,3',     // Em value
						'Sets the width of an element&#39;s four borders.'
					)."

				</div>
				
				<div class='yp-border-top-section'>

					<div class='option-group-class'>
					".yp_get_color_markup(
						'border-top-color',
						'Color',
						'Sets the color of an element&#39;s top border.'
					)."
					
					".yp_get_radio_markup(
						'border-top-style',
						'Style',
						array(
							'none' => '<span class="dashicons dashicons-no-alt"></span>',
							'solid' => '',
							'dotted' => '',
							'dashed' => ''
						),
						"",
						'Sets the style of an element&#39;s top border.'
					)."
					</div>
					
					".yp_get_slider_markup(
						'border-top-width',
						'Width',
						'',
						1,        // steps
						'0,20',   // px value
						'0,100',  // percentage value
						'0,3',     // Em value
						'Sets the width of an element&#39;s top border.'
					)."

				</div>
				
				<div class='yp-border-right-section'>

					<div class='option-group-class'>
					".yp_get_color_markup(
						'border-right-color',
						'Color',
						'Sets the color of an element&#39;s right border.'
					)."

					".yp_get_radio_markup(
						'border-right-style',
						'Style',
						array(
							'none' => '<span class="dashicons dashicons-no-alt"></span>',
							'solid' => '',
							'dotted' => '',
							'dashed' => ''
						),
						"",
						'Sets the style of an element&#39;s right border.'
					)."
					</div>
					
					".yp_get_slider_markup(
						'border-right-width',
						'Width',
						'',
						1,        // steps
						'0,20',   // px value
						'0,100',  // percentage value
						'0,3',     // Em value
						'Sets the width of an element&#39;s right border.'
					)."

				</div>
				
				
				<div class='yp-border-bottom-section'>
					
					<div class='option-group-class'>
					".yp_get_color_markup(
						'border-bottom-color',
						'Color',
						'Sets the color of an element&#39;s bottom border.'
					)."

					".yp_get_radio_markup(
						'border-bottom-style',
						'Style',
						array(
							'none' => '<span class="dashicons dashicons-no-alt"></span>',
							'solid' => '',
							'dotted' => '',
							'dashed' => ''
						),
						"",
						'Sets the style of an element&#39;s bottom border.'
					)."
					</div>
					
					".yp_get_slider_markup(
						'border-bottom-width',
						'Width',
						'',
						1,        // steps
						'0,20',   // px value
						'0,100',  // percentage value
						'0,3',     // Em value
						'Sets the width of an element&#39;s bottom border.'
					)."

				</div>
				
				
				<div class='yp-border-left-section'>

					<div class='option-group-class'>
					".yp_get_color_markup(
						'border-left-color',
						'Color',
						'Sets the color of an element&#39;s left border.'
					)."

					".yp_get_radio_markup(
						'border-left-style',
						'Style',
						array(
							'none' => '<span class="dashicons dashicons-no-alt"></span>',
							'solid' => '',
							'dotted' => '',
							'dashed' => ''
						),
						"",
						'Sets the style of an element&#39;s left border.'
					)."
					</div>
					
					".yp_get_slider_markup(
						'border-left-width',
						'Width',
						'',
						1,        // steps
						'0,20',   // px value
						'0,100',  // percentage value
						'0,3',     // Em value
						'Sets the width of an element&#39;s left border.'
					)."
				
				</div>
				
			</div>
		</li>
		
		<li class='border-radius-option'>
			<h3>Border Radius</h3>
			<div class='yp-this-content'>
				
				<div class='lock-btn'></div>
				".yp_get_slider_markup(
					'border-top-left-radius',
					'Top Left Radius',
					'',
					"1",        // steps
					'0,50',   // px value
					'0,50',  // percentage value
					'0,6',     // Em value
					'Defines the radius of the top-left corner.'
				)."
				
				".yp_get_slider_markup(
					'border-top-right-radius',
					'Top Right Radius',
					'',
					"1",        // steps
					'0,50',   // px value
					'0,50',  // percentage value
					'0,6',     // Em value
					'Defines the radius of the top-right corner.'
				)."

				".yp_get_slider_markup(
					'border-bottom-left-radius',
					'Bottom Left Radius',
					'',
					"1",        // steps
					'0,50',   // px value
					'0,50',  // percentage value
					'0,6',     // Em value
					'Defines the radius of the bottom-left corner.'
				)."
				
				".yp_get_slider_markup(
					'border-bottom-right-radius',
					'Bottom Right Radius',
					'',
					"1",        // steps
					'0,50',   // px value
					'0,50',  // percentage value
					'0,6',     // Em value
					'Defines the radius of the bottom-right corner.'
				)."
				
			</div>
		</li>
		
		<li class='position-option'>
			<h3>Position</h3>
			<div class='yp-this-content'>

				".yp_get_slider_markup(
					'z-index',
					'Z Index',
					"auto",
					1,        // steps
					'-10,1000',   // px value
					'-10,1000',  // percentage value
					'-10,1000',     // Em value
					'Specifies the stack order of an element. Z index only works on positioned elements (absolute, relative, or fixed).'
				)."	
				
				".yp_get_radio_markup(
					'position',
					'Position',
					array(
						'static' => 'static',
						'relative' => 'relative',
						'absolute' => 'absolute',
						'fixed' => 'fixed',
						'sticky' => 'sticky'
					),
					"",
					'Specifies the type of positioning method used for an element.'
					
				)."
				
				".yp_get_slider_markup(
					'top',
					'Top',
					"auto",
					1,        // steps
					'-200,400',   // px value
					'0,100',  // percentage value
					'-12,12',     // Em value
					'For absolutely: positioned elements, the top property sets the top edge of an element to a unit above/below the top edge of its containing element.<br><br>For relatively: positioned elements, the top property sets the top edge of an element to a unit above/below its normal position.'
				)."

				".yp_get_slider_markup(
					'left',
					'Left',
					"auto",
					1,        // steps
					'-200,400',   // px value
					'0,100',  // percentage value
					'-12,12',     // Em value
					'For absolutely: positioned elements, the left property sets the left edge of an element to a unit to the left/right of the left edge of its containing element.<br><br>For relatively: positioned elements, the left property sets the left edge of an element to a unit to the left/right to its normal position.'
				)."

				".yp_get_slider_markup(
					'bottom',
					'Bottom',
					"auto",
					1,        // steps
					'-200,400',   // px value
					'0,100',  // percentage value
					'-12,12',     // Em value
					'For absolutely: positioned elements, the bottom property sets the bottom edge of an element to a unit above/below the bottom edge of its containing element.<br><br>For relatively: positioned elements, the bottom property sets the bottom edge of an element to a unit above/below its normal position.'
				)."
				
				".yp_get_slider_markup(
					'right',
					'Right',
					"auto",
					1,        // steps
					'-200,400',   // px value
					'0,100',  // percentage value
					'-12,12',     // Em value
					'For absolutely: positioned elements, the right property sets the right edge of an element to a unit to the left/right of the right edge of its containing element.<br><br>For relatively: positioned elements, the right property sets the right edge of an element to a unit to the left/right to its normal position.'
				)."
				
			</div>
		</li>
		
		<li class='size-option'>
			<h3>Size</h3>
			<div class='yp-this-content'>
			
				".yp_get_slider_markup(
					'width',
					'Width',
					"auto",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Sets the width of an element.'
				)."
				
				".yp_get_slider_markup(
					'height',
					'Height',
					"auto",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Sets the height of an element'
				)."

				".yp_get_radio_markup(
					'box-sizing',
					'Box Sizing',
					array(
						'border-box' => 'border',
						'content-box' => 'content'
					),
					false,
					'Defines how the width and height of an element are calculated: should they include padding and borders, or not.'
				)."
				
				".yp_get_slider_markup(
					'min-width',
					'Min Width',
					"initial",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Set the minimum width of an element.'
				)."

				".yp_get_slider_markup(
					'max-width',
					'Max Width',
					"none",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Set the maximum width of an element.'
				)."

				".yp_get_slider_markup(
					'min-height',
					'Min Height',
					"initial",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',    // Em value
					'Set the minimum height of an element.'
				)."
				
				".yp_get_slider_markup(
					'max-height',
					'Max Height',
					"none",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Set the maximum height of an element.'
				)."
				
				
			</div>
		</li>

		<li class='flex-option'>
			<h3>Flexbox</h3>
			<div class='yp-this-content'>

				".yp_get_select_markup(
					'flex-direction',
					'Direction',
					array(
						'row' => 'row',
						'row-reverse' => 'row-reverse',
						'column' => 'column',
						'column-reverse' => 'column-reverse'
					),
					"",
					'Specifies the direction of the flexible items.'
				)."

				".yp_get_radio_markup(
					'flex-wrap',
					'Wrap',
					array(
						'nowrap' => 'nowrap',
						'wrap' => 'wrap',
						'wrap-reverse' => 'wrap-reverse'
					),
					'',
					'Specifies whether the flexible items should wrap or not.'
					
				)."

				".yp_get_select_markup(
					'justify-content',
					'Justify Content',
					array(
						'normal' => 'normal',
						'flex-start' => 'flex-start',
						'flex-end' => 'flex-end',
						'center' => 'center',
						'space-between' => 'space-between',
						'space-around' => 'space-around',
					),
					"",
					'Aligns the flexible container&#39;s items when the items do not use all available space on the main-axis (horizontally).'
				)."


				".yp_get_select_markup(
					'align-items',
					'Align Items',
					array(
						'normal' => 'normal',
						'stretch' => 'stretch',
						'center' => 'center',
						'flex-start' => 'flex-start',
						'flex-end' => 'flex-end',
						'baseline' => 'baseline',
					),
					"",
					'Specifies the default alignment for items inside the flexible container.'
				)."

				".yp_get_select_markup(
					'align-content',
					'Align Content',
					array(
						'normal' => 'normal',
						'stretch' => 'stretch',
						'center' => 'center',
						'flex-start' => 'flex-start',
						'flex-end' => 'flex-end',
						'space-between' => 'space-between',
						'space-around' => 'space-around',
					),
					"",
					'Modifies the behavior of the flex-wrap property. It is similar to align-items, but instead of aligning flex items, it aligns flex lines.'
				)."

				".yp_get_select_markup(
					'align-self',
					'Align Self',
					array(
						'auto' => 'auto',
						'stretch' => 'stretch',
						'center' => 'center',
						'flex-start' => 'flex-start',
						'flex-end' => 'flex-end',
						'baseline' => 'baseline',
					),
					"",
					'Specifies the alignment for the selected item inside the flexible container.'
				)."

				".yp_get_slider_markup(
					'flex-grow',
					'Grow',
					'',
					1,        // steps
					'0,20',   // px value
					'0,20',  // percentage value
					'0,20',     // Em value
					'Specifies how much the item will grow relative to the rest of the flexible items inside the same container.'
				)."

				".yp_get_slider_markup(
					'flex-shrink',
					'Shrink',
					'',
					1,        // steps
					'0,20',   // px value
					'0,20',  // percentage value
					'0,20',     // Em value
					'Specifies how the item will shrink relative to the rest of the flexible items inside the same container.'
				)."

				".yp_get_slider_markup(
					'flex-basis',
					'Basis',
					"auto",
					1,        // steps
					'0,500',   // px value
					'0,100',  // percentage value
					'0,52',     // Em value
					'Specifies the initial length of a flexible item.'
				)."

			</div>
		</li>

		<li class='grid-option'>
			<h3>Grid</h3>
			<div class='yp-this-content'>

				".yp_grid_builder(
					'grid-template-columns',
					'Grid Template Columns',
					'Specifies the number (and the widths) of columns in a grid layout.'
				)."

				".yp_grid_builder(
					'grid-template-rows',
					'Grid Template Rows',
					'Specifies the number (and the heights) of the rows in a grid layout.'
				)."

				<div class='option-group-class'>
				".yp_get_select_markup(
					'justify-items',
					'Justify Items',
					array(
						'stretch' => 'stretch',
						'center' => 'center',
						'start' => 'start',
						'end' => 'end'
					),
					"",
					'Defines how the items will be aligned horizontally in each column.'
				)."

				".yp_get_select_markup(
					'align-items',
					'Align Items',
					array(
						'stretch' => 'stretch',
						'center' => 'center',
						'start' => 'start',
						'end' => 'end'
					),
					"",
					'Defines how the items will be aligned vertically in each row.'
				)."
				</div>

				".yp_get_slider_markup(
					'grid-column-gap',
					'Grid Column Gap',
					'normal',
					1,        // steps
					'0,100',   // px value
					'0,100',  // percentage value
					'0,100',     // Em value
					'Defines the size of the gap between the columns in a grid layout.'
				)."

				".yp_get_slider_markup(
					'grid-row-gap',
					'Grid Row Gap',
					'normal',
					1,        // steps
					'0,100',   // px value
					'0,100',  // percentage value
					'0,100',     // Em value
					'Defines the size of the gap between the rows in a grid layout.'
				)."

			</div>
		</li>
		
		<li class='lists-option'>
			<h3>Lists</h3>
			<div class='yp-this-content'>

				".yp_get_select_markup(
					'list-style-type',
					'List Style Type'
					,array(
						'none' => 'none',
						'disc' => 'disc',
						'circle' => 'circle',
						'decimal' => 'decimal',
						'lower-alpha' => 'lower alpha',
						'upper-alpha' => 'upper alpha',
						'upper-roman' => 'upper roman'
					),
					"",
					'Specifies the type of list-item marker in a list.'
				)."

				".yp_get_input_markup(
					'list-style-image',
					'List Style Image',
					'Replaces the list-item marker with an image.'
				)."

				".yp_get_radio_markup(
					'list-style-position',
					'List Style Position',
					array(
						'inside' => 'inside',
						'outside' => 'outside'
					),
					"",
					'Specifies if the list-item markers should appear inside or outside the content flow.'
				)."	

			</div>
		</li>

		<li class='animation-option'>
			<h3>Animation <span class='yp-badge yp-anim-recording'>Rec</span></h3>
			<div class='yp-this-content'>
				
				";

				// Dev Animation Tools Filter
				$filter_animation_tools = apply_filters( 'yp_animation_tools', TRUE);

				// If animation Generator Open
				if($filter_animation_tools){
					echo "<a class='yp-advanced-link yp-just-desktop yp-add-animation-link'>Create Animation</a>";
				}

				// Default animations
				$animations = array(

					'none' => ['none', 'basic'],
					'pulse' => ['pulse', 'basic'],
					'push' => ['push', 'basic'],
					'bob' => ['bob', 'basic'],
					'pop' => ['pop', 'basic'],

					'bounce' => ['bounce', 'common'],
					'flash' => ['flash', 'common'],
					'rubberBand' => ['rubberBand', 'common'],
					'shake' => ['shake', 'common'],
					'swing' => ['swing', 'common'],
					'tada' => ['tada', 'common'],
					'wobble' => ['wobble', 'common'],
					'wobble-horizontal' => ['wobble-horizontal', 'common'],
					'jello' => ['jello', 'common'],
					'heartBeat' => ['heartBeat', 'common'],
					'spin' => ['spin', 'common'],

					'bounceIn' => ['bounceIn', 'bounce'],
					'bounceInDown' => ['bounceInDown', 'bounce'],
					'bounceInLeft' => ['bounceInLeft', 'bounce'],
					'bounceInRight' => ['bounceInRight', 'bounce'],
					'bounceInUp' => ['bounceInUp', 'bounce'],

					'fadeIn' => ['fadeIn', 'fade'],
					'fadeInDown' => ['fadeInDown', 'fade'],
					'fadeInDownBig' => ['fadeInDownBig', 'fade'],
					'fadeInLeft' => ['fadeInLeft', 'fade'],
					'fadeInLeftBig' => ['fadeInLeftBig', 'fade'],
					'fadeInRight' => ['fadeInRight', 'fade'],
					'fadeInRightBig' => ['fadeInRightBig', 'fade'],
					'fadeInUp' => ['fadeInUp', 'fade'],
					'fadeInUpBig' => ['fadeInUpBig', 'fade'],

					'flip' => ['flip', 'flip'],
					'flipInX' => ['flipInX', 'flip'],
					'flipInY' => ['flipInY', 'flip'],
					'flipOutX' => ['flipOutX', 'flip'],
					'flipOutY' => ['flipOutY', 'flip'],

					'rotateIn' => ['rotateIn', 'rotate'],
					'rotateInDownLeft' => ['rotateInDownLeft', 'rotate'],
					'rotateInDownRight' => ['rotateInDownRight', 'rotate'],
					'rotateInUpLeft' => ['rotateInUpLeft', 'rotate'],
					'rotateInUpRight' => ['rotateInUpRight', 'rotate'],

					'slideInUp' => ['slideInUp', 'slide'],
					'slideInDown' => ['slideInDown', 'slide'],
					'slideInLeft' => ['slideInLeft', 'slide'],
					'slideInRight' => ['slideInRight', 'slide'],

					'zoomIn' => ['zoomIn', 'zoom'],
					'zoomInDown' => ['zoomInDown', 'zoom'],
					'zoomInLeft' => ['zoomInLeft', 'zoom'],
					'zoomInRight' => ['zoomInRight', 'zoom'],
					'zoomInUp' => ['zoomInUp', 'zoom'],

					'spaceInUp' => ['spaceInUp', 'space'],
					'spaceInRight' => ['spaceInRight', 'space'],
					'spaceInDown' => ['spaceInDown', 'space'],
					'spaceInLeft' => ['spaceInLeft', 'space'],

					'hinge' => ['hinge', 'others'],
					'jackInTheBox' => ['jackInTheBox', 'others'],
					'rollIn' => ['rollIn', 'others'],
					'lightSpeedIn' => ['lightSpeedIn', 'others']

				);

				// Add dynamic animations.
				$all_options =  wp_load_alloptions();
				foreach($all_options as $name => $value){
					if(stristr($name, 'yp_anim')){
						$name = str_replace("yp_anim_", "", $name);
						$animations[$name] = array(ucwords(strtolower($name)), "my animations");
					}
				}
				
				echo " ".yp_get_select_markup(
					'animation-name',
					'Animation',
					$animations,
					"",
					'Adds an animation to an element.'
				)."
				
				<div class='option-group-class'>
				".yp_get_select_markup(
					'animation-play',
					'Trigger',
					array(
						'yp_onscreen' => 'onScreen',
						'yp_hover' => 'Hover',
						'yp_click' => 'Click',
						'yp_focus' => 'Focus'
					),
					'',
					'OnScreen: Play animation when element visible on screen.<br><br>Hover: Play animation when mouse on element.<br><br>Click: Play animation when element clicked.<br><br>Focus: Play element when click on a text field.'
				)."
				
				".yp_get_select_markup(
					'--animation-trigger-repeat',
					'Trigger Repeat',
					array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'infinite' => 'infinite'
					),
					'',
					'Specifies the number of times an animation should be played.'
				)."
				</div>

				".yp_get_slider_markup(
					'animation-duration',
					'Duration',
					'',
					0.01,        // steps
					'0,3',   // px value
					'0,3',   // percentage value
					'0,3',   // Em/ms value
					'Defines how long an animation should take to complete one cycle.',
					's,ms'
				)."

				".yp_get_slider_markup(
					'animation-delay',
					'Delay',
					'',
					0.01,        // steps
					'0,3',   // px value
					'0,3',  // percentage value
					'0,3',     // Em/ms value
					'Specifies a delay for the start of an animation.',
					's,ms'
				)."

				".yp_get_select_markup(
					'animation-timing-function',
					'Easing',
					array(
						'ease' => 'ease',
						'linear' => 'linear',
						'ease-in' => 'ease-in',
						'ease-out' => 'ease-out',
						'ease-in-out' => 'ease-in-out'							
					),
					"",
					'Specifies the speed curve of the animation effect.'
				)."

				".yp_get_radio_markup(
					'animation-fill-mode',
					'Animation Fill Mode',
					array(
						'none' => 'none',
						'forwards' => 'forwards',
						'backwards' => 'backwards',
						'both' => 'both',
					),
					"",
					'Sets the state of the end animation when the animation is not running.'
				)."
				
			</div>
		</li>
		
		<li class='box-shadow-option'>
			<h3>Shadow</h3>
			<div class='yp-this-content'>

				".yp_get_radio_markup(
					'box-shadow-inset',
					'Position',
					array(
						'no' => 'outside',
						'inset' => 'inside'
					),
					false,
					'Defines whether the shadow is inside or outside.'
				)."
			
				".yp_get_color_markup(
					'box-shadow-color',
					'Color',
					'Sets color of the shadow.'
				)."
				
				".yp_get_slider_markup(
					'box-shadow-blur-radius',
					'Blur Radius',
					'',
					1,        	// steps
					'0,50',   // px value
					'0,50',  // percentage value
					'0,50',     // Em value
					'Sets blur radius of the shadow.'
				)."
				
				".yp_get_slider_markup(
					'box-shadow-spread',
					'Spread',
					'',
					1,        	// steps
					'-50,100',   // px value
					'-50,100',  // percentage value
					'-50,100',     // Em value
					'Set size of the shadow.'
				)."

				".yp_get_slider_markup(
					'box-shadow-horizontal',
					'Horizontal Length',
					'',
					1,        // steps
					'-50,50',   // px value
					'-50,50',  // percentage value
					'-50,50',     // Em value
					'Sets horizontal length of the shadow.'
				)."
				
				".yp_get_slider_markup(
					'box-shadow-vertical',
					'Vertical Length',
					'',
					1,        	// steps
					'-50,50',   // px value
					'-50,50',  // percentage value
					'-50,50',     // Em value
					'Sets vertical length of the shadow.'
				)."

			</div>
		</li>
		
		<li class='extra-option'>
			<h3>Extra</h3>
			<div class='yp-this-content'>";


				// Transition CSS Filter
			    $transition_status = apply_filters( 'yp_property__transition', TRUE);

			    // Transition is valid
			    if($transition_status){

				    echo "<a class='yp-advanced-link yp-transition-link'>Transition</a>
					<div class='yp-advanced-option'>

					".yp_get_select_markup(
						'transition-property',
						'Type',
						'transition-properties.json',
						"",
						'Specifies the name of the CSS property the transition effect is for (the transition effect will start when the specified CSS property changes).'
					)."

					".yp_get_slider_markup(
						'transition-duration',
						'Duration',
						'',
						0.01,        // steps
						'0,2',   // px value
						'0,2',   // percentage value
						'0,2',   // Em/ms value
						'Specifies how many seconds (s) or milliseconds (ms) a transition effect takes to complete.',
						's,ms'
					)."

					".yp_get_select_markup(
						'transition-timing-function',
						'Easing',
						array(
							'ease' => 'ease',
							'linear' => 'linear',
							'ease-in' => 'ease-in',
							'ease-out' => 'ease-out',
							'ease-in-out' => 'ease-in-out'							
						),
						"",
						'Specifies the speed curve of the transition effect.'
					)."

					</div>";

				}


				// Filter CSS Filter
			    $filter_status = apply_filters( 'yp_property__filter', TRUE);

			    // Filter is valid
			    if($filter_status){

				    echo "<a class='yp-advanced-link yp-filter-link'>Filters</a>
					<div class='yp-advanced-option'>

					".yp_get_slider_markup(
						'blur-filter',
						'Blur',
						'',
						0.01,        // steps
						'0,10',   // px value
						'0,10',  // percentage value
						'0,10',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'brightness-filter',
						'Brightness',
						'',
						0.01,        // steps
						'0,10',   // px value
						'0,10',  // percentage value
						'0,10',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'grayscale-filter',
						'Grayscale',
						'',
						0.01,        // steps
						'0,1',   // px value
						'0,1',  // percentage value
						'0,1',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'contrast-filter',
						'Contrast',
						'',
						0.01,        // steps
						'0,10',   // px value
						'0,10',  // percentage value
						'0,10',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'hue-rotate-filter',
						'Hue Rotate',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'saturate-filter',
						'Saturate',
						'',
						0.01,        // steps
						'0,10',   // px value
						'0,10',  // percentage value
						'0,10',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'sepia-filter',
						'Sepia',
						'',
						0.01,        // steps
						'0,1',   // px value
						'0,1',  // percentage value
						'0,1',     // Em value
						""
					)."

					</div>";

				}

				// Transform CSS Filter
			    $transform_status = apply_filters( 'yp_property__transform', TRUE);

			    // Transform is valid
			    if($transform_status){

				    echo "<a class='yp-advanced-link yp-transform-link'>Transforms</a>
					<div class='yp-advanced-option'>
					".yp_get_slider_markup(
						'scale-transform',
						'Scale',
						'',
						0.01,        // steps
						'0,5',   // px value
						'0,5',  // percentage value
						'0,5',     // Em value
						""
					)."

					".yp_get_slider_markup(
						'rotatex-transform',
						'Rotate X',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."

					".yp_get_slider_markup(
						'rotatey-transform',
						'Rotate Y',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."

					".yp_get_slider_markup(
						'rotatez-transform',
						'Rotate Z',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'translate-x-transform',
						'Translate X',
						'',
						1,        // steps
						'-50,50',   // px value
						'-50,50',  // percentage value
						'-50,50',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'translate-y-transform',
						'Translate Y',
						'',
						1,        // steps
						'-50,50',   // px value
						'-50,50',  // percentage value
						'-50,50',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'skew-x-transform',
						'Skew X',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."
					
					".yp_get_slider_markup(
						'skew-y-transform',
						'skew Y',
						'',
						1,        // steps
						'0,360',   // px value
						'0,360',  // percentage value
						'0,360',     // Em value
						""
					)."

					".yp_get_slider_markup(
						'perspective',
						'Perspective',
						'',
						1,        // steps
						'0,1000',   // px value
						'0,100',  // percentage value
						'0,62',     // Em value
						""
					)."

					</div>";

				}
				
				
				echo "".yp_get_slider_markup(
					'opacity',
					'Opacity',
					'',
					0.01,       // steps
					'0,1',   // px value
					'0,1',  // percentage value
					'0,1',     // Em value
					'Sets the opacity level for an element.'
				)."

				".yp_get_radio_markup(
					'visibility',
					'Visibility',
					array(
						'visible' => '<span class="dashicons dashicons-visibility"></span>',
						'hidden' => '<span class="dashicons dashicons-hidden"></span>'
					),
					"",
					'Specifies whether or not an element is visible.'
				)."

				".yp_get_select_markup(
					'display',
					'Display',
					array(
						'block' => 'block',
						'flex' => 'flex',
						'grid' => 'grid',
						'inline' => 'inline',
						'inline-block' => 'inline-block',
						'inline-flex' => 'inline-flex',
						'inline-grid' => 'inline-grid',
						'table-cell' => 'table-cell',
						'none' => 'none',
					),
					"",
					'Specifies the type of box used for an element.'
				)."

				<div class='option-group-class'>
				".yp_get_select_markup(
					'cursor',
					'Cursor',
					array(
						'auto' => 'auto',
						'alias' => 'alias',
						'all-scroll' => 'All Scroll',
						'copy' => 'Copy',
						'crosshair' => 'CrossHair',
						'grab' => 'Grab',
						'grabbing' => 'Grabbing',
						'help' => 'Help',
						'not-allowed' => 'Not Allowed',
						'pointer' => 'Pointer',
						'progress' => 'Progress',
						'text' => 'Text',
						'wait' => 'Wait',
						'zoom-in' => 'Zoom In',
						'zoom-out' => 'Zoom Out'
					),
					"",
					'Specifies the type of cursor to be displayed when pointing on an element.'
				)."

				".yp_get_radio_markup(
					'pointer-events',
					'Pointer Events',
					array(
						'auto' => 'auto',
						'none' => 'none'
					),
					"",
					'Specifies under what circumstances (if any) a particular graphic element can become the target of mouse events.'
				)."
				</div>

				<div class='option-group-class'>
				".yp_get_radio_markup(
					'float',
					'Float',
					array(
						'none' => 'none',
						'left' => 'left',
						'right' => 'right'
					),
					"",
					'Specifies how an element should float.'
				)."

				".yp_get_radio_markup(
					'clear',
					'Clear',
					array(
						'none' => 'none',
						'both' => 'both'
					),
					"",
					'Specifies what elements can float beside the cleared element and on which side.'
				)."
				</div>

				".yp_get_radio_markup(
					'direction',
					'Direction',
					array(
						'ltr' => '<span class="dashicons dashicons-editor-ltr"></span>',
						'rtl' => '<span class="dashicons dashicons-editor-rtl"></span>'
					),
					"",
					'Specifies the text direction/writing direction within a block-level element.'
				)."
				
				".yp_get_radio_markup(
					'overflow-x',
					'Overflow Horizontal',
					array(
						'visible' => 'visible',
						'hidden' => 'hidden',
						'scroll' => 'scroll',
						'auto' => 'auto'
					),
					"",
					'Specifies what to do with the left/right edges of the content - if it overflows the elements content area.'
				)."
				
				".yp_get_radio_markup(
					'overflow-y',
					'Overflow Vertical',
					array(
						'visible' => 'visible',
						'hidden' => 'hidden',
						'scroll' => 'scroll',
						'auto' => 'auto'
					),
					"",
					'Specifies what to do with the bottom edges of the content - if it overflows the elements content area.'
				)."
				
				
			</div>

		</li>
			
	</ul>";
