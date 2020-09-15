<?php
/**
 * Modified WP_Customize_Upload_Control class to allow handling of images that are not
 * available in the local library.
 * 
 * Use Case: Imported options where images set may not be in local library.
 */

/**
 * Customize Upload Control Class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Media_Control
 * @see WP_Customize_Upload_Control
 * @see WP_Customize_Image_Control
 */
class Bunyad_Customizer_Controls_Image extends WP_Customize_Image_Control 
{	
	use Bunyad_Customizer_Controls_BaseTrait;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @uses WP_Customize_Media_Control::to_json()
	 */
	public function to_json() 
	{
		$this->base_json();

		$value = $this->value();

		if ($value) {
			// Get the attachment model for the existing file.
			$attachment_id = attachment_url_to_postid($value);
			if ($attachment_id) {
				$this->json['attachment'] = wp_prepare_attachment_for_js($attachment_id);
			}
			else {
				
				// image or doc
				$type = in_array(substr($value, -3), array('jpg', 'png', 'gif', 'bmp')) ? 'image' : 'document';
				
				// Replicate variables for an attachment for the media control
				$attachment = array(
					'id'   => 1, 
					'url'  => $value,
					'type' => $type,
					'icon' => wp_mime_type_icon( $type ),
				);
				
				// Add sizes
				if ($type == 'image') {
					$attachment['sizes'] = array('full' => array('url' => $value)); 
				}
					
				$this->json['attachment'] = $attachment;
			}
		}
	}
}
