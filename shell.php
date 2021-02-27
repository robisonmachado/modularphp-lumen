<?php


echo '<br>';
echo 'php shell command';
echo '<br>';

/*
echo '<br>';
$output = shell_exec('chmod 777 -R *');
echo '<br>';
echo $output;
*/

/*
echo '<br>';
$output = shell_exec('find /home/maisunicorp/public_html/gcmci/unisystem -type f -exec chmod 644 {} \;');
echo $output;
echo '<br>';
$output = shell_exec('find /home/maisunicorp/public_html/gcmci/unisystem -type d -exec chmod 755 {} \;');
echo '<br>';
echo $output;
*/




echo '<br>';
echo 'php composer.phar dumpautoload -o';
echo '<br>';
$output = shell_exec('php composer.phar dumpautoload -o');
echo '<br>';
echo $output;
echo '-----------------------------------------------';
echo '<br>';
echo '<br>';



echo '<br>';
echo 'php artisan cache:clear';
echo '<br>';
$output = shell_exec('php artisan cache:clear');
echo '<br>';
echo '-----------------------------------------------';
echo '<br>';
echo '<br>';




$output = shell_exec('php artisan migrate:fresh --seed');
echo "<pre>$output</pre>";



