# Custom Twig Block Variables

This is a site-specific module that can help you output blocks from Drupal and Views as easy to use Twig variables.

Usage in Twig templates would just be {{ my_variable }} depending on what you define in the custom TwigBlock extended classes.  Within your theme's .theme file, add in the call to your custom class to preprocess the block output into a Twig variable.  A sample is provided for the .theme file.

This module is designed to be customized!