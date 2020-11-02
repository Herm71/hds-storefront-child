# Home Decor Specialists WooCommerce Storefront Child Theme #

| [![Github latest release](https://badgen.net/github/release/Herm71/hds-storefront-child?icon=github)](https://github.com/Herm71/hds-storefront-child)  | [![Github latest tag](https://badgen.net/github/tag/Herm71/hds-storefront-child?icon=github&&color=orange)](https://github.com/Herm71/hds-storefront-child)  | [![GitHub issues](https://badgen.net/github/open-issues/Herm71/hds-storefront-child?icon=github)](https://github.com/Herm71/hds-storefront-child)  | [![TODOs](https://img.shields.io/endpoint?url=https://todos.tickgit.com/badge?repo=github.com/Herm71/hds-storefront-child)](https://todos.tickgit.com/browse?repo=github.com/Herm71/hds-storefront-child)
  |

## Summary ##

WordPress child theme of WooCommerce [Storefront](https://woocommerce.com/storefront/) theme. Can be used on any WordPress/WooCommerce site that has Storefront installed. Design inspiration from WooCommerce [Homestore](https://themes.woocommerce.com/homestore/) child theme.

## Installation ##

### Production ###

This theme can be installed as-is to any live WordPress/WooCommerce site that has the Storefront theme installed. You can install the [Storefront](https://wordpress.org/themes/storefront/) theme from your site's **Dashboard**, you can download it from WordPress.org or you can install it via wp-cli: `wp theme install storefront`.

Once Storefront is installed, you can download the [latest release](https://github.com/Herm71/hds-storefront-child/releases) of this theme, then upload and activate via the **Dashboard**.

This theme is fully compatible with the WordPress theme customizer.

### Develop ###

Feel free to use this as a base to develop your own child theme. I am not accepting pull-requests on forks for this project, so if you clone this to your own project, you must set up your own repsitory for development.

#### Prerequisites ####

* **WordPress Development Environment:** Installation assumes you have a [WordPress development environment] (<https://developer.wordpress.org/themes/getting-started/setting-up-a-development-environment/>) set up. My preferred local development tool is [Lando](https://lando.dev/).
* **WooCommerce plugin:** This is an eCommerce theme intended for sites that use [WooCommerce](https://woocommerce.com/).

    ```shell
    #Via WP-CLI
    Herm71@blackbird:$ wp plugin install --activate woocommerce
    ```

* **WooCommerce Storefront theme:** This is a [Child Theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/) of the official [WooCommerce Storefront](https://woocommerce.com/storefront/) theme.

    ```shell
    #Via WP-CLI
    Herm71@blackbird:$ wp theme install storefront
    ```

* **npm:** [npm](https://www.npmjs.com/) is required to install dependencies. If you are on a Mac or Linux, npm can be installed easily via [Homebrew](https://brew.sh/).
* **gulp:** [gulp](https://www.npmjs.com/package/gulp) is required to be installed locally to run build tasks.

    ```shell
    Herm71@blackbird:$ npm -i -g gulp
    ```

#### Install ####

1. Clone into your Wordpress dev environment's `/themes/` folder:

    ```shell
    Herm71@blackbird:$ git clone git@github.com:Herm71/hds-storefront-child.git /myWpLocalDev/wp-content/themes/hds-storefront-child/
    ```

2. `cd` into newly created folder

    ```shell
    Herm71@blackbird:$ cd /myWpLocalDev/wp-content/themes/hds-storefront-child/
    ```

3. Install packages

    ```shell
    Herm71@blackbird:$ npm install
    ```

### Gulp tasks ###

The `gulpfile.babel.js` file has several tasks available for use. Look at the actual file to see all of them. There are tasks that I do not use here. Feel free to incorporate them into your own workflow. Below are the tasks I use most often:

```shell
#Regenerate styles
Herm71@blackbird:$ gulp styles
```

```shell
#Build and bundle theme
Herm71@blackbird:$ gulp build
```

## Developer ##

* [Jason Chafin](https://github.com/Herm71)
