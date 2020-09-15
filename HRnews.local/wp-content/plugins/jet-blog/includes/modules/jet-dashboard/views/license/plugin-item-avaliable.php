<div
	class="plugin-item plugin-item--avaliable"
>
	<div class="plugin-item__inner">
		<div class="plugin-tumbnail">
			<img :src="pluginData.thumb">
		</div>
		<div class="plugin-info">
			<div class="plugin-name">
				<span class="plugin-label">{{ pluginData.name }}</span>
				<span
					class="plugin-version"
				>
					{{ pluginData.currentVersion }}
				</span>
			</div>

			<p class="plugin-desc">{{ pluginData.desc }}</p>

			<div class="plugin-actions">
				<cx-vui-button
					class="cx-vui-button--style-accent"
					button-style="default"
					size="mini"
					:loading="pluginActionProcessed"
					v-if="installAvaliable"
					@click="installPlugin"
				>
					<span slot="label">
						<span>Install Plugin</span>
					</span>
				</cx-vui-button>
			</div>
		</div>
	</div>
</div>

