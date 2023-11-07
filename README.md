# Custom Popup Plugin

Custom Popup Plugin is a WordPress plugin that allows you to display a customizable HTML popup on your website. You can set the content of the popup and control when it appears, either after a specified delay or upon a button click.

## Features

- Easily create and customize HTML popups.
- Choose to display the popup after a specified delay or manually trigger it with a button click.
- Set the delay time for the popup appearance.
- Responsive and user-friendly design.

## Installation

To install the Custom Popup Plugin, follow these steps:

1. Download the plugin files from this repository.
2. Upload the entire `custom-popup-plugin` folder to the `wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin from the WordPress admin panel.

## Configuration

After activating the plugin, you can configure its settings:

1. In your WordPress admin panel, go to **Settings > Popup Settings**.
2. You will find options to set the HTML content for the popup and the delay time (in minutes) for the popup to appear automatically.
3. You can also use the `[custom_popup_button]` shortcode to generate a button that triggers the popup manually.

## Usage

### Automatic Popup

To display the popup automatically after a specified delay, follow these steps:

1. Set the desired HTML content for the popup in the plugin settings.
2. Specify the delay time in minutes (0 for immediate display or -1 to disable automatic popup).
3. Save the settings.

### Manual Popup

To display the popup manually using a button click, follow these steps:

1. Place the `[custom_popup_button]` shortcode in any post or page content where you want the button to appear.
2. Visitors can click the "Open Popup" button to show the popup.

## Styling

You can customize the appearance of the popup by editing the `custom-popup-plugin.css` file in the plugin directory. This file contains CSS styles for the popup overlay, content, and close button.

## License

This plugin is released under the [GNU General Public License v3.0](LICENSE.md).

## Author

- Author: D.kandekore

## Version

- Version: 1.0


