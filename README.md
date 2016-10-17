# Introduction
**Wurm Unlimited Admin** - is a web-based admin interface for Wurm Unlimited servers.

# Demo
To see this software in action visit our [Demo](http://wua.xplosivegames.com/) and login with U: demo P: demo

# Requirements / Dependencies
The following programs and modules are required to run Wurm Unlimited Admin

- LAMP/WAMP, Nginx, or UniServer Zero XI running PHP 5.5.0 or higher
- Ability to change php.ini to allow the extension: php_pdo_sqlite.dll
- Wurm Unlimited Server
- [WUAHelper](https://github.com/PrabhdeepSingh/WUAHelper) - Used for RMI
- [WuaMod](https://github.com/PrabhdeepSingh/WuaMod) - Used for adding custom methods to RMI

# Installation
#### Download
- Download the latest [release](https://github.com/PrabhdeepSingh/WurmUnlimitedAdmin/releases)
- Extract contents in the mods folder into your wurm server mods folder.
- Extract contents in the website folder into your website directory where this tool will be hosted at.

#### PHP configuration
For this software to work you need to enable the php_pdo_sqlite extension as it will be needed to talk to Wurm Unlimited server database files. To enable the extension do the following
- Navigate to your `php.ini` file
- Do a search for `php_pdo_sqlite` and remove `;` from infront of `extension`

#### Application configuration
This is a basic configuration / setup guide on getting this software up and running on your host.
- Navigate to the `includes` folder and open `config.php` with your favorite text editor
- Change the `rootPath` to your website address

#### Wurm Unlimited configuration
To interact with your WU server you need to enable RMI on it, and to do that you need to edit `wurm.ini` file
- Go to your `wurm.ini` file
  - Add the following line at the end of the file: `USE_INCOMING_RMI=true`
  - Save the file and start the server
If everything goes smoothly you should see `RMI Registry listening on ........`

# Usage

- The default username and password to the admin account are:

Username | Password
--- | --- | ---
admin | admin