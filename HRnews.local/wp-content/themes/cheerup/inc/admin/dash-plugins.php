<?php
/**
 * Dashboard plugins - extends TGMPA to move optional plugins to a separate table.
 */
class Bunyad_Theme_Admin_DashPlugins
{
	public function __construct()
	{
		add_action('tgmpa_after_install_plugins_page', array($this, 'display'));
	}

	public function display($tgmpa)
	{
		$table   = new Bunyad_Theme_Admin_DashPluginsTable;
		$table->view_context = 'all-registered';

		$plugins = $table->gather_plugin_data();
		$optional_plugins = $table->optional_plugins;

		// Only optional plugins here.
		$plugins = array_filter($plugins, function($plugin) use ($optional_plugins) {
			return in_array($plugin['slug'], $optional_plugins);
		});

		if (!count($plugins)) {
			return;
		}

		?>

		<div class="ts-dash-plugins">

			<h3>Optional & Advanced Plugins</h3>

			<p>The following plugins are advanced and may affect performance if not configured properly. Only install the following plugins 
			if you're sure you need them. <a href="https://cheerup.theme-sphere.com/documentation/#optional-plugins" target="_blank">Learn More</a></p>

			<table class="wp-list-table widefat fixed">
				<thead>
				<tr>
					<th class="manage-column column-plugin column-primary">Plugin</th>
					<th class="manage-column column-source">Source</th>
					<th scope="col" id="type" class="manage-column column-type">Type</th>
					<!-- <th scope="col" id="version" class="manage-column column-version">Version</th> -->
					<th scope="col" id="status" class="manage-column column-status">Status</th>	
				</tr>
				</thead>
			
				<?php foreach ($plugins as $plugin): ?>
				
				<tr>
					<td class="plugin column-plugin has-row-actions column-primary"><?php 
						echo $table->column_plugin($plugin); // phpcs:ignore WordPress.Security.EscapeOutput -- Safe from TGMPA_List_Table 
					?></td>
					<td class="source column-source"><?php echo esc_html($plugin['source']); ?></td>
					<td class="type column-type">Optional</td>
					<!-- <td class="version column-version"><?php // $table->column_version($plugin); ?></td> -->
					<td class="status column-status"><?php 
						echo esc_html($plugin['status']); 

						if (strstr($plugin['status'], 'Update')) {
							echo '<hr />';
							echo $table->column_version($plugin);  // phpcs:ignore WordPress.Security.EscapeOutput -- Safe from TGMPA_List_Table 
						}
					?></td>
				</tr>

				<?php endforeach; ?>
			</table>

		</div>
		<?php
	}
}

if (class_exists('TGMPA_List_Table')) {

	class Bunyad_Theme_Admin_DashPluginsTable extends TGMPA_List_Table {

		public $optional_plugins;

		public function __construct() {
			parent::__construct();

			// Collect optional plugin ids.
			$optional_plugins = array();
			foreach ($this->tgmpa->plugins as $plugin) {
				if (!empty($plugin['optional'])) {
					$optional_plugins[] = $plugin['slug'];
				}
			}

			$this->optional_plugins = $optional_plugins;
		}

		/**
		 * Extend bulk actions process to account for activations.
		 */
		public function process_bulk_actions() {

			$installed   = false;
			$to_activate = false;

			if ('tgmpa-bulk-install' === $this->current_action() && !empty($_POST['plugin'])) {

				$plugins = (array) $_POST['plugin'];
				
				foreach ($plugins as $plugin) {
					if (!$this->tgmpa->is_plugin_active($plugin)) {
						$to_activate = true;
						break;
					}
				}

				// Install the plugins normally. $_POST will be mutated, so store original.
				$orig_post = $_POST;
				$installed = parent::process_bulk_actions();

				// If the intention is to install for inactive plugins, assume they should be activated.
				if ($to_activate) {
					$_REQUEST['action'] = 'tgmpa-bulk-activate';
					$_POST = $orig_post;
				}
			}

			parent::process_bulk_actions();

			// Plugins had to be activated but nothing was installed.
			if (!$installed && $to_activate) {
				echo '<p><a href="' . esc_url( $this->tgmpa->get_tgmpa_url() ) . '" target="_parent">' . esc_html( $this->tgmpa->strings['return'] ) . '</a></p>';
				return true;
			}
		}

		/**
		 * Add additional categories compared to default and add optional plugins to 
		 * 'update' and 'all-registered' context only. Add to 'all' only if there's a 
		 * an update and the plugin is already installed.
		 */
		protected function categorize_plugins_to_views() {
			
			$plugins = array(
				'all-registered' => array(),
				'all'      => array(),
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);

			foreach ($this->tgmpa->plugins as $slug => $plugin) {

				$is_installed = $this->tgmpa->is_plugin_installed($slug);
				$is_active    = $this->tgmpa->is_plugin_active($slug);
				$has_update   = $this->tgmpa->does_plugin_have_update($slug);

				if ($is_active && false === $has_update) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				}
				
				$plugins['all-registered'][$slug] = $plugin;

				// Add to all if it's not an optional plugin, or if an optional active plugin has an update.
				if (empty($plugin['optional']) || ($is_active && $has_update)) {
					$plugins['all'][ $slug ] = $plugin;
				}

				if (!$is_installed) {
					if (empty($plugin['optional'])) {
						$plugins['install'][ $slug ] = $plugin;
					}
				} 
				else {
					if ($is_active && $has_update) {
						$plugins['update'][ $slug ] = $plugin;
					}

					if (empty($plugin['optional']) && $this->tgmpa->can_plugin_activate($slug)) {
						$plugins['activate'][ $slug ] = $plugin;
					}
				}
			}

			return $plugins;
		}

		/**
		 * Gather data; public.
		 */
		public function gather_plugin_data() {
			return $this->_gather_plugin_data();
		}
	}
}

// init and make available in Bunyad::get('admin_dash_plugins')
Bunyad::register('admin_dash_plugins', array(
	'class' => 'Bunyad_Theme_Admin_DashPlugins',
	'init'  => true
));