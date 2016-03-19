thunderbird setup @ the bren school of information and computer sciences» Account

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






  
Thunderbird Setup




This tutorial is based on Thunderbird 24.1.0. If you're using a different version, the naming convention may differ, but the settings will remain the same.

Start up Thunderbird for the first time (or go to Tools, Account Settings, Account Actions, Add Mail Account)In the Mail Account Setup window, enter your name and email address. Enter your password here if you want to have it remembered. Click Continue.Thunderbird will now attempt to look for the IMAP information. Please make sure that you have IMAP selected.Click on Manual config in the lower left corner to make sure that the information is as follow:
Incoming
IMAPServer hostname: imap.ics.uci.eduPort: 993SSL: SSL/TLSAuthentication: Normal password
Outgoing
UCI SMTP. If you're connecting from a laptop or from off campus, please use the UCI SMTP server settings or your ISP server settings. 
For UCI SMTP, see settings from step number 7 in the link provided.
ICS SMTP. If your machine is in on the UCI-ICS domain, please use the following settings. 

Server hostname: smtp.ics.uci.eduPort: 587SSL: STARTTLSAuthentication: Normal passwordUsername: <your username>





Click Re-test and then DoneIf you did not choose to have your password saved, you will now be prompted to enter your email password.Go to Tools and select Account SettingsUnder Server Settings, click on the Advanced button
Make sure that IMAP server directory is emptyUncheck Show only subscribed foldersUncheck Allow server to override these namespaces

This last step is optional. If you have many email messages, you may want to disable Message Synchronizing so that your email loads more quickly.
While still on Account Settings window, select Synchronization & StorageUncheck Keep messages for this account on this computer







Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
October 31 2013