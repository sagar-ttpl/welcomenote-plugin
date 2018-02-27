<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  User.welcomenote
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

/**
 * An example custom profile plugin.
 *
 * @since  1.6
 */
class PlgUserWelcomenote extends JPlugin
{
	/**
	 * Runs on content preparation
	 *
	 * @param   string  $options  The context for the set parameters
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	public function onUserAfterLogin($options = [])
	{
		if ( !JFactory::getApplication()->isAdmin() )
		{
			$baseUrl = JUri::base();
			$arrLoggedinUserDetails = JFactory::getUser();
			JFactory::getApplication()->enqueueMessage(JText::_("Hi <b>{$arrLoggedinUserDetails->name}</b>, welcome to <b>{$baseUrl}</b>."), null);

			return true;
		}
	}

	/**
	 * Runs on content preparation
	 *
	 * @param   string  $params   The context for the data
	 * @param   object  $options  An object containing the data for the form.
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	public function onUserLogout($params = [], $options = [])
	{
		JFactory::getApplication()->enqueueMessage(JText::_('See ya, soon! Bye-bye!'), null);

		return true;
	}
}
