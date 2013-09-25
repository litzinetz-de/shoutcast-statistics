Shoutcast Statistics
====================

This PHP-script allows tracing the count of listeners of one or more shoutcast servers.

The script queries all the configured shoutcast servers (triggered by cronjob) and stores the count of users in a mysql database.

The stored data can be used to generate a graph, displaying the trend of users over a specific period of time. Old data is deleted automatically.

Installation
============

Copy the files to a path on your webserver.

Use this crontab to make the script getting/deleting data automatically:

*/2     *       *       *       *       php /path/to/script/make_plot.php
1       3       *       *       *       php /path/to/script/autodel.php