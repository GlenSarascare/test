var eventBus = new Vue();

( function( $, dashboardPageConfig ) {

	'use strict';

	Vue.config.devtools = true;

	if ( ! $('#jet-dashboard-page')[0] ) {
		return false;
	}

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'license-item', {
		template: '#jet-dashboard-license-item',

		props: {
			licenseData: Object,
			type: String
		},

		data: function() {
			return {
				licenseKey: this.licenseData.licenseKey,
				licenseStatus: this.licenseData.licenseStatus,
				licenseDetails: this.licenseData.licenseDetails,
				activationStatus: false,
				ajaxLicenseAction: null,
			}
		},

		computed: {

			isLicenseActive: function() {
				return 'active' === this.licenseStatus ? true : false;
			},

			licenseActionType: function() {
				return ! this.isLicenseActive ? 'activate' : 'deactivate';
			},

			maskedLicenseKey: function() {
				let licenseKey      = this.licenseKey,
					licenseKeyArray = licenseKey.split(''),
					maskerLicenseArray = [];

				maskerLicenseArray = licenseKeyArray.map( ( item, index ) => {

					if ( index > 4 && index < licenseKeyArray.length - 4 ) {
						return '*';
					}

					return item;
				} );

				return maskerLicenseArray.join('');
			},

			licenseStatus: function() {
				return this.isLicenseActive ? 'activated' : 'not-activated';
			},

			licenseType: function() {
				return this.licenseDetails.type ? this.licenseDetails.type : '';
			},

			productName: function() {
				return this.licenseDetails.product_name ? this.licenseDetails.product_name : '';
			},

			isLicenseExpired: function() {
				return 'expired' === this.licenseStatus ? true : false;
			},

			expireDate: function() {

				let expireCases = [
					'0000-00-00 00:00:00',
					'lifetime'
				];

				if ( expireCases.includes( this.licenseDetails.expire ) ) {
					return 'Lifetime';
				}

				return this.licenseDetails.expire;
			},

			licensePlugins: function() {
				return this.licenseDetails.plugins ? this.licenseDetails.plugins : [];
			},
		},

		methods: {
			showLicenseManager: function() {
				eventBus.$emit( 'showLicenseManager' );
			},

			licenseAction: function() {
				var self       = this,
					actionType = self.licenseActionType;

				self.activationStatus = true;

				self.ajaxLicenseAction = $.ajax( {
					type: 'POST',
					url: dashboardPageConfig.ajaxUrl,
					dataType: 'json',
					data: {
						action: 'jet_license_action',
						data: {
							license: self.licenseKey,
							action: actionType
						}
					},
					beforeSend: function( jqXHR, ajaxSettings ) {

						if ( null !== self.ajaxLicenseAction ) {
							self.ajaxLicenseAction.abort();
						}
					},
					success: function( responce, textStatus, jqXHR ) {
						self.activationStatus = false;

						self.$CXNotice.add( {
							message: responce.message,
							type: responce.status,
							duration: 4000,
						} );

						let licenseStatus  = responce.status,
							licenseDetails = responce.data;

						if ( 'success' === licenseStatus ) {

							if ( 'activate' === actionType ) {

								self.licenseStatus = 'active';
								self.licenseDetails = licenseDetails;

								eventBus.$emit( 'addLicenseItem', {
									'licenseKey': self.licenseKey,
									'licenseStatus': 'active',
									'licenseDetails': licenseDetails,
								} );
							}

							if ( 'deactivate' === actionType ) {
								eventBus.$emit( 'removeLicenseItem', self.licenseKey );
							}
						}

						if ( 'error' === licenseStatus ) {
							if ( 'limit_exceeded' === responce.code ) {
								eventBus.$emit( 'showResponcePopup', responce );
							}
						}
					}
				} );
			}
		}
	});

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'plugin-item-installed', {
		template: '#jet-dashboard-plugin-item-installed',

		props: {
			pluginData: Object
		},

		data: function() {
			return {
				actionPlugin: false,
				actionPluginRequest: null,
				actionPluginProcessed: false,
				licenseActionProcessed: false,
				licenseKey: '',
				ajaxLicenseAction: null
			}
		},

		computed: {

			deactivateAvaliable: function() {
				return ( ! this.pluginData['licenseControl'] && this.pluginData['isInstalled'] && this.pluginData['isActivated'] ) ? true : false;
			},

			activateAvaliable: function() {
				return ( this.pluginData['isInstalled'] && !this.pluginData['isActivated'] ) ? true : false;
			},

			updateAvaliable: function() {
				return ( this.pluginData['updateAvaliable'] ) ? true : false;
			},

			updateActionAvaliable: function() {
				return ( this.pluginData['licenseActivated'] && this.pluginData['updateAvaliable'] ) ? true : false;
			},

			activateLicenseVisible: function() {
				return ( this.pluginData['licenseControl'] && !this.pluginData['licenseActivated'] ) ? true : false;
			},

			deactivateLicenseVisible: function() {
				return ( this.pluginData['licenseActivated'] ) ? true : false;
			},
		},

		methods: {

			deactivatePlugin: function() {
				this.actionPlugin = 'deactivate';
				this.pluginAction();
			},

			activatePlugin: function() {
				this.actionPlugin = 'activate';
				this.pluginAction();
			},

			updatePlugin: function() {

				console.log(this.updateActionAvaliable);

				if ( this.updateActionAvaliable ) {

					this.actionPlugin = 'update';
					this.pluginAction();
				} else {
					eventBus.$emit( 'showPopupUpdateCheck' );
				}

			},

			showPopupActivation: function() {
				eventBus.$emit( 'showPopupActivation', this.pluginData['slug'] );
			},

			pluginAction: function() {
				let self = this;

				self.actionPluginRequest = $.ajax( {
					type: 'POST',
					url: dashboardPageConfig.ajaxUrl,
					dataType: 'json',
					data: {
						action: 'jet_dashboard_plugin_action',
						data: {
							action: self.actionPlugin,
							plugin: self.pluginData['slug'],
						}
					},
					beforeSend: function( jqXHR, ajaxSettings ) {

						if ( null !== self.actionPluginRequest ) {
							self.actionPluginRequest.abort();
						}

						self.actionPluginProcessed = true;
					},
					success: function( responce, textStatus, jqXHR ) {
						self.actionPluginProcessed = false;

						self.$CXNotice.add( {
							message: responce.message,
							type: responce.status,
							duration: 3000,
						} );

						if ( 'success' === responce.status ) {
							eventBus.$emit( 'updateUserPluginData', {
								'slug': self.pluginData['slug'],
								'pluginData': responce.data,
							} );
						}
					}
				} );
			},

			deactivateLicense: function() {
				eventBus.$emit( 'showPopupDeactivation', this.pluginData['slug'] );
			}
		}
	});

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'plugin-item-avaliable', {
		template: '#jet-dashboard-plugin-item-avaliable',

		props: {
			pluginData: Object,
		},

		data: function() {
			return {
				pluginActionRequest: null,
				pluginActionType: false,
				pluginActionProcessed: false,
			}
		},

		computed: {
			installAvaliable: function() {
				return !this.pluginData['isInstalled'] ? true : false;
			},
		},

		methods: {

			installPlugin: function() {
				this.pluginActionType = 'install';
				this.pluginAction();
			},

			pluginAction: function() {
				let self = this;

				self.pluginActionRequest = $.ajax( {
					type: 'POST',
					url: dashboardPageConfig.ajaxUrl,
					dataType: 'json',
					data: {
						action: 'jet_dashboard_plugin_action',
						data: {
							action: self.pluginActionType,
							plugin: self.pluginData['slug'],
						}
					},
					beforeSend: function( jqXHR, ajaxSettings ) {

						if ( null !== self.pluginActionRequest ) {
							self.pluginActionRequest.abort();
						}

						self.pluginActionProcessed = true;
					},
					success: function( responce, textStatus, jqXHR ) {
						self.pluginActionProcessed = false;

						self.$CXNotice.add( {
							message: responce.message,
							type: responce.status,
							duration: 3000,
						} );

						if ( 'success' === responce.status ) {
							eventBus.$emit( 'updateUserPluginData', {
								'slug': self.pluginData['slug'],
								'pluginData': responce.data,
							} );
						}
					}
				} );
			}

		}

	});

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'plugin-item-more', {
		template: '#jet-dashboard-plugin-item-more',

		props: {
			pluginData: Object
		},

		data: function() {
			return {
				morePluginsUrl: dashboardPageConfig.getMorePluginsUrl || {},
			}
		},

		computed: {
			demoLink: function() {
				let authorSlug = dashboardPageConfig.themeInfo.authorSlug || 'jet-dashboard';

				return `${ this.pluginData.demo }?utm_source=${ authorSlug }&utm_medium=${ this.pluginData.slug }&utm_campaign=get-more-plugin-link`;
			}
		}
	});

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'responce-info', {
		template: '#jet-dashboard-responce-info',

		props: {
			responceData: Object
		},

		data: function() {
			return {}
		},

		computed: {
			isResponceEmpty: function() {
				return 0 === Object.entries( this.responceData ).length ? true : false;
			},

			type: function() {
				return this.responceData.hasOwnProperty('status') ? this.responceData.status : 'error';
			},

			code: function() {
				return this.responceData.hasOwnProperty('code') ? this.responceData.code : 'error';
			},

			title: function() {
				return this.responceData.hasOwnProperty('message') ? this.responceData.message : '';
			},

			responceDetails: function() {
				return this.responceData.hasOwnProperty('data') ? this.responceData.data : {};
			},

			activationLimit: function() {

				if ( ! this.responceDetails.hasOwnProperty('activation_limit') ) {
					return 1;
				}

				return 0 !== this.responceDetails['activation_limit'] ? this.responceDetails['activation_limit'] : 'unlimited';
			},

			activatedSites: function() {

				if ( ! this.responceDetails.hasOwnProperty('sites') ) {
					return [];
				}

				return 0 !== this.responceDetails['sites'] ? this.responceDetails['sites'] : [];
			}
		}
	});

	/**
	 * [template description]
	 * @type {String}
	 */
	Vue.component( 'jet-dashboard-header', {
		template: '#jet-dashboard-header',

		data: function() {
			return {
				title: dashboardPageConfig.headerTitle || '',
			}
		},

	});

	/**
	 * [mounted description]
	 */
	window.JetDasboardPage = new Vue( {
		el: '#jet-dashboard-page',

		data: {
			page: dashboardPageConfig.page || false
		},

	} );

})( jQuery, window.JetDashboardPageConfig );
