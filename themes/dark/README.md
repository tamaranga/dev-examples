# Dark Theme Example

A minimal dark theme implementation for Tamaranga Platform demonstrating homepage styling customization.

## Overview

This example theme showcases how to create a dark mode variant of the Platform theme by implementing custom CSS overrides. The theme applies dark styling specifically to the index page while maintaining compatibility with the base Platform theme.

## Features

- **Dark Color Scheme**: Complete dark mode implementation for the homepage
- **CSS Variables**: Uses CSS custom properties for consistent color management
- **Responsive Design**: Maintains responsiveness across different screen sizes
- **Component Coverage**: Covers all major UI components including:
  - Navigation and dropdowns
  - Search functionality
  - Item listings and grids
  - Forms and inputs
  - Maps and interactive elements
  - Footer and header sections

## Implementation Details

### Color Palette
- **Background**: Dark grey (#222222)
- **Component Background**: Medium grey (#333333) 
- **Borders**: Light grey (#525252)
- **Text**: White (#fff)
- **Accents**: Black (#000000)

### Key Components Styled
- Category sliders and dropdowns
- Item grids and company listings
- Search filters and forms
- Interactive maps
- Navigation elements
- Footer sections

## Usage

This theme extends the base `Platform` theme and applies dark styling through the `dark.css` file. The styling is scoped to `.is-index-page` to affect only the homepage, allowing other pages to maintain their original appearance.

## File Structure

```
dark/
├── README.md          # This documentation
├── index.php          # Theme definition
└── static/
    └── css/
        └── dark.css   # Dark theme styles
```