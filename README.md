Backdoor
========

Upload onto a webserver to upload or create files.  Just change the $key (password) to what you want.  For the example it's set as "letmein".

```php
$key = $_REQUEST['key'] == 'letmein' ? $_REQUEST['key'] : false;
```

This script is also responsive.  It's minimal in code and design for ease.  As with such, it also has a security flaws.  Use at your own risk.

## Screenshots

# ![Image](https://github.com/AndrewChamp/backdoor/blob/master/_ignore/login.png?raw=true)

# ![Image](https://github.com/AndrewChamp/backdoor/blob/master/_ignore/access.png?raw=true)
