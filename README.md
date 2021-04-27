# Character-DB

A character database I made to store character information for folks to use.


### The mobile rewrite.
Just as it says, it's a total rewrite of the entire site.
#### What changed? 
- Included usage of W3.css for a more mobile friendly website.
- Rewrote the pages to use w3.css instead of their own css files.
- Overhauled and rewrote the navigation menu to be mobile friendly.
- Rewrote the display tabs and accordions to not use jQuery, and as much CSS as possible.
- Purged a lot of div tags, replacing them with more proper elements wherever possible.
- Changed the entire information display methodology, replacing readonly inputs with p or span tags wherever possible.
- Temporarily removed the funstuff page while it undergoes extensive maintenance and its own overhaul.
- Removed the mechanism that allowed one to fill empty blank spots with "N/A", as it didn't really work in the first place.
- Utilized more of the custom fonts that were put in initially. 



 ## To do List:
 - Banish the usage of PHP.
 - Switch to a much more competent language with less security issues. With what? I'm unsure. But PHP sucks.
 - Add /fix user permissions.
 - When the site is re-implemented in production, add or utilize HTTPS.
 - Add a lockout policy to auto logout after a preset amount of time.
 - Create a custom admin user interface instead of using external 'PHPMyAdmin".
 - Fix the improper logout and properly destroy the session.
 - Implement a functionality for users to be able to edit and delete their own information.
 - Replace the test user with screenshots of the site to showcase it instead.
 

## Credits
- w3-min.css is a trimmed down customized version of [w3.css](https://www.w3schools.com/w3css/w3css_downloads.asp).