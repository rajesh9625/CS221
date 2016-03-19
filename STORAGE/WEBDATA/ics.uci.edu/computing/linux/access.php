linux configurations @ the bren school of information and computer sciences» Account

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






  
Inappropriate Linux Configurations




In many cases, vendor-supplied files have inappropriate configurations
              which
should be changed to prevent others from obtaining unwanted access.
          
 /etc/hosts.equiv and $HOME/.rhosts
 
 Decide if the file /etc/hosts.equiv is 
really
                required on your system.  If you are running commands 
such
                as rsh, rlogin, etc., this 
file allows
                other hosts to be trusted by your system.  Rlogin will 
then
                allow someone with the same account name to login to 
your machine
                from a listed host without supplying a password. This is
 a way
                that hackers can easily leap-frog from machine to 
machine.  Verify that the permissions on these files are set to 600. Verify that the owner of $HOME/.rhosts  
is
                the same as the account's owner and that the owner of /etc/hosts.equiv
 is root. Make sure that the file does NOT contain the symbol "+"
 on
                any line as this allows anyone access to this account or
 system. Verify that the usage of netgroups within .rhosts
 does
                not allow unintended access to this account. Make sure 
that only
                the accounts and hosts you want to provide access to 
have access. Do not use '!' or '#' in these files.  
There
                are no comment characters for these files.  Only trust hosts which are within your domain or under your direct managment.  Only use fully qualified hostnames (i.e., hostname.ics.uci.edu).
 
 /usr/lib/X11/xdm/Xsession  Check this file for an xhost command with a
 '+'.  Remove
              that line, since it allows anyone on the network (or 
possibly on
              the Internet) to talk to your X server, insert commands 
into windows, and read your console keystrokes.            
 
 /etc/ttys and /etc/ttytab The only terminal that should be set to secure 
should
              be the console.            
 
 /etc/aliases (or /usr/lib/aliases) Check this mail alias file for inappropriate entries. When shipped, some alias
              files include an alias named uudecode or
 just decode.  This
              can almost always be commented out.            
 
 System files
 Check the permissions and ownership of system files  and directories,
                especially the / (root) and /etc 
directories,
                and all system and network configuration files.  Examine file and directory protections before and 
after installing
                software. These procedures can cause file and directory 
protections
                to change without you being aware of it. 
 
 Setuid shell scripts are always potential security 
problems and can not be made secure. Do not create or allow setuid 
shell
              scripts, especially the setuid root ones. 






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 04 2013