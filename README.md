1. Email a random XKCD challenge
Please create a simple PHP application that accepts a visitor’s email address and emails them random XKCD comics every five minutes.

Your app should include email verification to avoid people using others’ email addresses.
XKCD image should go as an email attachment as well as inline image content.
You can visit https://c.xkcd.com/random/comic/ programmatically to return a random comic URL and then use JSON API for details https://xkcd.com/json.html
Please make sure your emails contain an unsubscribe link so a user can stop getting emails.
Since this is a simple project it must be done in core PHP including API calls, recurring emails, including attachments should happen in core PHP. Please do not use any libraries.

Live Demo link = http://mailrandomcomic.000webhostapp.com/.

Now, Steps to run this project.
1. Download the whole repo.
2. Enter your webserver credentials provided by your host in ConnectToDB.php file.
3. Database will look something like this (feel free to give any name to your database and table.):-
   3.1 ![image](https://user-images.githubusercontent.com/50420577/122715738-f7379e00-d286-11eb-9e66-12315400046b.png)
   3.2 After creating database change table name( if you have given different names.) in sql queries in the code.
4. Now Enter your mail account credentials in SendMailConfig.php file. 
5. Now run index.html file.
6. Enter you recipient email-id.
7. Click on New User button.
8. You will recive verification link on your registered mail-id.
9. ***Now it may happen your webhost won't provide cron job execution service, what to do then?***                                                                               
   9.1 register yourself on this website https://cron-job.org/  .                                                                                                                 
  ***INFO :-  getRandomComic.php(this file sends random comic in mails body to registered users) is the job which should run every 5min.***                                        
   9.2 Go to job section and add this url http://mailrandomcomic.000webhostapp.com/getRandomComic.php .                                                                            
   9.3 change other settings if you want and then create job.                                                                                                                          
10. Well done. Now just wait for 5min.  

***Issues with hosting server****

**1.if webhost server not able to handle cron jobs perfectly. but to check if my code is working or not
please enter open this url http://mailrandomcomic.000webhostapp.com/getRandomComic.php after verifying your email-id.**
  
2. I have used PHPmailer because 000webhost was not able to send mail through php core function mail.
