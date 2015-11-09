# ARCADE - Photo Gallery

Arcade is a photo gallery powered by PHP and using an XML file for configuration. No databases are required. For a list of version requirements see below.

# Requirements

Arcade was developed on Nginx 1.9.4 and PHP 5.5.28.

There's no code that should hinder it's operation on Apache servers.

**Recommended**

* PHP 5.5+

**Minimum**

* PHP 5.4+ (earlier versions may work, but are untested/unsupported)

# Installation

1. Download the package from the releases section.
2. Unzip and upload it to your desired location.
3. Copy the `/resources/config.xml` file over to `/data/config.xml` and make relevant changes.
4. Upload all your images into the `/data/img` directory. Make sure you create subdirectories for your categories. Only images in a subcategory, regardless of it's name, will be displayed.

# Third Party Images

You can utilize third party image storing services to display some of your pictures. Currently only Instagram is supported, but more will likely come. Below are instructions on how to utilize each supported service.

## Instagram

You'll need your `user_id` and `access_token` in order to retriece your images. You can use a script I wrote, [instauth](https://github.com/septor/instauth), by going [here](http://septor.xyz/instauth). You can optionally go to the script's page and set it up yourself to make sure I'm not stealing your dataz!

Once you've obtained these items you'll need to open the `/data/tokens.php` file and insert the required information. Now you need to update your `/data/config.xml` file to include the added entries:

```
<thirdPartyImages>
  <instagram enabled="false" imagesToDisplay="10" />
</thirdPartyImages>
```

Obviously you'll want to change the enabled parameter to true, and increase or decrease the number to display to your desired amount.

# Credits

Below is a list of open source, or freely obtainable, projects used to make Arcade what it is. In some cases the beginning item has been heavily modified to suit the needs of the project. I have made notes next to each item to indicate that the version you look into may not function like it functions in Arcade.

* The Magnetic template created by [Pixelhint](http://pixelhint.com/) was used as a base layout for Arcade. The code is modified, but the overall look is roughly the same.
* [Font Awesome](https://fortawesome.github.io/Font-Awesome/) is used for the social media icons (and possibly others down the line).
* [Magnific Popup](http://dimsemenov.com/plugins/magnific-popup/) will be used for lightbox functionality.
