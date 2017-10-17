## Microtags Wordpress Plugin ##

**Micro-tags** is a WopdPress plugin that provides possibilities to represent official school data in form required by Russian education ministry. The plugin adds special tags in the generated HTML-code.

This plugin was tested with WordPress 4.8.1-4.8.2.

For its work the plugin uses the EasyUI jQuery framework and TinyMCE editor. 

Language of the plugin in Russian. The localization of the plugin is currently impossible.

The plugin is based on the [WordPress-Plugin-Boilerplate plugin template](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).


### Possibilities of the version 1.0.0 ###

- Creation of the tags subsets according the official data classification;
- Editing the official data within the administative panel and link them with a requiered special tags;
- Presentation an official data within the front-end pages with included special tags;

To include the taged data, the following short-code should is used:

**[micro-tags id_part=<part's ID>]**

where id_part parameter is an identifier of the official data tags subset.
 