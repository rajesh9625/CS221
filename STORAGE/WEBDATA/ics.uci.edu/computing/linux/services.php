unneeded linux services @ the bren school of information and computer sciences» Account

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






  
Unneeded Linux Services




The more services running on your machine, the greater the chance
that one or more will have a known security hole.  Therefore, you should
turn off any unneeded services and ensure any services you run are the 
latest
version and are properly configured.
          
 Services in /etc/inetd.conf
 Inetd is the daemon that manages many 
system
                services.  These are listed in its configuration file, /etc/inetd.conf,
                which can easily be modified to prevent inetd
 from
                starting unwanted services.  If you are the only user of
                your workstation, you can have almost everything 
commented out and will most likely not notice their absence. Services which are often unneeded include: echo,
 daytime, chargen, time, login,
 shell,
                and exec.  To turn these off, follow the 
instructions
                at 
 Turning
                off an inetd-launched service. Services you probably want to keep include: telnet,
 ftp, identd.
 Services started from system start-up scripts Many other services are started in system start-up 
scripts. You
              should review your start-up scripts and comment out ones 
which
              are not appropriate for your workstation's purpose. For 
example, rpc.mountd and rpc.nfsd are
              probably unneeded on a single user workstation. kill -9
 any
              unwanted services and then comment them out in the 
appropriate
              system start-up file.            
 Other services
 To determine what other services you are running, use
 the
                command:
          netstat -a | more
 Use your package manager to list the packages 
installed (dpkg for
                Debian and rpm for RedHat). Unless your machine is acting as a mail server, you 
should 
 turn
                  off sendmail  since it is very large and is one of
 the
                  most common targets for attacks because of its 
numerous security
                  holes. Note: sendmail is not necessary if
 you
                  are using pop to read your mail.  If you are not actively sharing files or printers from
 your
                machine with machines running a Microsoft operating 
system, you
                should 
 turn
                off samba.
 Do not run NIS or NIS+ if you do not need them. A 
standalone machine
              will never need these.
 Define each netgroup to contain only usernames or 
only hostnames.  All
                utilities parse /etc/netgroup for either 
hosts or
                usernames, but never both.  Using separate netgroups 
makes
                it easier to remember the function of each netgroup. The
 added
                time required to administer these extra netgroups is a 
small
                cost in ensuring that strange permission combinations 
will not leave your machine in an insecure state.
 Web servers: If you are running a web server, make sure
 you
              have the latest available release.  The latest version of
              Apache can be obtained from the official Apache
              Distribution site. Anonymous FTP
 Make sure that you are running the most recent 
version of ftpd.
                There are several well-known security problems with the 
ones
                that ship on distribution media. Check your anonymous FTP configuration. It is 
important to
                follow the instructions provided with the operating 
system to
                properly configure the files and directories available 
through
                anonymous FTP (for example, file and directory 
permissions, ownership
                and group). You should not use your system's standard password 
file or
                group file as the password file or group file for FTP. The anonymous FTP root directory and its two 
subdirectories, etc and bin,
                should not be owned by the FTP user.







Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 05 2013