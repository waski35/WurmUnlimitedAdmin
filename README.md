# Introduction
**Wurm Unlimited Admin** - is a web-based admin interface for Wurm Unlimited servers.

# Demo
To see this software in action visit our [Demo](http://wuademo.xplosivegames.com/)

# Requirements / Dependencies
The following programs and modules are required to run Wurm Unlimited Admin

- LAMP/WAMP, Nginx, or UniServer Zero XI running PHP 5.5.0 or higher
- Ability to change php.ini to allow the extension: php_pdo_sqlite.dll
- Wurm Unlimited Server
- [WUAHelper](https://github.com/PrabhdeepSingh/WUAHelper) - Used for RMI

# Installation
#### Download
- Download or clone from GitHub

#### PHP configuration
For this software to work you need to enable the php_pdo_sqlite extension as it will be needed to talk to Wurm Unlimited server database files. To enable the extension do the following
- Navigate to your `php.ini` file
- Do a search for `php_pdo_sqlite` and remove `;` from infront of `extension`

#### Application configuration
This is a basic configuration / setup guide on getting this software up and running on your host.
- Place files from this repo into your `www` folder
- Navigate to the `includes` folder and open `config.php`
- Change the `rootPath` to your website address

#### Wurm Unlimited configuration
To interact with your WU server you need to enable RMI on it, and two ways you can do it. 1 copy the provided class files into the server.jar file or 2 edit the `Constants.java` file yourself.
* Easy way - Copy and paste
..- Go into `includes/WUAHelperRequirements` and drag the two files into your `server.jar` in `com/wurmonline/server/` folder
* Hard way - Do it yourself
..- In your IDE navigate to `Constants.java`
..- In that file search for `Constants.useIncomingRMI = false;` Change `false` to `true`
..- Do another serach for `Constants.useIncomingRMI = getBoolean("USE_INCOMING_RMI", false);` Change `false` to `true`

# Usage

- The default username and password to the admin account are:

Username | Password
--- | --- | ---
admin | admin