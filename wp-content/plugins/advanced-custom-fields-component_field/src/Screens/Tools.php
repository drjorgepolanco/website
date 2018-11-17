<?php

namespace GummiIO\AcfComponentField\Screens;

/**
 * Tools Class
 *
 * Class that handles all the hook when on the acf tools admin page
 *
 * @since   2.0.0
 * @version 2.0.0
 */
class Tools
{
	/**
	 * Add action to register additional hooks when acf is initilized
	 *
     * @since   2.0.0
     * @version 2.0.0
	 */
	public function __construct()
	{
        add_action('acf/init', [$this, 'registerHooks']);
	}

	/**
	 * Register hooks to adjust field group edit admin page on screen
	 *
     * @since   2.0.0
     * @version 2.0.0
	 */
	public function registerHooks()
	{
		add_action('load-custom-fields_page_acf-tools', [$this, 'toolsScreen']);
	}

	/**
	 * Add and remove additional filters and hooks
	 *
     * @since   2.0.0
     * @version 2.0.0
	 */
	public function toolsScreen()
	{
		// cannot use 'acf/prepare_field_for_import' because that does not
		// overwrite the fields array that will be imported
		add_filter('acf/prepare_fields_for_import', [$this, 'backwardCompatibilityConversion']);

		remove_filter('acf/load_field/type=component_field', [acf_get_field_type('component_field'), 'load_field']);
	}

	/**
	 * In case user import an 1.0 export file, we need to convert the options
	 * to the correct key.
	 *
     * @since   2.0.0
     * @version 2.0.0
	 * @param   array $fields Fields that will be imported
	 */
	public function backwardCompatibilityConversion($fields)
	{
		return array_map(function($field) {
			if (! isset($field['field_group_id'])) {
				return $field;
			}

			$field['field_group_key'] = $field['field_group_id'];
			unset($field['field_group_id']);

			return $field;
		}, $fields);
	}
}
