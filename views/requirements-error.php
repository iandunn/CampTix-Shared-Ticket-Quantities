<div class="error">
	<p>CampTix - Shared Ticket Totals error: Your environment doesn't meet all of the system requirements listed below.</p>

	<ul class="ul-disc">
		<li><a href="http://wordpress.org/plugins/camptix/">CampTix</a> plugin must be installed and activated.</li>

		<li><strong>PHP <?php echo CSTQ_REQUIRED_PHP_VERSION; ?>+</strong>
			<em>(You're running version <?php echo PHP_VERSION; ?>)</em>
		</li>

		<li><strong>WordPress <?php echo CSTQ_REQUIRED_WP_VERSION; ?>+</strong>
			<em>(You're running version <?php echo esc_html( $wp_version ); ?>)</em>
		</li>
	</ul>

	<p>If you need to upgrade your version of PHP you can ask your hosting company for assistance, and if you need help upgrading WordPress you can refer to <a href="http://codex.wordpress.org/Upgrading_WordPress">the Codex</a>.</p>
</div>
