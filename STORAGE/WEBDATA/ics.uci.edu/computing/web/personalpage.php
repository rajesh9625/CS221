creating personal webpage @ the bren school of information and computer sciences» Account

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






  
Creating Personal Webpage




This document is a modified version of  the
                one written for UIUC by Ed Kubaitis.
            Send comments or questions to  webmaster@ics.uci.edu.  
What is a Personal Web?
A personal webpage is a section of webspace in which you (as opposed to
          the webmaster) have control over the contents.  Our server allows a special subdirectory of your UNIX home directory
          to act as an attachment to the server's document namespace (the part
          of the URL which
follows http://www.ics.uci.edu/).  Since this area is in your
home directory, it get counted as part of your quota.  This is where your
homepage resides.
Learn about HTML and URLs
HTML is the HyperText Markup Language used for documents on the World
Wide Web.  A URL is a Uniform Resource Locator, the WWW address of a document
or other network resources.  Although other document types (e.g. PostScript) can
be accessed through the Web, HTML is by far the best format for documents which
are intended to be read online.  There are many good tutorials available online if you would like to find out more information about this topic.
  
Setting Up Your ~/public_html Directory
There are two ways to setup your publich_html directory.
Create the directory manually, then set the proper permissions.
Using your ICS account, login to one of the ICS servers via PuTTY or your preferred SSH client. Once you sre logged in, make your home directory world searchable (711) or world 
readable 
            (755).  Use the chmod command to change file 
permissions. 
          

chmod 711 /home/you_username
run the command ls -la to check that you have set it up correctly.  The first line of the output should disply something like:

drwx--x--x   62 your_username ugrad 18K Oct 16 10:00 ./


 Create a subdirectory public_html in your home 
directory.  This directory must also be at least world readable (755).
mkdir public_htmlchmod 755 public_html
Place the documents you want to serve in this directory or in further subdirectories.  You can simply go to your home directory (H-drive on lab machines) to copy/paste files/folders into the public_html folder.  For more instructions on how to map to your home directory, please see instructions for Windows or Mac.All documents under ~/public_html should be world readable (644) and
all subdirectories should be world readable (755).  Do not leave any auxiliary,
temp, scratch, backup, or
otherwise undesirable files under ~/public_html.

Run a script and answer the prompted questions.
Using your ICS account, log in to one of the ICS servers.Run the command /pkg/ics/bin/make_my_web

 All filenames must end with an appropriate extension (the part after the
  last dot).  For example, all HTML documents should have filenames ending in .html,
  all text documents should have filenames ending in .txt, and all
  PostScript documents should have filenames ending in .ps.  Compressed documents
  should have filenames ending in .extension.Z or .extension.gz (for compress or gzip
  -9, respectively).
 Also, please avoid using file/pathnames which are excessively long.  Long
  filenames make for long URLs which are difficult for users to type and problematic
  for many WWW clients.
 The URL for files in this directory is http://www.ics.uci.edu/~username/filename
For example, for login name peteranteater, the URL is http://www.ics.uci.edu/~peteranteater/myfile.html and will access ~peteranteater/public_html/myfile.html
 The URL http://www.ics.uci.edu/~peteranteater/  (i.e. no filename)
  is the same as http://www.ics.uci.edu/~peteranteater/index.html
So if you save your personal home page as the file ~/public_html/index.html,
people can access it with the short URL.  You should always include the trailing
slash in URLs when referring to a directory --some servers can get confused
otherwise.  If there is no file called index.html, the short URL
will generate a menu of all files if the directory is world readable (755) or
an error message if it is only world searchable (711).
 For security reasons, never put symbolic links under ~/public_html which
  point to directories outside of ~/public_html.  Symbolic links
  to other files are okay provided that both the link and its destination are
  owned by the same user.  Symbolic links from outside directories pointing to
  destinations under ~/public_html are always okay.
Other Tips and Notes
You can test if things are working the way you want by checking them with your
favorite browser.  For example, using Firefox, you can use the File, Open file  menu item or by copy pasting your website's URL into your browser's address bar. 
 You can also inspect the HTML used for any document you find on the Web using
  your favorite browser.  With Firefox, use the View, Page source menu item to look at a page's source code. 
 Always remember that the whole world is watching what you do.  Do not put anything in your personal webspace which is not intended to be public 
          information.  Furthermore, you must always obey the Ethical 
          Use of Computing Resources guidelines to which you agreed before 
          receiving an ICS account.  Please review those guidelines before making 
          any questionable material available to the World Wide Web.  If you have any questions, feel free to email helpdesk.






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 08 2013