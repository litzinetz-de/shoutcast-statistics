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

Install the tables.sql in you mysql server.

Modify the mysql-credentials and database name in mysql.php.

The script will delete data plots after 120 days. You can change this in autodel.php.

Add your shoutcast-servers to the servers-table.

After installation, make sure your cronjob runs and the script collects data by filling the plots-table. You can generate graphs by opening index.php in your browser. Just pick a time range including date and time (24h-format) and press the "Run"-button. This will call stat.php which generates the graph.

The graphs are rendered using JPGraph. > http://jpgraph.net/
The GUI uses the following libs:
- JQuery Masked Input > https://github.com/digitalBush/jquery.maskedinput
- Calender > http://www.mattkruse.com/