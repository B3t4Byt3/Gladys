# Gladys

A dummy module for the Gladys-Project
See documentation on Gladys Doc

Basics :
Il faut enlever le (0) du .htaccess.
Uploder le tout sur wamp64.
Rentre la base de donner sous phpmyadmin.

ensuite aller dans le ficher Inc.SSH et modifer par vos information

    try {
        define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
        //$SSH = new Net_SSH2('IP.ddns.net'); //Pour No-Ip
        $SSH = new Net_SSH2('IP'); // IP en locahost
        if (!$SSH->login('USERNAME', 'PASSWORD')) { // Username et password du raspberry
            // exit('Login Failed');
        }
    } catch (Exception $Error) {
        $SSH = new Net_SSH2('IP'); // IP en locahost
        echo $SSH->getLog();
    }
    
Licence
Released under MIT Licence
