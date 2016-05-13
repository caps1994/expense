<?php
/**
 * Config - an example for setting up system settings.
 * When you are done editing, rename this file to 'Config.php'.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 * @version 3.0
 */

namespace App;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        /**
         * Turn on output buffering.
         */
        ob_start();

        /**
         * Define the complete site URL.
         */
        define('SITEURL', ($_SERVER['AWS_SITEURL'] ? $_SERVER['AWS_SITEURL'] : 'http://www.expense.local/'));

        /**
         * Define relative base path.
         */
        define('DIR', '/');

        /**
         * Set the Application Router.
         */
        // Default Routing
        define('APPROUTER', '\Core\Router');
        // Classic Routing
        // define('APPROUTER', '\Core\ClassicRouter');

        /**
         * Set default controller and method for legacy calls.
         */
        define('DEFAULT_CONTROLLER', 'Welcome');
        define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        define('TEMPLATE', 'Default');

        /**
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'En');

        //database details ONLY NEEDED IF USING A DATABASE

        /**
         * Database engine default is mysql.
         */
        define('DB_TYPE', 'mysql');

        /**
         * Database host default is localhost.
         */
        define('DB_HOST', ($_SERVER['RDS_SERVER'] ? $_SERVER['RDS_SERVER'] :'localhost'));

        /**
         * Database name.
         */
        define('DB_NAME', ($_SERVER['RDS_DB_NAME'] ? $_SERVER['RDS_DB_NAME'] : 'expense'));
        /**
         * Database username.
         */
        define('DB_USER', ($_SERVER['RDS_DB_USER'] ? $_SERVER['RDS_DB_USER'] :'expense'));

        /**
         * Database password.
         */
        define('DB_PASS', ($_SERVER['RDS_DB_PASS'] ? $_SERVER['RDS_DB_PASS'] :'TitNpw4W5!'));

        /**
         * PREFER to be used in database calls default is nova_
         */
        define('PREFIX', 'expense_');

        /**
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'expense_');

        /**
         * Optional create a constant for the name of the site.
         */
        define('SITETITLE', 'Expense');
        
        /**
         * Optional set a site email address.
         */
         define('SITEEMAIL', ($_SERVER['AWS_SITEEMAIL'] ? $_SERVER['AWS_SITEEMAIL'] : 'postmaster@sandboxb3198e55080b441f967c39ceff6a7fa7.mailgun.org'));

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /**
         * Set timezone.
         */
        date_default_timezone_set('Europe/London');

        /**
         * Start sessions.
         */
        Session::init();
    }
}
