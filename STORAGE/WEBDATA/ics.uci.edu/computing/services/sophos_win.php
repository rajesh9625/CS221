sophos anti-virus on windows @ the bren school of information and computer sciences» Account

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






  
Sophos Anti-Virus on Windows




* Before installing Sophos, please make sure that you do not have any other anti-virus programs already installed.
** If you are connecting from off campus or if you are on the UCI wireless network, please make sure that you are connected via the UCI VPN first before proceeding.
Right-click on My Computer and select Map Network Drive.Select any drive letter for the drive and enter the following path for the Folder:
\\sophos-server.ics.uci.edu\sophos
Click on Connect using a different user name and enter your ICS username and password.
Username: <your_username>@ics.uci.eduPassword: ICS password
Double click on sav_103_sa_sfx.exe.
Note: You can also copy the entire content of the folder on to another folder on your computer and then run sav_103_sa_sfx.exe.
Continue through the setup by clicking on Install, Next, etc until you get to Update Source. For the Address, enter: \\sophos-server.ics.uci.edu\SophosUpdate\CIDs\S000\SAVSCFXP\ and enter your ICS username and password.  NOTE: Do not check "Install Sophos Client Firewall" as this might cause issues with UCI's VPN. Leave "Remove third-party security software" checked.Proceed through the remaining setup windows to begin the install.  When the process has completed, you should now see a blue shield icon in your system tray.  Right click on it and select Open Sophos Endpoint Security and Control.

Click on Configure updating and verify the information that you previously entered during setup.Go under the Schedule tab and modify the time interval between updates to your liking.  This will enable automatic updating but will only work if you are on campus or connected to the VPN when the program tries to update itself.Right click on the blue shield icon again and click on Update Now.
If you get an error "Could not contact server" and you are off campus, make sure you are connected to the VPN. If you are, then right click on the blue shield icon in the system tray and select Open Sophos Endpoint Security and Control and click on Configure updating.Click on Primary Server and change the address you entered in Step 5. by replacing the portion sophos-server.ics.uci.edu with 128.195.1.249 to get: \\128.195.1.249\SophosUpdate\CIDs\S000\SAVSCFXP\Select Update Now again.
Updates usually need to be performed manually.  It is recommended that you do this weekly to obtain the latest virus definitions.  Sophos has a new version released each month so, once a month, the update will take longer as a new version needs to be downloaded and installed. *** If you are connecting from off campus or if you are on the UCI wireless network, you will need to be connected via the VPN in order to do the update.






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
September 28 2015