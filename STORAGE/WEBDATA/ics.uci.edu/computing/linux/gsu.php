gsu group home directory @ the bren school of information and computer sciences» Account

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






  
Accessing group home directory using GSU module




To access a group account from a linux host, you must first login to one of the ICS hosts.  Once logged in, you will then utilize the gsu module.  If you would like to be part of an existing group account or to create a new group account, please send a request to helpdesk.
At the prompt, type:
gsu groupAccountName
If you get a "command not found" error, type:
module load gsu
If you get an error that says "you won't be doing that today," please check that your group account name is entered correctly and try again.If you still get an error, please send an email message to helpdesk.
You will then be prompted for a password.  Please type your ICS password.You are now the groupAccountName user.  However, you may still be in your own home directory. 
To see if you are in the right place, at the prompt enter:
pwd
If you see /home/yourUsername then you need move to the group account home directory:
cd /home/groupAccountName

Done!







Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
December 03 2013