# Gladys

A dummy module for the Gladys-Project
See documentation on Gladys Doc

Basics :

Uploder le tout sur wamp64 dans www/GladysDashboard/ .
Cree un VirtualHost sous le non gladysdashboard.beta .
Rentre le ficher gladysdashboard.sql dans la base de donner sous phpmyadmin.

Ensuite aller dans le ficher Inc.SSH et modifer par vos information

_Resources/Libs/Inc.SSH.php.

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
