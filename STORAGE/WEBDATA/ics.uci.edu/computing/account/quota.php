account quota @ the bren school of information and computer sciences» Account

    » New User Guide» Activation» Password Change/Reset» Quota» Renewal» Mapping Network Drive
      » Windows» Mac» FAQs


    » E-mail

    » ICS Google Mail» Specify Delivery Point» Webmail» Thunderbird for ICS Gmail» Thunderbird» Mailing Lists» Forwarding/Vacation/Spam Settings» Email Servers Information» Checking Group Account Email


    » Network

    » UCInet Mobile» VPN» ICS Netreg» UCI Weather Report» Open Port Request


    » Linux
    
    » ICS hosts» Changing shell» Using modules» Security» Group account access (gsu)» Sun Grid Engine


    » Other Services

    » Labs» Printing» Activate MS Office» Sophos
      » Windows» Mac» Microsoft DreamSpark» File Restore
      » Self-restore snapshot» Restore request» Quarterly announcements   
 

    » Web
    
    » Personal Webpage» General Information   


    » Policies
    
    » Ethics» Ethics Summary


    » Contact
    
    » Helpdesk» Support Staff» Who To Contact






  
Account Quota




Each account type is assigned a different amount of quota as listed below. If your advisor has his/her own space, you may request for your account to be moved there.  This may result in a higher quota.  Please check with your advisor for details.
If you need more space, please try using the Student Extra Space (not backed up).  To access this storage, ssh into openlab.ics.uci.edu, navigate to /extra/ugrad_space, and create a folder with your username, for example: /extra/ugrad_space/peter.  Please be aware that anything that you store here will not be backed up, so plan accordingly.  
Quota Allocation
Checking Your Quota
Quota Reminder

Quota Allocation
Students
Undergrad - 500MBGrad - 10GB



Staff 
8GB

Faculty 
10GB

Visitor 
300MB

 
Checking Your Quota
Login to one of the ICS hostsAt the prompt, type in the command quota -vYou will then get a return of something like this:
 An account that is under quota.
suzieanteater% /usr/sbin/quota -vDisk quotas for santeater (uid 1234):Filesystem       usage  quota  limit timeleft  files  quota  limit timeleft/home/santeater   1409   2000   4000            209      0      0
In this example, Suzie Anteater has a quota of 2 MB, and a hard limit of
4 MB. She has used 1.4 MB worth of space and has 209 files in her 
account.
 An account that is over quota.
peteranteater% /usr/sbin/quota -vDisk quotas for panteater (uid 4567):Filesystem       usage  quota  limit  timeleft  files  quota  limit timeleft/home/panteater   2404  4000   4000  3.0 days          209      0      0
In this example, Peter's usage is above the quota limit, and unless
his quota is brought down below the limit within 3 days, he will be
locked out of his account, or he may lose files.


 
Quota Reminder
Would you like to receive a reminder when you are almost maxing out your quota? Please login to Mailboss and choose when to receive such notifications.






UC copyright | UCI directory | Intranet | Site Map | icswebmaster@ics.uci.edu |     | Updated: January 03 2014