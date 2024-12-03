# Kadabra IT Content Module

This Drupal module provides functionality to display user-specific content:
- A page that shows the last 10 content items created by the logged-in user
- A block on the homepage that displays the last 3 content items created by the logged-in user

## Prerequisites

- Drupal 9.x or 10.x installed and running
- Access to the web server hosting Drupal
- SSH access to the server (recommended)
- Composer installed on the server

## Installation Steps

### 1. Copy the Module

```bash
# Navigate to Drupal's custom modules directory
cd /path/to/drupal/web/modules/custom

# Clone or copy the module
git clone [REPOSITORY_URL] kadabrait_content
# Or copy the module files directly to the kadabrait_content folder
```

### 2. Install Dependencies (If using Composer)

```bash
# Navigate to Drupal root directory
cd /path/to/drupal

# Make sure the module is registered in composer.json
composer require drupal/kadabrait_content:@dev

# Update dependencies
composer install
```

### 3. Install the Module

There are two ways to install the module:

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
