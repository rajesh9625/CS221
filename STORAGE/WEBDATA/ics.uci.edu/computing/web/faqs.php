web faqs @ the bren school of information and computer sciences» Account

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






  
Web FAQs




 This is a collection of common questions and answers.  Please check
this list before contacting helpdesk.
 
 Can I have a webpage on this server?
           Will you help me set up a cool webpage?
          Will you make a link to my webpage?
           How do I add a counter to my home page?
           How do I run cgi-bin programs?  What sort of webpages are allowed on this server? Is there a server where I can run PHP and cgi scripts?
		   How does this affect my quota? How do I secure my pages?
      

 Can I have a webpage on this server?
 If you have an ICS UNIX account, you can create your own web page.  See  Creating Your Own Web Space 
               for more information. 
 Will you help me set up a cool 
            webpage?
 No.  If this is for a class, contact your instructor or TA.  Otherwise, 
              there many good HTML resources online.  Use your favorite search engine to search for information on WWW programming.
            
Will you make a link to my webpage?
 
              
              If you are a graduate student or visiting researcher or faculty, 
              please send an email message to  webmaster@ics.uci.edu.  We do not link home pages to servers outside the campus.  Please 
              do not waste your time and our time by making such a request. 
 How do I add a counter to my 
            home page?
 We do not support the usage of counters.  They are very wasteful 
              of bandwidth and system resources.  We appreciate your consideration 
              on this matter. 
 How do I run cgi-bin programs? 
            
 We do not permit users to have or use cgi-bin scripts other 
              than those already on the server: calendar, date, 
              finger, fortune, imagemap 
              and uptime. 
 What sort of webpages 
            are allowed on this server?
Only static html webpages are allowed on the main webserver.  PHP webpages are 
              not allowed.
Is there a server where 
            I can run PHP and cgi scripts?
You may login to the UNIX server students.ics.uci.edu and create 
              a webspace for yourself.  Login and create a public_html folder.   If you want to run cgi scripts, create a .htaccess file inside the public_html folder with the following options:

Options -Indexes +ExecCGI
AddHandler cgi-script .cgi .pl .py
The URL would be http://students.ics.uci.edu/~loginname.  For security reasons these systems are stand-alone and do not mount 
              any NFS based directories, such as /home or /extra.  You will 
              need to SSH and download applications directly to the system or 
              use SCP software like WinSCP.  The servers are not backed up, so you 
              need to do it manually.  A great tool for doing such would be using the rsync command.  You will be responsible for maintaining the security of your website.  If you download an application, make sure you check for updates regularly or sign up for the application's 
              mailing list.
 How does this affect my quota? 
 Since your personal web space is contained in your home directory, 
              it is included in your quota.  For more information on quotas, see 
               ICS Instructional Quotas.
How do I secure my pages?There are ways to limit who can see you ICS web page.  For more information, please refer to the following Apache documents.http://httpd.apache.org/docs/2.4/howto/htaccess.htmlhttp://httpd.apache.org/docs/2.4/howto/auth.html






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 08 2013