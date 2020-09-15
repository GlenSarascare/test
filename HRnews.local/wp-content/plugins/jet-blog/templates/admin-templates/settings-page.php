<?php
/**
 * Main dashboard template
 */
?><div id="jet-blog-settings-page">
	<div class="jet-blog-settings-page">
		<h1 class="cs-vui-title"><?php _e( 'JetBlog Settings', 'jet-blog' ); ?></h1>
		<div class="cx-vui-panel">
			<cx-vui-tabs
				:in-panel="false"
				value="general-settings"
				layout="vertical">

				<?php do_action( 'jet-blog/settings-page-template/tabs-start' ); ?>

				<cx-vui-tabs-panel
					name="general-settings"
					label="<?php _e( 'General settings', 'jet-blog' ); ?>"
					key="general-settings">

					<cx-vui-select
						name="widgets_load_level"
						label="<?php _e( 'Editor Load Level', 'jet-blog' ); ?>"
						description="<?php _e( 'Choose a certain set of options in the widget’s Style tab by moving the slider, and improve your Elementor editor performance by selecting appropriate style settings fill level (from None to Full level)', 'jet-blog' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						size="fullwidth"
						:options-list="pageOptions.widgets_load_level.options"
						v-model="pageOptions.widgets_load_level.value">
					</cx-vui-select>

					<cx-vui-input
						name="youtube_api_key"
						label="<?php _e( 'YouTube API Key', 'jet-blog' ); ?>"
						description="<?php echo sprintf( esc_html__( 'Create own API key %s', 'jet-blog' ), htmlspecialchars( "<a href='https://console.developers.google.com/apis/dashboard' target='_blank'>here</a>", ENT_QUOTES ) );?>"
						:wrapper-css="[ 'equalwidth' ]"
						size="fullwidth"
						v-model="pageOptions.youtube_api_key.value"
					></cx-vui-input>

					<cx-vui-f-select
						name="allow_filter_for"
						label="<?php _e( 'Smart Posts List: allow filters for post types', 'jet-blog' ); ?>"
						description="<?php _e( 'Select post types supports Filter by Terms feature', 'jet-blog' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						size="fullwidth"
						placeholder="<?php _e( 'Select types...', 'jet-blog' ); ?>"
						:multiple="true"
						:options-list="pageOptions.allow_filter_for.options"
						v-model="pageOptions.allow_filter_for.value"
					></cx-vui-f-select>

				</cx-vui-tabs-panel>

				<cx-vui-tabs-panel
					name="available-widgets"
					label="<?php _e( 'Available Widgets', 'jet-blog' ); ?>"
					key="available-widgets">

					<div class="jet-blog-settings-page__disable-all-widgets">
						<div class="cx-vui-component__label">
							<span v-if="disableAllWidgets"><?php _e( 'Disable All Widgets', 'jet-blog' ); ?></span>
							<span v-if="!disableAllWidgets"><?php _e( 'Enable All Widgets', 'jet-blog' ); ?></span>
						</div>

						<cx-vui-switcher
							name="disable-all-avaliable-widgets"
							:prevent-wrap="true"
							:return-true="true"
							:return-false="false"
							@input="disableAllWidgetsEvent"
							v-model="disableAllWidgets">
						</cx-vui-switcher>
					</div>

					<div class="jet-blog-settings-page__avaliable-controls">
						<div
							class="jet-blog-settings-page__avaliable-control"
							v-for="(option, index) in pageOptions.avaliable_widgets.options">
							<cx-vui-switcher
								:key="index"
								:name="`avaliable-widget-${option.value}`"
								:label="option.label"
								:wrapper-css="[ 'equalwidth' ]"
								return-true="true"
								return-false="false"
								v-model="pageOptions.avaliable_widgets.value[option.value]"
							>
							</cx-vui-switcher>
						</div>
					</div>

				</cx-vui-tabs-panel>

				<?php do_action( 'jet-blog/settings-page-template/tabs-end' ); ?>
			</cx-vui-tabs>
		</div>
	</div>
</div>
