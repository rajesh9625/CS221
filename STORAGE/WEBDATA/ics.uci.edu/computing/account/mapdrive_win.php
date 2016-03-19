mapping home/group directory on windows @ the bren school of information and computer sciences» Account

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






  
Mapping Home/Group Directory - Windows





*** Important ***
If you are using the UCInet Mobile Access (UCI wireless) or connecting from off-campus (including on-campus housing),
 please make sure that you are connected via the UCI VPN first.

 
* The instructions below are for Windows 7 operating systems. If you are using Windows XP, the settings are the same, but the name of those settings will differ slightly (e.g. My Computer instead of Computer).
Quick instructionsInstructions with picturesCommon errors
 

Quick Instructions
If you are on the campus wireless network or at an off-campus location (which includes on-campus housing), you need to connect to the campus VPN first.  Please install the VPN client, as WebVPN will not work for the purposes of this discussion.  Once you have connected to the VPN using your UCI credentials, you may continue.Right click on Computer and select Map Network Drive...
Fill out the Drive and Folder information.
Drive: Choose any drive letter that is available (you can choose H: to match the setup on the ICS machines if preferred).Folder: Fill in the path of where your home directory or group account is located.
Home directory: \\tron.ics.uci.edu\your_username
If you are running Windows 8, please enter: \\samba.ics.uci.edu\your_username
Group directory: \\samba.ics.uci.edu\group_acct_name
Please keep in mind that the server name may be different for 
                some users. If you cannot map with the above server 
names, please 
                contact helpdesk
 to 
                find out which server you should be mapping to.If you would like to always have your network drive available, 
                check the box next to Reconnect at Logon. This 
will cause 
                the network connection to be re-established at every 
login so 
                you do not have to repeat this process every time. *** You will still need to establish a connection to the VPN each time.
If you are connecting from a machine which is not connected to the ICS domain (e.g. a laptop using wireless or your home desktop machine), please place a checkmark on Connect using a different credentials.


Username: your_usernamePassword: your_ics_password
* If Domain does not say UCI-ICS or ics.uci.edu, please enter your username in the form UCI-ICS\your_username
** For XP users: Please enter your username in the form UCI-ICS\your_username
Click OK and then Finish. You are now done.
 

Instructions with pictures
If you are on the campus wireless network or at an off-campus location (which includes on-campus housing), you need to connect to the campus VPN first.  Please install the VPN client, as WebVPN will not work for the purposes of this discussion.  Once you have connected to the VPN using your UCI credentials, you may continue.Right click on Computer and select Map Network Drive...Fill out the Drive and Folder information.

Drive: Choose any drive letter that is available (you can choose H: to match the setup on the ICS machines if preferred).Folder: Fill in the path of where your home directory or group account is located.
Home directory: \\tron.ics.uci.edu\your_usernameGroup directory: \\samba.ics.uci.edu\group_acct_name
Please keep in mind that the server name may be different for some users. If you cannot map with the above server names, please contact helpdesk to find out which server you should be mapping to.If you would like to always have your network drive available, check the box next to Reconnect at Logon. This will cause the network connection to be re-established at every login so you do not have to repeat this process everytime. *** You will still need to establish a connection to the VPN each time.




If you are connecting from a machine which is not connected to the ICS domain (e.g. a laptop using wireless or your home desktop machine), please place a checkmark on Connect using a different credentials.
Username: your_usernamePassword: your_ics_password
* If Domain does not say UCI-ICS or ics.uci.edu, please enter Username in the form UCI-ICS\your_username
** For XP users: Please enter Username in the form UCI-ICS\your_username


Click OK and then Finish. You are now done.
 

Common Errors
If you are on the UCI Mobile Access or are connecting from off-campus locations, please make sure that you are connected to the UCI VPN before trying to map the network drive.Please make sure that you are entering in your ICS password and NOT your UCInetID password.If you get an error about the path not found, please try replacing the server name with its corresponding IP address:
samba.ics.uci.edu - 128.195.1.18tron.ics.uci.edu - 128.195.1.5







UC copyright | UCI directory | Intranet | Site Map | icswebmaster@ics.uci.edu |     | Updated: November 06 2013