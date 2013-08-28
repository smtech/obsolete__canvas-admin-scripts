# St. Mark's Canvas Customizations

A collection of customizations to the our [Canvas instance](http://stmarksschool.instructure.org), many of which are running off of our [development LAMP server](http://area51.stmarksschool.org)



### master

Ready for prime time, live and in use!



### dev-*

Features we're working on, forked from the most recent master/develop branch as appropriate. One feature per branch, no foolin'!



## Merged Forks

Forks that are merged into the master tree. The dev-* version of any fork is still the most current code for that fork, but the current live version is maintained in the master tree.



#### [dev-blackboard-import](http://github.com/smtech/canvas/tree/dev-blackboard-import/www/api/blackboard-import)

Import Blackboard ExportFiles and ArchiveFiles as Canvas courses. The current model is that a single API user (the Blackboard Import API Process) creates all of the course components via the API. The Blackboard export Zip archive and an import receipt XML file are also uploaded to the created course's files. The tool can also import the Blackboard export into an existing course, if the API user has full access to that course. I've configured our instance so that there is a Blackboard Import sub-account, over which the API process is an admin, and courses are move in and out of the sub-account by hand (it's an easy way to track where things are in the flow).

[Known Issues](http://github.com/smtech/canvas/issues?milestone=4)



#### [dev-calendar-ics](http://github.com/smtech/canvas/tree/dev-calendar-ics/www/api/calendar-ics)

A pair (trio?) of tools for working with Canvas and ICS feeds. There is an [export tool](http://github.com/smtech/canvas/tree/dev-calendar-ics/www/api/calendar-ics/export.php) that exposes the pre-existing ICS feed for course calendars and there is an [import tool](http://github.com/smtech/canvas/tree/dev-calendar-ics/www/api/calendar-ics/import.php) that pairs an ICS feed with (theoretically) a course, group or user in Canvas and imports all of the ICS events into that calendar, deleting any residual events created by prior imports of that pairing. The quasi-third tool, a [sync tool](http://github.com/smtech/canvas/tree/dev-calendar-ics/www/api/calendar-ics/sync.php), is really just a wrapper for using crontab to trigger regular re-imports of an ICS feed pairing.

Some care has been taken to protect privacy by not caching the actual calendar events in our MySQL database cache of ICS/Canvas pairings, but, of course, potentially private information is passing through third party hands, etc., etc.

This would benefit from an OAuth setup, so that individual users could set up their own pairings. However, at the moment, it requires administrative intervention and relies on a single API user, Calendar API Process, to handle all imports. The API user is an admin on our main account.

[Known Issues](http://github.com/smtech/canvas/issues?milestone=6)



## Development Forks

Forks that are still under development, that aren't yet ready for prime time.



### [dev-archive-discussions](http://github.com/smtech/canvas/tree/dev-archive-discussions/www/www/api/archive-discussions)

A tool to generate a JSON export of a course or group's discussions. Particularly useful for account-level groups that lack any meaningful copy/archive capabilities out of the box. Currently, this tool is works fine... so long as you have fewer than 50 discussions, each with fewer than 50 topic entries (because I haven't bothered to deal with the pagination in the Canvas API's responses -- I didn't need to for the one thing that I needed to back up).

[Known Issues](http://github.com/smtech/canvas/issues?milestone=5)



### [dev-canvas-api](http://github.com/smtech/canvas/tree/dev-canvas-api/www/api/dev/canvas-api.inc.php)

Working on a more robust, mature library for interacting with the Canvas API. More work on this means less work on every subsequent script.


### [dev-course-calendar](http://github.com/smtech/canvas/tree/dev-course-calendar/www/javascript/course-calendar.js)

A global JavaScript add-on to insert a link to the course calendar (that is, to a view of the calendar using that course as the filter context) into the course navigation menu. The location of the course calendar link can be customized i nthe javascript file.

[Known Issues](http://github.com/smtech/canvas/issues?milestone=1)



### [dev-discussion-permalinks](http://github.com/smtech/canvas/tree/dev-discussion-permalinks/www/javascript/discussion-permalinks.js)

A global JavaScript add-on to expose the permalinks to individual topic entries in discussions. Currently their placement (and naming) is fairly arbitrary and can only be changed by editing the JavaScript code.

[Known Issues](http://github.com/smtech/canvas/issues?milestone=3)



### [dev-resources-menu](http://github.com/smtech/canvas/tree/dev-resources-menu/www/javascript/resources-menu.js)

A global JavaScript add-on to insert an additional menu into the main navigation toolbar across the top of the screen. The contents of the menu can be customized in the javascript file.

[Known Issues](http://github.com/smtech/canvas/issues?milestone=2)



### [dev-discussion-permalinks](http://github.com/smtech/canvas/tree/dev-scripts/www/api/scripts)

Individual scripts to do specific things, but that also shouldn't [just](https://github.com/smtech/canvas/commit/88b77a269063a342808443256f2f173ddf5881b5) [be](https://github.com/smtech/canvas/commit/a22552daa520f73cfb75b3f0ae93d1b8a08438af) [committed](https://github.com/smtech/canvas/commit/b51f50b579a7dcb54f6934ae9dd0a3523415ad5a) to the master fork without testing.

[Known Issues](http://github.com/smtech/canvas/issues?milestone=8)