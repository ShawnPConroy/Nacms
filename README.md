# Nacms

NACMS (Not A CMS) is two simple scripts that are designed for public or client
facing files. The first adds a markdown handlers to serve markdown files as
though they were HTML. The second makes a nice but simple directory index
handler for any folder that does not have an index file. Unlike other directory
listing script, this is not designed to highlight filetypes and files sizes.

This can all be done by adding either or both of the scripts to the `.htaccess`
to direct the web service when to invoke those files. If you put it in the
document root of the domain or subdomain it will work on all files and folders
for that domain or subdomain. You can also put it in a subfolder so that it only
works on that part of the domain or subdomain.

When I got the idea to use file handlers in the `.htaccess` and to combine that
with a folder listing I found Sam Minnée's
[Markdown Handler](https://github.com/sminnee/markdown-handler) and stole
several concepts and code segments from that project.

It also uses Parsedown to generate the HTML.

## Installation

Because the css needs to be publicly accessisble the Nacms folder should be
in your document path (public folder) such as `public_html/`. I recommend
renaming the folder to `.nacms` and putting it in the folder where you want
Nacms to function, but it can be in any public folder.

Rename the htaccess file to `.htaccess` and copy it to the folder where you want
the Nacms function. It will apply to that folder and all subfolders.

Note: Comment out with a hash symbol `#` for any options you don't want.

This seems to work with a basic Apache server on a shared hosting server.

Now any `.md` markdown file will render as proper HTML.

### Additional install info

* You can update `httpd.conf` with the `htaccess` files instead.

* Ensure that `mod_rewrite` and `mod_actions` are enabled in your Apache server:
    - `sudo a2enmod rewrite`
    - `sudo a2enmod actions`
    - `sudo systemctl restart apache2` (apply the changes)
