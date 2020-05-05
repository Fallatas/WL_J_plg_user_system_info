<?php
/**
 * @package    WL_SYSTEM_INFO
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC');

class PlgUserWL_System_Info extends JPlugin
{

    protected $app;

    public function onUserAfterLogin($options)
    {
        $allGroups = '';

        if ($this->app->isClient('site'))
        {


            //User data
          $user_id       = $options['user']->id;
          $groups        = $options['user']->groups;
          $name          = $options['user']->name;
          $username      = $options['user']->username;
          $registerDate  = $options['user']->registerDate;
          $lastVisitDate = $options['user']->lastvisitDate;

          foreach($groups as $group)
          {
              $allGroups .= 'Group Id = ' . $group . ' ';
          }

           //Session data
            $session = JFactory::getSession();
            $sessionid = $session->getId();

            $this->app->enqueueMessage('User ID ' . $user_id);
            $this->app->enqueueMessage('Session ID ' . $sessionid);
            $this->app->enqueueMessage('Name ' . $name);
            $this->app->enqueueMessage('Username ' . $username);
            $this->app->enqueueMessage('RegisterDate ' . $registerDate);
            $this->app->enqueueMessage('LastvisitDate ' . $lastVisitDate);

		}
    }
}
