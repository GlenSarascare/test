(function () {

	'use strict';

	Vue.component( 'license-page', {
		template: '#jet-dashboard-license-page',

		data: function() {
			return {
				allJetPlugins: window.JetDashboardPageConfig.allJetPlugins || {},
				licenseList: window.JetDashboardPageConfig.licenseList || [],
				licenseManagerVisible: false,
				licensePopupVisible: false,
				deactivatePopupVisible: false,
				updateCheckPopupVisible: false,
				debugConsoleVisible: false,
				responcePopupVisible: false,
				licenseActionProcessed: false,
				ajaxLicenseAction: null,
				activatingPluginSlug: false,
				debugConsoleAction: '',
				debugActionList: window.JetDashboardPageConfig.debugActions || [],
				debugConsoleActionProcessed: false,
				ajaxDebugConsoleAction: null,
				responceData: {}
			};
		},

		created: function() {
			eventBus.$on( 'addLicenseItem', this.addLicense );
			eventBus.$on( 'removeLicenseItem', this.removeLicense );
			eventBus.$on( 'updateUserPluginData', this.updateUserPluginData );
			eventBus.$on( 'showLicenseManager', this.showLicenseManager );
			eventBus.$on( 'showPopupActivation', this.showPopupActivation );
			eventBus.$on( 'showPopupDeactivation', this.showPopupDeactivation );
			eventBus.$on( 'showPopupUpdateCheck', this.showPopupUpdateCheck );
			eventBus.$on( 'showResponcePopup', this.showResponcePopup );

			// hotkey catching
			document.onkeyup = ( event ) => {

				// Debug console hotkey ctrlKey + altKey + D
				if ( event.ctrlKey && event.altKey && event.which === 68 ) {
					this.debugConsoleVisible = true;
				}
			};
		},

		computed: {

			newlicenseData: function() {
				return {
					'licenseStatus': 'inactive',
					'licenseKey': '',
					'licenseDetails': {},
				};
			},

			licencePluginList: function() {

				let licencePluginList = {};

				for ( let licence of this.licenseList ) {
					let plugins = licence['licenseDetails']['plugins'];

					for ( let plugin in plugins ) {

						let pluginData = plugins[ plugin ];
						let pluginSlug = pluginData.slug;

						if ( ! licencePluginList.hasOwnProperty( plugin ) ) {

							licencePluginList[ plugin ] = pluginData;
						}
					}
				}

				return licencePluginList;
			},

			installedPluginList: function() {
				let installedPluginList = {};

				for ( let pluginSlug in this.allJetPlugins ) {

					if ( this.allJetPlugins[ pluginSlug ][ 'isInstalled' ] ) {

						let pluginData = this.allJetPlugins[ pluginSlug ];

						let licenseActivated = this.licencePluginList.hasOwnProperty( pluginSlug ) ? true : false;

						this.$set( pluginData, 'licenseActivated', licenseActivated );

						installedPluginList[ pluginSlug ] = pluginData;
					}
				}

				return installedPluginList;
			},

			installedPluginListVisible: function() {
				return 0 !== Object.keys( this.installedPluginList ).length ? true : false;
			},

			avaliablePluginList: function() {

				let avaliablePluginList = {};

				for ( let pluginSlug in this.allJetPlugins ) {

					if ( ( ! this.allJetPlugins[ pluginSlug ]['isInstalled'] )
						&& this.licencePluginList.hasOwnProperty( pluginSlug ) ) {

						let pluginData = this.allJetPlugins[ pluginSlug ];

						let licenseActivated = this.licencePluginList.hasOwnProperty( pluginSlug ) ? true : false;

						this.$set( pluginData, 'licenseActivated', licenseActivated );

						avaliablePluginList[ pluginSlug ] = pluginData;
					}
				}

				return avaliablePluginList;
			},

			avaliablePluginListVisible: function() {
				return 0 !== Object.keys( this.avaliablePluginList ).length ? true : false;
			},

			morePluginList: function() {

				let morePluginList = {};

				for ( let pluginSlug in this.allJetPlugins ) {

					if ( ( ! this.allJetPlugins[ pluginSlug ]['isInstalled'] ) &&
						( ! this.licencePluginList.hasOwnProperty( pluginSlug ) ) ) {

						let pluginData = this.allJetPlugins[ pluginSlug ];

						let licenseActivated = this.licencePluginList.hasOwnProperty( pluginSlug ) ? true : false;

						this.$set( pluginData, 'licenseActivated', licenseActivated );

						morePluginList[ pluginSlug ] = pluginData;
					}
				}

				return morePluginList;
			},

			morePluginListVisible: function() {
				return Object.keys( this.morePluginList ).length ? true : false;
			},
		},

		methods: {

			showLicenseManager: function() {
				this.deactivatePopupVisible = false;
				this.licensePopupVisible = false;
				this.licenseManagerVisible = true;
			},

			showPopupActivation: function( slug ) {
				this.activatingPluginSlug = slug;
				this.updateCheckPopupVisible = false;
				this.licensePopupVisible = true;
			},

			showPopupDeactivation: function( slug ) {
				this.deactivatePopupVisible = true;
			},

			showPopupUpdateCheck: function() {
				this.updateCheckPopupVisible = true;
			},

			showResponcePopup: function( responceData ) {
				this.deactivatePopupVisible = false;
				this.licensePopupVisible = false;
				this.licenseManagerVisible = false;
				this.responcePopupVisible = true;

				this.responceData = responceData;
			},

			showDebugConsole: function() {
				this.debugConsoleVisible = true;
			},

			addNewLicense: function() {
				this.licenseManagerVisible = false;
				this.licensePopupVisible = true;
			},

			addLicense: function( licenseData ) {
				this.licenseList.push( licenseData );
			},

			removeLicense: function( licenceKey ) {

				let removingIndex = false;

				for ( let licenceIndex in this.licenseList ) {
					let licenseData =  this.licenseList[ licenceIndex ];

					if ( licenseData['licenseKey'] === licenceKey ) {
						removingIndex = licenceIndex;

						break;
					}
				}

				if ( removingIndex ) {
					this.licenseList.splice( removingIndex, 1 );
				}

				this.licensePopupVisible = false;
			},

			updateUserPluginData: function( data ) {
				let slug       = data.slug,
					pluginData = data.pluginData;

				this.allJetPlugins[ slug ] = Object.assign( {}, this.allJetPlugins[ slug ], pluginData );
			},

			licenseAction: function() {
				var self = this;

				self.ajaxLicenseAction = jQuery.ajax( {
					type: 'POST',
					url: window.JetDashboardPageConfig.ajaxUrl,
					dataType: 'json',
					data: {
						action: 'jet_license_action',
						data: {
							//plugin: self.activatingPluginSlug,
							license: self.licenseKey,
							action: 'activate'
						}
					},
					beforeSend: function( jqXHR, ajaxSettings ) {

						if ( null !== self.ajaxLicenseAction ) {
							self.ajaxLicenseAction.abort();
						}

						self.licenseActionProcessed = true;
					},
					success: function( responce, textStatus, jqXHR ) {
						self.licenseActionProcessed = false;

						self.$CXNotice.add( {
							message: responce.message,
							type: responce.status,
							duration: 3000,
						} );

						if ( 'success' === responce.status ) {

							self.addLicense( {
								'licenseKey': self.licenseKey,
								'licenseStatus': 'active',
								'licenseDetails': responce.data,
							} );
						}
					}
				} );
			},

			executeAction: function() {
				var self = this;

				self.ajaxLicenseAction = jQuery.ajax( {
					type: 'POST',
					url: window.JetDashboardPageConfig.ajaxUrl,
					dataType: 'json',
					data: {
						action: 'jet_dashboard_debug_action',
						data: {
							action: self.debugConsoleAction
						}
					},
					beforeSend: function( jqXHR, ajaxSettings ) {

						if ( null !== self.ajaxDebugConsoleAction ) {
							self.ajaxDebugConsoleAction.abort();
						}

						self.debugConsoleActionProcessed = true;
					},
					success: function( responce, textStatus, jqXHR ) {
						self.debugConsoleActionProcessed = false;

						self.$CXNotice.add( {
							message: responce.message,
							type: responce.status,
							duration: 3000,
						} );
					}
				} );
			}
		}

	} );

})();
