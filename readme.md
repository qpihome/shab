Installation: 
1. Upload this to a webserver 
2. Create a mySQL Database 
3. Enter mySQL-Login Data into the config.php
Usage: 
Pretty simple. 
Every Sensor has an own id, called sid, which can be alphanumeric. 
For example ds1820. Then we can add to this id sensor data by submitting it via the link.
Example: http://yourhost/index.php?controller=submit&sid=ds1820&var=22.33 //Saves the value 22.33 and the sid into the database

You dont need to create the table. If it not exists it will be created. If the entry does not exists in the table, it will be created. Otherwise it will be updated.


To get the data from the server just go to: index.php?controller=get&sid=ds1820
Your Result should be something like this:
<sid>ds118</sid><var>22.33</var><updated>1488312335</updated>

*The updated column is a unix timestamp and gets added automatically. In OpenHAB you can just filter out your SensorValue with Regex.

Have Fun!
