<?php
/**
 * GDPR and Privacy Info.
 */

$privacy_info = <<<EOF

	<p>CheerUp by itself is compliant with EU GDPR laws and offers a guide and further tools to help your site become compliant.</p>

	<p>We cannot offer legal advice, but we have some exclusive plugins and have added support for relevant plugins. We have created a few helpful guides here:</p>

	<ul>
		<li>- <a href="http://cheerup.theme-sphere.com/documentation/#gdpr-guide" target="_blank"><strong>GDPR Main Guide</strong></a></li>
		<li>- <a href="http://cheerup.theme-sphere.com/documentation/#gdpr-mailchimp" target="_blank">MailChimp Consent</a></li>
		<li>- <a href="http://cheerup.theme-sphere.com/documentation/#gdpr-google-fonts" target="_blank">Google Fonts</a></li>
		<li>- <a href="http://cheerup.theme-sphere.com/documentation/#gdpr-google-analytics" target="_blank">Google Analytics</a></li>
		<li>- <a href="http://cheerup.theme-sphere.com/documentation/#gdpr-cookie-notices" target="_blank">Cookie Notice</a></li>
	</ul>

EOF;

$options['privacy-gdpr'] = [
    'sections' => [
        [
            'id'     => 'eu-gdpr-info',
            'title'  => esc_html_x('EU GDPR & Privacy', 'Admin', 'cheerup'),
            'fields' => [

                [
                    'name' => '',
                    'type' => 'content',
                    'text' => $privacy_info,
                ],
            ], // fields
        ], // section
    ], // sections
];