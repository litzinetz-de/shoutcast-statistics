Shoutcast Statistics
====================

This PHP-script allows tracing the count of listeners of one or more shoutcast servers.

The script queries all the configured shoutcast servers (triggered by cronjob) and stores the count of users in a mysql database.

The stored data can be used to generate a graph, displaying the trend of users over a specific period of time.