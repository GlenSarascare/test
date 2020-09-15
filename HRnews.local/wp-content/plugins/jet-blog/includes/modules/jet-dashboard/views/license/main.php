<div class="jet-dashboard-license-page">
	<div class="ready-for-use-plugins cx-vui-panel">
		<cx-vui-button
			class="license-manager-button"
			button-style="accent"
			size="mini"
			@click="showLicenseManager"
		>
			<span slot="label">License Manager</span>
		</cx-vui-button>

		<div
			class="installed-plugins"
			v-if="installedPluginListVisible"
		>
			<div class="cx-vui-subtitle">Your Installed JetPlugins</div>
			<div class="plugin-list">
				<plugin-item-installed
					v-for="( pluginData, index ) in installedPluginList"
					:key="index"
					:plugin-data="pluginData"
				></plugin-item-installed>
			</div>
		</div>

		<div
			class="avaliable-plugins"
			v-if="avaliablePluginListVisible"
		>
			<div class="cx-vui-subtitle">The following plugins are also included in your license</div>
			<div class="plugin-list">
				<plugin-item-avaliable
					v-for="( pluginData, index ) in avaliablePluginList"
					:key="index"
					:plugin-data="pluginData"
				></plugin-item-avaliable>
			</div>
		</div>
	</div>

	<div
		class="more-plugins"
		v-if="morePluginListVisible"
	>
		<div class="cx-vui-subtitle">Get More Plugins</div>
		<div class="plugin-list--more-plugins">
			<plugin-item-more
				v-for="( pluginData, index ) in morePluginList"
				:key="index"
				:plugin-data="pluginData"
			></plugin-item-more>
		</div>
	</div>

	<transition name="popup">
		<cx-vui-popup
			class="license-activation-popup"
			v-model="licensePopupVisible"
			:header="false"
			:footer="false"
		>
			<div class="license-manager" slot="content">
				<license-item
					:license-data="newlicenseData"
					type="single-item"
				></license-item>
			</div>
		</cx-vui-popup>
	</transition>
	<transition name="popup">
		<cx-vui-popup
			class="license-deactivation-popup"
			v-model="deactivatePopupVisible"
			:footer="false"
			body-width="520px"
		>
			<div slot="title">
				<div class="cx-vui-popup__header-label">JetPlugins License Deactivation</div>
			</div>
			<div slot="content">
				<p>Your license includes several plugins within the package. License deactivation in one plugin disables it in the rest of them. You can manage it through the License Manager.</p>
				<cx-vui-button
					class="show-license-manager"
					button-style="accent"
					size="mini"
					@click="showLicenseManager"
				>
					<span slot="label">License Manager</span>
				</cx-vui-button>
			</div>
		</cx-vui-popup>
	</transition>
	<transition name="popup">
		<cx-vui-popup
			class="update-check-popup"
			v-model="updateCheckPopupVisible"
			:footer="false"
			body-width="520px"
		>
			<div slot="title">
				<div class="cx-vui-popup__header-label">JetPlugin’s Update</div>
			</div>
			<div slot="content">
				<svg width="91" height="100" viewBox="0 0 91 100" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.748 43.3361C20.4863 43.3361 23.4143 38.9426 23.4143 33.336C23.4143 27.7301 20.4863 23.3365 16.748 23.3365C13.0098 23.3365 10.0818 27.7301 10.0818 33.336C10.0818 38.9426 13.0098 43.3361 16.748 43.3361ZM16.748 26.6697C18.3212 26.6697 20.0812 29.5199 20.0812 33.336C20.0812 37.1528 18.3212 40.0022 16.748 40.0022C15.1749 40.0022 13.4149 37.1528 13.4149 33.336C13.4149 29.5199 15.1749 26.6697 16.748 26.6697Z" fill="black"/>
					<path d="M48.4132 43.3361C52.1515 43.3361 55.0795 38.9426 55.0795 33.336C55.0795 27.7301 52.1515 23.3365 48.4132 23.3365C44.675 23.3365 41.747 27.7301 41.747 33.336C41.747 38.9426 44.675 43.3361 48.4132 43.3361ZM48.4132 26.6697C49.9871 26.6697 51.7464 29.5199 51.7464 33.336C51.7464 37.1528 49.9871 40.0022 48.4132 40.0022C46.8401 40.0022 45.0801 37.1528 45.0801 33.336C45.0801 29.5199 46.8401 26.6697 48.4132 26.6697V26.6697Z" fill="black"/>
					<path d="M45.914 100C67.2212 100 83.2537 92.375 89.9115 79.079C90.2007 78.5015 90.1305 77.8088 89.7307 77.3015C89.331 76.7941 88.6741 76.5637 88.0455 76.7094C80.154 78.5427 76.682 74.2094 75.546 72.2648C74.1049 69.6915 73.3687 66.7833 73.4122 63.8346V36.6691C73.4137 26.8467 69.4733 17.4347 62.4751 10.5418C55.477 3.64972 46.0055 -0.1465 36.1839 0.00455508C16.2781 0.307429 0.0823603 17.1066 0.0823603 37.4579V70.0012C0.0960926 73.1375 0.813225 76.2311 2.18035 79.0539C8.18214 91.5823 25.758 100 45.914 100ZM3.4155 37.4579C3.4155 18.9185 18.1381 3.61386 36.2327 3.33769H36.7476C55.1558 3.33769 70.079 18.2609 70.079 36.6691V63.8346C70.0355 67.3699 70.9274 70.8534 72.6638 73.9325C75.2538 78.3543 80.1585 80.8886 85.2639 80.4439C78.3871 90.8003 64.2809 96.6671 45.914 96.6671C27.3074 96.6671 10.5601 88.8336 5.18697 77.6196C4.03498 75.2439 3.42923 72.6409 3.4155 70.0012V37.4579Z" fill="black"/>
					<path d="M16.748 80.0007C21.3484 79.9953 25.0759 76.2678 25.0813 71.6682V63.335C25.0813 62.4142 24.3351 61.668 23.4143 61.668C22.4943 61.668 21.7481 62.4142 21.7481 63.335V71.6682C21.7481 74.4292 19.5098 76.6675 16.748 76.6675C13.9871 76.6675 11.7487 74.4292 11.7487 71.6682V63.335C11.7487 62.4142 11.0026 61.668 10.0818 61.668C9.16171 61.668 8.41559 62.4142 8.41559 63.335V71.6682C8.42093 76.2678 12.1485 79.9953 16.748 80.0007Z" fill="black"/>
					<path d="M50.0802 80.0007C54.6798 79.9953 58.4073 76.2678 58.4134 71.6682V63.335C58.4134 62.4142 57.6665 61.668 56.7465 61.668C55.8256 61.668 55.0795 62.4142 55.0795 63.335V71.6682C55.0795 74.4292 52.8412 76.6675 50.0802 76.6675C47.3185 76.6675 45.0801 74.4292 45.0801 71.6682V63.335C45.0801 62.4142 44.334 61.668 43.4139 61.668C42.4931 61.668 41.747 62.4142 41.747 63.335V71.6682C41.7523 76.2678 45.4799 79.9953 50.0802 80.0007V80.0007Z" fill="black"/>
					<path d="M26.1631 49.8971C26.5773 50.0528 27.0366 50.0367 27.4387 49.8529C27.8415 49.6698 28.155 49.3333 28.3091 48.9191C28.5891 48.1539 29.0095 47.4474 29.5473 46.8356C30.0409 46.2695 30.6436 45.8087 31.3196 45.4807C32.644 44.8436 34.1866 44.8436 35.511 45.4807C36.1854 45.8087 36.7873 46.2695 37.2809 46.8356C37.8188 47.4467 38.2391 48.1524 38.5191 48.9176C38.7617 49.5698 39.3842 50.0024 40.0808 50.0024C40.2799 50.0024 40.4783 49.9666 40.6652 49.8971C41.5272 49.5744 41.9644 48.6139 41.6424 47.7526C41.2183 46.6052 40.5858 45.5463 39.7771 44.6293C38.9875 43.7283 38.024 42.9959 36.9437 42.4756C34.7084 41.406 32.1084 41.406 29.8723 42.4756C28.7928 42.9951 27.8293 43.7275 27.0397 44.6293C26.2302 45.5463 25.5985 46.6052 25.1744 47.7526C25.0202 48.1676 25.0378 48.6277 25.2232 49.0297C25.4086 49.4325 25.7465 49.7445 26.1631 49.8971Z" fill="black"/>
				</svg>
				<p><span>Ooops!</span>Sorry, but you need to activate license to update your JetPlugin</p>
				<cx-vui-button
					class="cx-vui-button--style-accent"
					button-style="default"
					size="mini"
					@click="showPopupActivation"
				>
					<span slot="label">Activate License</span>
				</cx-vui-button>
			</div>
		</cx-vui-popup>
	</transition>
	<transition name="popup">
		<cx-vui-popup
			class="license-manager-popup"
			v-model="licenseManagerVisible"
			:footer="false"
		>
			<div class="cx-vui-popup__header-inner" slot="title">
				<div class="cx-vui-popup__header-label">Your Licenses</div>
				<cx-vui-button
					class="add-new-license"
					button-style="accent"
					size="mini"
					@click="addNewLicense"
				>
					<span slot="label">
						<span class="dashicons dashicons-plus"></span>
						<span>Add New License</span>
					</span>
				</cx-vui-button>
			</div>
			<div class="license-manager" slot="content">
				<p v-if="licenseList.length === 0">Add and Activate license for automatic updates, awesome support and bla bla features</p>
				<div
					class="license-list"
				>
					<license-item
						v-for="( license, index ) in licenseList"
						:key="index"
						:license-data="license"
						type="listing-item"
					></license-item>
				</div>
			</div>
		</cx-vui-popup>
	</transition>
	<transition name="popup">
		<cx-vui-popup
			class="responce-data-popup"
			v-model="responcePopupVisible"
			:header="false"
			:footer="false"
			body-width="450px"
		>
			<responce-info
				slot="content"
				:responce-data="responceData"

			></responce-info>
		</cx-vui-popup>
	</transition>
	<transition name="popup">
		<cx-vui-popup
			class="debug-console-popup"
			v-model="debugConsoleVisible"
			:footer="false"
			body-width="400px"
		>
			<div slot="title">
				<div class="cx-vui-popup__header-label">Debug Console</div>
			</div>
			<div class="debug-console-popup__form" slot="content">
				<cx-vui-select
					size="fullwidth"
					placeholder="Choose Action"
					:prevent-wrap="true"
					:options-list="debugActionList"
					v-model="debugConsoleAction"
				></cx-vui-select>
				<cx-vui-button
					button-style="accent"
					size="mini"
					:loading="debugConsoleActionProcessed"
					@click="executeAction"
				>
					<span slot="label">Execute</span>
				</cx-vui-button>
			</div>
		</cx-vui-popup>
	</transition>
</div>
