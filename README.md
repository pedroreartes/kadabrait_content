# Kadabra IT Content Module

This Drupal module provides functionality to display user-specific content:
- A page that shows the last 10 content items created by the logged-in user
- A block on the homepage that displays the last 3 content items created by the logged-in user

## Prerequisites

- Drupal 9.x, 10.x, or 11.x installed and running
- Access to the web server hosting Drupal
- SSH access to the server (recommended)
- Composer installed on the server

## Installation Steps

### 1. Add Custom Repository (Method A - Recommended)

Add this repository to your project's composer.json:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:pedroreartes/kadabrait_content.git"
        }
    ]
}
```

Then install the module:

```bash
composer require custom/kadabrait_content:dev-main
```

### 2. Manual Installation (Method B)

```bash
# Navigate to Drupal's custom modules directory
cd /path/to/drupal/web/modules/custom

# Clone the repository
git clone git@github.com:pedroreartes/kadabrait_content.git kadabrait_content

# Navigate to the module directory
cd kadabrait_content

# Install module dependencies
composer install
```

### 3. Enable the Module

#### Option A: Using Drush (Recommended)
```bash
# Navigate to Drupal root directory
cd /path/to/drupal

# Install the module
drush en kadabrait_content

# Clear cache
drush cr
```

#### Option B: Using the Web Interface
1. Go to Administration > Extend (`/admin/modules`)
2. Find "Kadabra IT Content" in the modules list
3. Check the box next to the module
4. Click "Install" at the bottom of the page
5. Confirm the installation

### 4. Verify Installation

1. Log in as an authenticated user
2. Verify that you can access the contents page at `/user-contents`
3. Verify that the block appears on the homepage (only visible to logged-in users)

### 5. Troubleshooting

If you encounter issues during installation:

1. Check Drupal logs:
   - Go to Administration > Reports > Recent log messages (`/admin/reports/dblog`)
   - Look for error messages related to 'kadabrait_content'

2. Check permissions:
   - Go to Administration > People > Permissions (`/admin/people/permissions`)
   - Ensure appropriate roles have the "Access user contents" permission

3. If the block doesn't appear:
   - Go to Administration > Structure > Block layout (`/admin/structure/block`)
   - Verify that the "User Contents Block" is configured in the "Sidebar first" region

4. Composer Issues:
   - If you get "could not be found in any version" error, make sure you've properly added the repository to your composer.json
   - Verify that the repository URL is correct
   - Try running `composer clear-cache` and then retry the installation

### 6. Support

If you encounter issues during installation, please:
1. Review the Drupal logs
2. Verify all prerequisites are met
3. Contact the development team at [TEAM_CONTACT]

## Additional Notes

- The module will automatically install the block in the left sidebar of the homepage
- Only authenticated users can view both the page and the block
- The page will display the last 10 content items created by the user
- The block will display the last 3 content items created by the user
- Compatible with Drupal 9.x, 10.x, and 11.x
