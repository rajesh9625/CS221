useful linux security tools @ the bren school of information and computer sciences» Account

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






  
Useful Linux Security Tools




Many programs are available which can help prevent break-ins and minimize the
damage caused.  Since these programs are used to protect the security of your
system, make sure you get any such tools from trusted websites.  Be careful with pre-compiled binaries, especially if you run these 
programs as
root. 
          
 
 Install  ssh and  SSL FTP and use them instead of telnet,
 rlogin, rsh,
                and ftp to prevent unencrypted passwords from 
being
                sniffed from off the network.  
 Install 
 TCP
                Wrappers to prevent access from untrusted sites or 
to limit
                access only to specific sites.  
 Use  
shadow
                passwords so that the system file containing the 
actual encrypted
                passwords is not accessible to others.  Redhat's default
                configuration does not use shadow passwords, but this 
can be
                easily changed by using the pwconv tool.  
 Use Tripwire to be notified when system files have 
been modified
                or when possible trojan horses have been inserted into 
your system. 






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 05 2013