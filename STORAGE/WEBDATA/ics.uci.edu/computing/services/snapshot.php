snapshot @ the bren school of information and computer sciences» Account

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






  
Snapshot




Snapshot is only available for accounts on the TRON server.  If you cannot find a .snapshot folder in your home directory (see below for steps), please contact helpdesk to do a file restore.
** Snapshots are taken daily for only up to 30 days **
Windows
Your home directory (generally H:) drive is automatically mapped if you are logged into a machine on the UCI-ICS domain.  If you need to map your home directory, please refer to Mapping Home/Group Directory.
Navigate to where your deleted/corrupted file is on the H: drive (or whichever letter you assigned to your ICS mapped drive).
If your file is corrupted, you will need to rename it with a .old extension (e.g. filename.old).
Open another window and navigate to the .snapshot directory.
From the Start menu, go to Run and type in H:\~snapshot and hit OK.You should now see folders named in yyyy-mm-dd_time.daily format.  Find the most recent nightly folder where you file is intact.Continue until you find the file that you want to restore.
Copy and paste the file from Step 2 into the window from Step 1.Unix/LinuxLogin to one of the ICS hosts.From the root of your home directory, cd .snapshot (you will not see the folder listed, but you will be able to cd into it).
If you have a corrupted file, rename it first (e.g. filename.old).
You should now see folders named in yyyy-mm-dd_time.daily format.  Find the most recent daily folder where you 
file is intact.Continue until you find the file that you want to restore.Copy the file over to the original location by using:
user@ics ~/.snapshot/2010-12-01_0600-0700.daily $ cp backupfile ~/original/folder/backupfile







Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
September 28 2015