
#$cusername = explode(PHP_EOL,shell_exec("cat /home/`whoami`/TPM/mods/webwallet/user.conf"))[0];
#$cpassword = explode(PHP_EOL,shell_exec("cat /home/`whoami`/TPM/mods/webwallet/pass.conf"))[0];

echo "What username would you like to use?";
read user
echo "What password would you like to use?";
read pass
echo "Ok";
rm /home/`whoami`/TPM/mods/webwallet/user.conf
rm /home/`whoami`/TPM/mods/webwallet/pass.conf
echo $user > /home/`whoami`/TPM/mods/webwallet/user.conf
echo $pass > /home/`whoami`/TPM/mods/webwallet/pass.conf
clear
exit 0;
