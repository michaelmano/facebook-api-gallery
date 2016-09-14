# facebook-api-gallery
##Simple cronjob script that pulls all image URLS from the facebook API and builds a gallery file

**Step 1:** Go to your facebook page which should already be created, if not create one and grab the id seen in the URL some times they are the name of the page and a hyphen e.g. test-298679667156513 the numbers are your id. Paste this into a notepad.

**Step 2:** Create an app here https://developers.facebook.com/apps/ Once created Go back to https://developers.facebook.com/apps/ and select the app.

**Step 3:** Copy the App ID into your notepad.

**Step 4:** Go to https://developers.facebook.com/tools/explorer/ and up the top right where it says Application: **[?] Graph API Explorer Change it to your apps name.

**Step 5:** Now where it says Access Token: **on the right hand side where it says Get Token, Change this to get page access token and Allow it when the pop up comes up.

**Step 6:** Where it says Access Token: **select the Information Icon (i) at the left of the input. and now select the bottom right button. Open in Access Token tool.

**Step 7:** Now Select Extend Access Token and copy this token.

**Step 8:** Go back to https://developers.facebook.com/tools/explorer/ and paste this code back into the Access token field and change the Get Token to the Pages name and click the (i) icon again and select Open in Access Token Tool, It should say Expires: never.

**Step 9:** Copy the token at the top of the page next to where it says debug. Now you can fill out the fields in the gallery script with the account name being the pages ID, Paste the access token in under access_token and you are ready to run the script.

##Completed!

All that's left now is going to your URL eg http://my-site.com/script-name.php?cronjob=2s3213wsavgc123wqsdcx12wdc  (if you changed the cron job code change it in the URL if you removed it remove it also).

Now you should have a file called facebook-gallery.php, You can include this anywhere on your site. To update the script every few hours / weeks or when ever you want just set up a cron job

\* */12 * * * wget -q -O - http://my-site.com/script-name.php?cronjob=2s3213wsavgc123wqsdcx12wdc >/dev/null 2>&1 >/dev/null 2>&1

this runs every 12 hours 
You can find an easy way to make cronjobs here http://crontab-generator.org/ 

If you are using cPanel the below is how to set one up.
The benefits of using a cron job over just doing the request when users visit is it takes stress off the server having to request that information on every page load

Log into cPanel.
In the Advanced section, click Cron Jobs.
Under Cron Email, make sure the current email address is valid. If not, enter a new, valid email and click Update Email. You will receive an email after the cron job has finished.
Under Add New Cron Job, use the Common Settings drop-down menu to choose from a list of regularly used intervals; or set the frequency of your cron job by using the drop-down box next to each time unit. Common settings range from every minute to once a year.
In the Command field, enter the desired command.
Click Add New Cron Job.






