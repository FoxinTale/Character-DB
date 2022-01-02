# Character-DB

A character database I made to store character information for folks to use.

### 2021 Rewrite
A total overhaul of the back end and front end, stripping out unused content leaving less bugs, adding a whole lot of new features.
As this will go into 2022, the rewrite was started in mid December 2021, which is why it is called the 2021 rewrite.

#### What changed this time?
- Rewrote every page to use a single CSS file...becuase I felt like it.
- Removed the immediate need to log in, and the site can be browsed without the need to log in now, which in turn fixed the authentication bypass issues.
- Added more fields for data entry.
- Removed the fun stuff for good. It caused too many bugs to be worth it.  May re-add in the future, but no promises.
- Removed browser ponies for the same reason as fun stuff...
- Added more content to the resources page.
- Added an about page that describes the journey behind the site.
- Changed the theme (names) of the site to be more themed like a journal.
- Added a new section about "The Omega Timeline".
- The large text boxes actually expand as you type now.
- Overhauled the mySQL backend by modelling a new database, which adds  more features.
- Properly handled HTML encoded characters when displayed. 
- Gracefully handled if there's no input from the user, it auto-fills the area in the database.
- Reworked and overhauled how individual characters are displayed...I hated the accordians.
- Figured out how to make characters be sharable with other people. 
- Handled it if the shared link is an invalid character ID number.




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
 - [x] Get HTTPS on the domain so stuff is encrypted.
 - [x] Add / fix user permissions.
 - [ ] Add a lockout policy to auto logout after a preset amount of time.
 - [ ] Create a custom admin user interface instead of using external 'PHPMyAdmin".
 - [x] Fix the improper logout and properly destroy the session.
 - [ ] Implement a functionality for users to be able to edit and delete their own information.
 - [x] Add a way for characters to be shared. No point in creating a character if you can't share it with others, after all. (It was HTTP GET request using the charID).
 - [ ] Image uploads. For character appearances. Make it work.
 - [ ] Add profile customuisation, such as changing ones username.
 - [ ] Password reset functionality.
 - [ ] Exportable (downloadable) information, probably in a json or XML format. 


## Credits
- w3-min.css is a trimmed down customized version of [w3.css](https://www.w3schools.com/w3css/w3css_downloads.asp).