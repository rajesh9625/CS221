changing your shell @ the bren school of information and computer sciences» Account

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






  
Changing your shell




ICS accounts are given bash shell by default, but there are other shells 
          available that users may change to. These other shells offer 
improvements 
          such as tab completion. To change your shell, please go to the
 below 
          website (if connecting from off-campus, please start up VPN 
          first).
Go to Password page and scroll down to the bottom of the page to the Change Unix (Solaris and Linux) Shell section.Enter in your ICS username/password and select the shell that you want.Using PuTTY or other SSH client, login to openlab.ics.uci.edu using your ICS credentials.Rename your old shell login file for backup. For example, if you already have .cshrc then do
cp ~/.cshrc ~/.cshrc.old
Copy over a new copy of the login file for the shell that you have chosen:
csh
cp /opt/local/etc/skel/example.cshrc ~/.cshrc
tcsh
cp /opt/local/etc/skel/example.tcshrc ~/.tcshrc
bash
cp /opt/local/etc/skel/example.bashrc ~/.bashrc
        cp /opt/local/etc/skel/example.profile ~/.bash_profile








Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 20 2013