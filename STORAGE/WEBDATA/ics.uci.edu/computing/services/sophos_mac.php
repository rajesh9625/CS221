sophos anti-virus on mac @ the bren school of information and computer sciences» Account

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






  
Sophos Anti-Virus on Mac




* Before installing Sophos, please make sure that you do not have any other anti-virus programs already installed.
** If you already have Sophos installed and has problem updating, please uninstall it following the instructions here. Then do a re-install using the instructions below.
*** If you are connecting from off campus or if you are on the UCI wireless network, please make sure that you are connected via the UCI VPN first before proceeding.
From the Finder menu, click on Go and select Connect to Server.For the server address, enter:
smb://sophos-server.ics.uci.edu/sophos_mac
Enter your ICS username and password.Navigate to the folder that matches your OS X install, and double click on the .dmg file to mount the drive.Once the drive is mounted, double click on the Sophos Anti-Virus.pkg file to start the install.  NOTE: Do not check "Install Sophos Client Firewall" as this might cause issues with UCI's VPN. Leave "Remove third-party security software" checked.Once the installation completes, click on the Sophos shield on the top right corner and select Open Sophos Anti-Virus Preferences.Click on Auto Update, then click on the lock in the lower left corner to allow the following changes to be made.
Update from Primary Location: Network VolumeAddress: smb://sophos-server.ics.uci.edu/SophosUpdate/CIDs/S000/ESCOSX      NOTE: The address is case-sensitive; S000 is capital S followd by 3 zeroes.Username: your ICS usernamePassword: your ICS password
Click on the lock to prevent further changes and close the window.Click on the Sophos shield up at the top again and select Update Now.Updates need to be performed manually.  It is recommended that you do this weekly to obtain the latest virus definitions.  Sophos has a new version released each month so, once a month, the update will take longer as a new version needs to be downloaded and installed. *** If you are connecting from off campus or if you are on the UCI wireless network, you will need to be connected via the VPN in order to do the update.






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
September 28 2015