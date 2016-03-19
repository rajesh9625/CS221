thunderbird setup for ICS Gmail @ the bren school of information and computer sciences» Account

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






  
Thunderbird Setup for ICS Gmail




This tutorial is based on Thunderbird 24.3.0. If you're using a different version, the naming convention may differ, but the settings will remain the same.
 
This guide shows how to setup and access your ICS Gmail account via a web browser and/or Thunderbird.
Activating your ICS Gmail Account
If you have not changed your ICS password recently (since summer 2013), go to My Account at elnino.ics.uci.edu to change it.  You may skip Steps 1 and 2 if you already completed them as illustrated here. Set your email forwarding to ICS Gmail by selecting ICS Gmail at elnino.ics.uci.edu, too.  Save your new settings.  The changes can take up to two hours to propagate.Activate your ICS Gmail by visiting www.gmail.com and entering your ICS credentials (username@ics.uci.edu and your ICS password).  If you already have a personal Gmail account, you will need to click Add an Account to proceed.  If your password was successfully changed, you should be able to log in and will receive a welcome agreement/screen.  Please accept and continue to UCI Gmail's inbox.  If you wish to read your ICS mail only via a web browser, you can stop here. Otherwise, continue.  If you will be using Thunderbird (or any other mail client) to read your ICS Gmail mail, you need to enable Gmail's IMAP feature at www.gmail.com.  Select the Gear symbol on your top right corner, Settings, Forwarding and POP/IMAP, Enable Map, and Save Changes.Now, choose which folders you want to display on your email client.  Select the Gear symbol on your top right corner, Settings, Labels, and click on Show and Show in IMAP as needed. Next, you will add your newly-created ICS Gmail account to Thunderbird.  
Configuring Thunderbird for ICS Gmail
Start Thunderbird for the first time or go to Tools, Account Settings, down to Account Actions, select, and Add Mail Account if you have existing accounts configured on Thunderbird.In the Mail Account Setup window, enter your name and email address.  Enter your password here if you want to have it remembered. Click Continue.Thunderbird will now attempt to look for the IMAP information. Please make sure that you have IMAP selected.Click on Manual config in the lower left corner.  Enter the information as follows:
Incoming
IMAPServer hostname: imap.gmail.comPort: 993SSL: SSL/TLSAuthentication: Normal password
Outgoing
Server hostname: smtp.gmail.comPort: 587SSL: STARTTLSAuthentication: Normal passwordUsername: username@ics.uci.edu
 

 
Click Re-test and then Done.If you did not choose to have your password saved, you will now be prompted to enter your email password.

Go to Tools and select Account Settings. Under your new account's Server Settings, click on the Advanced button to your right.
Make sure that IMAP server directory is empty. Uncheck Show only subscribed folders if checked. Uncheck Allow server to override these namespaces if checked.
 

 
If you have multiple accounts, you might want to display your ICS Gmail account first.  To do so, on Account Settings, select your ICS Gmail account from the left pane, Account Actions at the bottom, Set as Default.  Please restart to have the changes applied.If you want multiple accounts and want to use ICS Gmail to send emails, on Account Settings, select Outgoing Server (SMTP) at the bottom of the left pane.  Select smtp.gmail.com and click on Set Default.  Make sure that your SMTP username is listed as username@ics.uci.edu.  Click OK.  

You may copy signatures between accounts.  On Account Settings, select the account you want to copy the signature from on the left pane, go to Signature text on the right and copy whatever text/file path you have set there.  Now select the account you want to copy the signature to and paste whatever text/file path you copied.This last step is optional. If you have many email messages, you may want to disable Message Synchronizing so that your email loads more quickly. 
On Account Settings, select Synchronization & Storage for your new account.  Uncheck Keep messages for this account on this computer.

Now you may start drag and dropping messages and folders within your accounts.  Please note that if your folders contain thousands of messages, it will take a long time to complete the transfer.  Plan accordingly.  If you have any questions, email helpdesk@ics.uci.edu.







Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
September 12 2014