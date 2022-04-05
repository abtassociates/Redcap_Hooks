These hooks use [Andy Martin's hook framework](https://github.com/123andy/redcap-hook-framework) to add the following features:

* Email filtering
  * Filter emails to send only to an apporved whitelist. 
  * Files - `filterEmail.php`, `redcap_hooks.php`, `global_hooks.php`
  * To Enable - Edit `filterEmail.php` to use a white list of your choosing.
  * To Disable - Edit `redcap_hooks.php` and `global_hooks.php` and remove the 1 line from each refrencing "filterEmail", either the file or the function.
* Login page customization
  * Inject custom JS, CSS, or anything else you'd like on the redcap login page.
  * Files - `loginPageCustomization.php`, `global_hooks.php`
  * To Enable - Review `loginPageCustomization.php` and make any modifications you'd like
  * To Disable - Edit `global_hooks.php` to remove the 1 line 

To deploy you must first take the actions listed above to disable or enable every feature. Most hooks have some junk defaults in place that you will not want to deploy to a production enviorment. The files should be placed in the webroot of of your app server in a folder "hooks", typically `C:\inetpub\wwwroot\redcap\hooks` on windows and `/var/www/redcap/hooks` on linux.

In general the `global_hooks.php` file contains includes includes for specific files, typically just one line per hook. The `redcap_hooks.php` file contains modifications to behavior (i.e. rejecting an email) via function ivocation. Files not mentioned above are apart of the framework from Andy (above) and do not need to be changed. If you plan to deploy them to production you should review them.
