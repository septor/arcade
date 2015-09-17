# ARCADE - Photo Gallery

Arcade is a photo gallery powered by PHP and using an XML file for configuration. No databases are required. GD2 is used to generate thumbnails. For a list of version requirements see below.

## Requirements

Arcade was developed on Nginx 1.9.4, PHP 5.5.28, and GD 2.1.0.
There's no code that should hinder it's operation on Apache servers.

**Recommended**

* PHP 5.5+
* GD 2.1+

**Minimum**

* PHP 5.4+ (earlier versions may work, but are untested/unsupported)
* GD 2.1+

## Installation

1. Download the package from the releases section.
2. Unzip and upload it to your desired location.
3. Copy the `/resources/config.xml` file over to `/data/config.xml` and make relevant changes.
4. Upload all your images into the `/data/img` directory. Make sure you create subdirectories for your categories. Only images in a subcategory, regardless of it's name, will be displayed.

## Credits

Below is a list of open source, or freely obtainable, projects used to make Arcade what it is. In some cases the beginning item has been heavily modified to suit the needs of the project. I have made notes next to each item to indicate that the version you look into may not function like it functions in Arcade.

* The Magnetic template created by [Pixelhint](http://pixelhint.com/) was used as a base layout for Arcade. The code is modified, but the overall look is roughly the same.
* [Font Awesome](https://fortawesome.github.io/Font-Awesome/) is used for the social media icons (and possibly others down the line).
* [Magnific Popup](http://dimsemenov.com/plugins/magnific-popup/) will be used for lightbox functionality.
