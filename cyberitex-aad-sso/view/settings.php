<div class="wrap">

	<h2><?php echo esc_html__( 'Microsoft Entra WPConnect' , 'microsoft-entra-wpconnect' ); ?></h2>
	<p><?php echo esc_html__( 'Settings for configuring Microsoft Entra WPConnect can be configured here.' , 'microsoft-entra-wpconnect' ); ?></p>

	<form method="post" action="options.php">
		<?php
		settings_fields( 'aadsso_settings' );
		do_settings_sections( 'aadsso_settings_page' );
		submit_button();
		?>
	</form>

	<h3><?php echo esc_html__( 'Reset Plugin' , 'microsoft-entra-wpconnect' ); ?></h3>
	<p><?php echo esc_html__( 'Resetting the plugin will completely remove all settings.' , 'microsoft-entra-wpconnect' ); ?></p>
	<p>
		<?php
		printf(
			'<a href="%s" class="button">%s</a> <span class="description">%s</span>',
			wp_nonce_url(
				admin_url( 'options-general.php?page=aadsso_settings' ),
				'aadsso_reset_settings',
				'aadsso_nonce'
			),
			esc_html__( 'Reset Settings' , 'microsoft-entra-wpconnect' ),
			esc_html__( 'Reset the plugin to default settings. Careful, there is no undo for this.' , 'microsoft-entra-wpconnect' )
		)
		?>
	</p>
	<?php if( defined( 'AADSSO_SETTINGS_PATH' ) && file_exists( AADSSO_SETTINGS_PATH ) ): ?>
		<h3><?php echo esc_html__( 'Migrate Legacy Settings', 'microsoft-entra-wpconnect' ); ?></h3>
		<p><?php printf(
			esc_html__( 'Old configuration data was found at %s.' , 'microsoft-entra-wpconnect' ),
			sprintf( '<code>%s</code>', esc_html( AADSSO_SETTINGS_PATH ) )
		); ?>  
			<?php echo esc_html__( 'This configuration data can be migrated automatically.' , 'microsoft-entra-wpconnect' ); ?></p>
		<p><?php printf(
				esc_html__( 'Delete the file at %s to hide this migration utility.' , 'microsoft-entra-wpconnect' ),
				sprintf( '<code>%s</code>', esc_html( AADSSO_SETTINGS_PATH ) )
			); ?></p>
		
		<?php // The web server must have write permission on the parent directory for this to succeed. ?>
		<?php if( is_writable( AADSSO_SETTINGS_PATH ) && is_writable( dirname( AADSSO_SETTINGS_PATH ) ) ): ?>
		<p><?php printf(
			esc_html__( 'If migration is successful, migration will delete this configuration file, %s.' , 'microsoft-entra-wpconnect' ),
				sprintf( '<code>%s</code>', esc_html( AADSSO_SETTINGS_PATH ) )
			); ?></p>
		<?php else: ?>
			<p><?php printf(
					esc_html__( 'If migration is successful, migration will be unable to delete the configuration file at %s.  It is recommended to delete the file after migration.' , 'microsoft-entra-wpconnect' ),
					sprintf( '<code>%s</code>', esc_html( AADSSO_SETTINGS_PATH ) )
				); ?></p>
		<?php endif; ?>
		
		<p><?php
		printf(
			'<a href="%s" class="button">%s</a> <span class="description">%s</span>',
			wp_nonce_url(
				admin_url( 'options-general.php?page=aadsso_settings' ),
				'aadsso_migrate_from_json',
				'aadsso_nonce'
			),
			esc_html__( 'Migrate Settings' , 'microsoft-entra-wpconnect' ),
			esc_html__( 'Migrate settings from old plugin versions to new configuration. This will overwrite existing settings! Careful, there is no undo for this.' , 'microsoft-entra-wpconnect' )
		)
		?></p>
		
	<?php endif; ?>
</div>
