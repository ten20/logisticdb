<?php
 //// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//echo dirname(__FILE__).'../extensions/bootstrap';
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'../extensions/bootstrap');
Yii::setPathOfAlias('chartjs', dirname(__FILE__).'/../extensions/yii-chartjs');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'สหกรณ์ออมทรัพย์',
    //    'theme'=>'admin', // requires you to copy the theme under your themes directory
    'theme'=>'abound',
    //'theme'=>'lines',
    'language'=>'th',
    'timeZone'=>'Asia/Bangkok',
    //'defaultController' => 'file/download',   // <--- add this line and replace with correct controller/action
    // preloading 'log' component
    'preload'=>array('log','chartjs'),
    /*'aliases' => array(
        'bootstrap' => 'application.models.bootstrap',
        'chartjs' => 'application.models.bootstrap.extensions.yii-chartjs-master',
    ),
    */
    'aliases' => array(
        'bootstrap' => 'ext.bootstrap'
    ),
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'bootstrap.*',
        'bootstrap.components.*',
        'bootstrap.behaviours.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*'
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
        'bootstrap'=>array(
                    'class'=>'bootstrap.BootstrapModule'
                ),

            
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123457',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array('bootstrap.gii'),
        ),
        
    ),

    // application components
    'components'=>array(
            /*'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
             */
              'boostrap' => array(
            'class'=> 'boostrap.components.BsApi'
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format
        
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        /*
        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
                 */
        // uncomment the following to use a MySQL database
        
        //For Local        
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=db_dockcoop',
            'emulatePrepare' => true,
            'username' => 'dockcoop',
            'password' => 'doCP#Db@min!17',
            'charset' => 'utf8',
        ),
        /*
        //For Host      
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=ncc_arrest',
            'emulatePrepare' => true,
            'username' => 'nccar_admin',
            'password' => 'db_arrest_@min!',
            'charset' => 'utf8',
        ),
        */
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'rattana.t@navy.mi.th',
        'ldap' => array(
        'ldap_server' => '10.106.0.55',
        'ldap_port' => '389',
        'ldap_user' => 'uid=ac_ldap,ou=mail,o=Royal Thai Navy,c=TH',
        'ldap_passwd' => '12347',
        'ldap_basedn' => 'ou=mail,o=Royal Thai Navy,c=TH',
        'ldap_bindRequiresDn' => true,
        'ldap_accountDomainName' => 'navy.mi.th',
        'host'      => 'ldap.navy.mi.th',
        'port'      => 389,
        'domain'    => 'navy.mi.th',
        'ou'=>'mail',
        'dc'=>array('Royay Thai Navy','TH'),
        ),
    ),
);
