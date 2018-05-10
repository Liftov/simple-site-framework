#Liftov Small Site Framework

## Install

1. Download a copy of the source code.
2. Install vendors by executing <br> <code>composer install</code> inside htdocs folder.
3. Install node modules with <br> <code>yarn</code> inside htdocs folder.

## Usage

### Server

Simple server is included.
Start the server with <br>
<code>php bin/console server:run</code>

Access the site in the browser by going to <br>
<code>http://localhost:8000/</code>

When using a custom server, point the DocumentRoot to /public

### Building assets

Source assets files can be found in /assets/css and /assets/js.
For building assets Encore is used, a wrapper around webpack. <br>
More information and features can be found here https://symfony.com/doc/current/frontend.html

During development activate continues building with <br>
<code>yarn run encore dev --watch</code>

Production assets are build <br>
<code>yarn run encore build</code>

### Creating pages
There is a single page controller with a catch all route.
This means that this controller will be used for all routes. <br>
Inside the controller a given url will be translated to a corresponding template file starting from the template folder.<br>

The last part of the url will be converted to the filename, the other parts translate into a folder structure.

eg. <code>http://mysite.com/blog/posts/firstpost => /templates/blog/posts/firstpost.html.twig</code>

#### Default page
A default index file can also be used inside a folder, if a path cannot be translated to a template file, the index will be load if it exists.<br>

eg. <code>http://mysite.com/blog/posts => /templates/blog/posts/index.html.twig</code>

#### Page not found
When no file can be loaded a 404 will be thrown. The template file for this page can be found under <code>/templates/bundles/TwigBundle/Exception/error404.html.twig</code>