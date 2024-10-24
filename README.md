# Travel Packages Manager Plugin

## Description

**Travel Packages Manager** is a custom WordPress plugin designed to create and manage a custom post type for travel packages. With this plugin, you can add travel packages with details like price and availability, and display them on the front end using a custom template. The plugin is ideal for travel agencies or tour operators who want to showcase available travel packages on their WordPress site.

## Features
![Add New Travel Package  — WordPress Plugin](https://github.com/user-attachments/assets/e5c7e115-edb5-4494-9b08-82298093ddaf)

- Adds a new custom post type: **Travel Packages**
- Each travel package includes:
  - Title
  - Description (using the default WordPress editor)
  - Price (input field)
  - Availability (dropdown: Available, Fully Booked, Limited Spots)
- Custom icon for the travel packages in the WordPress dashboard
- Automatically creates an archive for travel packages at `/travel-packages`
- Front-end template to display individual travel packages in a user-friendly layout

## Directory Structure

```
wp-content/plugins/travel-packages-manager/
├── travel-packages-manager.php
└── templates/
    └── single-travel-package.php
```

## Installation

1. Download the plugin files and extract the ZIP archive.
2. Upload the plugin folder to your `/wp-content/plugins/` directory or install the plugin through the WordPress plugins screen directly.
3. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage

1. Once the plugin is activated, you will see a new menu item labeled **Travel Packages** in the WordPress dashboard.
2. To add a new travel package, click **Add New** under the **Travel Packages** menu.
3. Fill in the required fields, such as title, description, price, and availability.
4. After publishing, the travel package will appear on the front end at `yourdomain.com/travel-packages/`.
5. Single travel packages are displayed using a custom template provided by the plugin.

## Template Customization

The plugin provides a basic front-end template to display individual travel packages. You can find the template file inside the `templates` directory: 

`/wp-content/plugins/travel-packages-manager/templates/single-travel-package.php`
![Travel Package](https://github.com/user-attachments/assets/0d58cba3-0fd8-4ee2-aefe-d00471ef3632)

Feel free to customize this file to suit your theme’s design.

## Code Structure

- **Custom Post Type**: Registered in `register_travel_package_post_type()`.
- **Meta Boxes**: Fields for price and availability are added using the meta box system (`add_travel_package_meta_box()`) and saved using the `save_travel_package_meta_box()` function.
- **Custom Template**: The single travel package template is loaded via the `load_travel_package_template()` function.

## Contributing

If you want to contribute to the development of this plugin:

1. Fork the repository.
2. Create a new feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request!

## License

This plugin is open-source and licensed under the [GPL-2.0 License](https://opensource.org/licenses/GPL-2.0).

## Author

Developed by Saman Yazdannik.
