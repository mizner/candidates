(Instructions are a work-in-progress)

* `cd` into the site folder e.g `cd ~/Local/app/`
* Nuke `public` folder `rm -rf public` (be careful with this command, you can also just delete with finder)
* `git clone https://github.com/mizner/candidates public`
* Make sure you have a `wp-config.php` (with the following... or something like it)
```php
define('WP_SITEURL', "http://candidates.text/core");
define('WP_HOME', "http://candidates.text");
define('WP_CONTENT_DIR', dirname(__FILE__).'/wp-content');
define('WP_CONTENT_URL', dirname(__FILE__)."http://candidates.text/wp-content"); 
```
* `index.php` (with `require dirname(__FILE__) . '/core/wp-blog-header.php';`)
* `composer install` (installs plugins)
* `cd wp-content/themes/candidate`
* `yarn install` (`npm install` works too)
* `yarn build` (does `gulp build` for you)
* `yarn start` (does `gulp watch` running BrowserSync and watching sass files, etc)