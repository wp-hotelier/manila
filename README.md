# Manila
[![npm](https://img.shields.io/npm/v/npm.svg)]()
[![XO code style](https://img.shields.io/badge/code_style-XO-5ed9c7.svg)](https://github.com/sindresorhus/xo)

Welcome to the [Manila](https://wphotelier.com/manila) GitHub repository. Manila is a free WordPress blank content theme for [Easy WP Hotelier plugin](https://wphotelier.com). Developed to offer a free solution for the [Easy WP Hotelier plugin](https://wphotelier.com). The documentation for the [Easy WP Hotelier plugin](https://wphotelier.com) can be found on [WPHotelier.com](https://wphotelier.com), here you can browse the source of the project, find and discuss open issues.

## Installation ##

1. Clone this repository or download the last release directly as a ZIP file [here](https://github.com/easy-wp-hotelier/manila/releases).
2. Like any other WordPress theme, place it in `/wp-content/themes/` (the extracted `manila` folder). Or upload the **manila.zip** file navigating to `Appearance > Themes > Add New`.

## NPM usage

This repository comes with a ready to use `package.json` file that allows you to run and watch some powerful tasks. You can compile your Sass files, preview your changes and so on.

The first thing you need to do is install the npm dependencies. So, with the terminal cd into the **manila** folder and run `npm install`.

To make your life easier, the project uses a `.npmrc` file (not included in this repo) to pass the project configuration values. So, create a `.npmrc` file in the root of the **manila** folder and adjust the following settings:

```bash
P_SLUG=manila
P_NICENAME=Manila
P_POT_BUG_REPORT=https://example.com
P_POT_TEAM=Team Name <info@example.com>
P_URL='http://path-to-your-wordpress-installation'
P_SSHPORT='22'
P_SYNCDEST='username@hostname:path'
P_DEPLOYPORT='22'
P_DEPLOYDEST='username@hostname:path'
```

Settings in detail:

* `P_SLUG`: Slug of your theme
* `P_NICENAME`: Nicename of your theme
* `P_POT_BUG_REPORT`: URL to report bugs
* `P_POT_TEAM`: Translators team name and email
* `P_URL`: proxy URL to view your site; more info [here](https://browsersync.io/docs/options#option-proxy)
* `P_SSHPORT`: SSH port
* `P_SYNCDEST`: rsync destination; for example `username@hostname:/var/www/html/wordpress/wp-content/plugins/wp-hotelier`
* `P_DEPLOYPORT`: SSH port (for deploy)
* `P_DEPLOYDEST`: rsync destination (for deploy); for example `username@hostname:/var/www/html/wordpress/wp-content/plugins/wp-hotelier`

## Tasks included

There are six tasks you can run during the development of Manila. And four of them (`build`, `build-sync`, `build-server` and `build-sync-server`) watch for changes.

### build

This task compiles Sass files, optimizes the CSS, lints the Javascript files and generates the `pot` file of Manila. Just run this command in the terminal:

```bash
npm run build
```

### build-sync

Same as the build task plus the possibility to sync the **manila** folder with another folder in a different server or VM. Useful to sync a local **manila** folder with the folder in `wp-content/themes/manila` (in another server or VM). You need to specify a correct destination and SSH port in the `.npmrc` file: `P_SYNCDEST` and `P_SSHPORT`.

Run this command in the terminal:

```bash
npm run build-sync
```

### build-server

Same as the build task plus the possibility to sync your WP installation across multiple devices with Browsersync. You need to specify a correct proxy URL in the `.npmrc` file: `P_URL`.

Run this command in the terminal:

```bash
npm run build-server
```

### build-sync-server

All the previous three tasks together.

Run this command in the terminal:

```bash
npm run build-sync-server
```

### dist

Run this command to create a zip file containing the production files:

```bash
npm run dist
```

### deploy

Run this command to transfer your files on your desired server. You need to specify a correct destination and SSH port in the `.npmrc` file: `P_DEPLOYDEST` and `P_DEPLOYPORT`.

```bash
npm run deploy
```

## Scope of this repository ##

This repository is not suitable for support or customizations. But to report bugs only.

Questions like "How can I change the position of the element X?" or "How can I change the color to the element Y?" **will be closed immediately**. This is a free *starter* theme developed to offer a free solution for the Easy WP Hotelier. For questions related to Easy WP Hotelier use the [support forum on wp.org](https://wordpress.org/support/plugin/wp-hotelier).
