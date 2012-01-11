=== Plugin Name ===
Contributors: gab.ro
Donate link: http://www.gab.ro/nano/donate/
Tags: npm, nano, plugin, plugins, manager, simple, functionality
Requires at least: 3.3
Tested up to: 3.3.1
Stable tag: 0.9.1

Nano plugins provide a simple way to add simple functionality to your WordPress site, directly via an administration menu.

== Description ==

[Plugin Home Page](http://www.gab.ro/nano/)

This plugin is two things:

**A fun educational tool**

Even if you have no idea about WordPress coding, you can still write a tiny nano plugin.

As you get more and more confident in your coding skills you can write more nano plugins and then write full size plugins entirely without relying on the Nano Plugin Manager. And you can still contiune using is it as a development tool.

Also, you get to browse the growing directory of nano plugins. Study them, learn from them or just use them without giving a damn on how they work :)

Still, this plugin encourages a strong DIY mentality. Give a man a fish and you feed him for a day. Teach a man to fish and you feed him for a lifetime.

Last, but not least, other WordPress teachers are also warmly invited in our forums.

**A useful development tool**

Nano plugins provide a simple way to add simple functionality to your WordPress site, directly via an administration menu.

As you probably know already, WordPress functionality is usually enhanced by using hooks: filters and actions.

If you need to add a simple filter or action and don't feel like going through all the hassle of creating a new plugin for it, you can just use the Nano Plugin Manager. It's faster and easier. I estimate that for the simplest of tasks you can get away with about 10 times less typing and clicking.

Suppose you just need to sort your posts alphabetically by title, a plugin for it might take a dozen lines or so. But by using a nano plugin, you just specify the filter name (posts_orderby) and the filter content (return 'post_title';) and let the magic do everything else.

Perhaps if you'd only need one nano plugin, using our Nano Plugin Manager would not be justified. But in case you need more of them, it would make your work much easier.

== Installation ==

1. Upload `nano-plugin-manager` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Exactly how secure is this? =

Quite secure, I'd say. Access to the administration menu requires the `edit_plugins` capability. If one can edit plugins, one can make the server parse any PHP code one wants.

== Screenshots ==

1. Nano plugin listing
2. The edit screen

== Changelog ==

= 0.9.2 =
* Minor constants code improvement
= 0.9.1 =
* Bugfix: WordPress extend changed my plugin directory name so nothing was working anymore. It's fixed now.
= 0.9 =
* Initial release.

== Upgrade Notice ==

= 0.9.2 =
* Minor constants code improvement
= 0.9.1 =
* Bugfix: WordPress extend changed my plugin directory name so nothing was working anymore. It's fixed now.
= 0.9 =
* Initial release.
