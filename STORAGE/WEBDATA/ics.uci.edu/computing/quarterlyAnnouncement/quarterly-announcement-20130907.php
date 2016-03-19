quarterly-announcements-20130907» Account

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






  
Fall 2013 Quarterly Announcements




Table
of Contents
Contacting ICS Computing Support
HelpdeskChanges
to your ICS Email AccountICS.System
AnnouncementsStorage
and BackupsService
MonitoringPublic
Grid ComputingDokuwiki
and WordPress FarmsData
Center and Centralized
ServicesGitLab
and Subversion
For
future reference, this document
will also be available at the
following URL:
http://www.ics.uci.edu/computing/quarterlyAnnouncement/


Contacting ICS
Computing
Support Helpdesk
The ICS
Computing Support Group should be contacted by email at helpdesk@ics.uci.edu and by phone at
(949) 824-4222.
 Normal business hours for the group are from 8am-noon and
1pm-5pm.  Both Helpdesk email and phone are monitored around
the
clock and using
them will help us provide quicker response to help requests.   

More information about
Bren:ICS Computing Support is available
at the
following URL:


http://www.ics.uci.edu/computing/contact/helpdesk.php


Please
Note:  If
you believe that there is a problem with
email or
that an email message to Helpdesk may not be processed by
the ICS
email servers, please call the helpdesk at
(949) 824-4222.  


Changes
to your ICS Email
Account 
There are two significant changes coming to
the ICS email services.
 First
and
foremost, ICS Google Apps for Education and Gmail accounts are
available for all ICS faculty, staff, and grads.
 Computing
Support will be emphasizing ICS Gmail service in favor of the internal
ICS IMAP email system.

ICS email users will also be able to opt
out of virus and spam email scanning.  If you setup an ICS
Google
Apps account or otherwise forward email to an address outside of ICS, then your email should be scanned by your mail provider
instead of ICS mail scanners.  (Note:  Users
forwarding via procmail will still be subject to
ICS email virus and spam scanning).

How
to Setup Your ICS Google Apps and
Gmail Account

There are two steps to
activating your ICS Google Apps account.

Navigate to the
https://elnino.ics.uci.edu page.
 When prompted, login with
your ICS account and password (the same one
you use to login when you read your ICS email).  This website
is
available on campus or through the VPN.

1.  Change your ICS password.  Click on the "Change Password" button at the above link. 

2.  Under forwarding address, select "ICS Gmail."  Leave the
textbox empty as demonstrated below.



How
to change your ICS email delivery
point to a Third Party Email Provider
These directions are for
users that would like their mail
forwarded to non-ICS or non-UCI addresses.

Before you begin, it is
important to note that email
delivery to third party email accounts is not protected by UC contracts.

Navigate to https://elnino.ics.uci.edu
with your web browser.  

When prompted, login with your ICS account and
password (the same one you use to login when you read your ICS email).
 

Click on the "other" radio button and fill in the "Forwarding Address:" textbox with your third-party email address.

Additional
Email Resources 

ICS Email Resources

ICS Google Apps
Login 
http://mail.google.com/a/ics.uci.eduICS Google Apps Accounts
Setup, Information and FAQ
http://www.ics.uci.edu/computing/email/google_apps.htmlICS Email Overview
http://www.ics.uci.edu/computing/email
      Google Support 
http://support.google.com/?hl=enUsing Thunderbird to
read Gmail 
 https://support.google.com/mail/troubleshooter/1668960?hl=en

Other Campus Email
Services
On campus OIT email
account
http://oit.uci.edu/email/UCI Google Apps Account
http://www.google.uci.edu/UCI Email Delivery and
Forwarding  
http://oit.uci.edu/email/deliverypoint.html




ICS.SYSTEM
Announcements (RSS feed
available)
Please
remember to check the ics.system website frequently for postings
regarding machine down times, software availability, and general
computing announcements.  The
site is available as both a URL and RSS feed.  The URL for the
site is:

https://support.ics.uci.edu/ics.system/

The
RSS feed is available at:

https://support.ics.uci.edu/ics.system/feed.xml


Storage
and Backups
Researchers
and Computing Support added over 100TB of spinning disk this summer.
 Like most storage, this space is network-accessible
from any ICS-supported host,
comes
with user-accessible snapshots, and is backed up to tape.

If you
are a researcher
interested in purchasing a portion of this space, in terabyte
increments, or storage hardware, please contact helpdesk@ics.uci.edu for more information on this and
Dell discounts.

Computing Support has also expanded backup capacity to keep up with
growing
storage demand.  We now run two tape libraries and multiple disk-to-disk
backup pools.  Quarterly backups will be
performed at the end of each quarter and stored for two years.

Additional
notes
about ICS Backups
Snapshot
Backups

File
system snapshots
are provided on most NFS-mounted directories (i.e. /home and /extra) as a user-accessible backup.  
Snapshotted
directories offer two to four weeks of snapshot backups. Contact
helpdesk to find out the specifics on your file system.

File
system snapshots
are a copy of a file system at a specific point in
time, even while the original file system continues to be updated and
used normally.  File system snapshots are typically available
to
the directory owner.

Information
on
accessing home directory snapshots is available at http://www.ics.uci.edu/computing/services/snapshot.php

Tape
Backups

Tape
backups of /home
and /extra directories are made regularly.  Tape backups are
intended for disaster recovery after critical hardware failure.
 Please
keep in mind that directories named "scratch" are not backed up (case
insensitive).

Local
File Systems

The
local file system
is NOT part of regular backups.  This space is
volatile, impermanent,
and users should perform
their own backups of any information saved on a local file system.

Data
may be stored on
the local file system in the /scratch and /tmp directories.  Files are
deleted from the /tmp directory at boot, after they have not been
accessed for 10 days, or during routine system administration.

Files
from /scratch
will be left intact except when the file systems are reformatted during
installation, hardware failure, or emergency system administration.




Service
Monitoring
Computing
Support runs Nagios and Ganglia to monitor hosted ICS servers
and
services.   

The Nagios and Ganglia portals are available at the following URLs.
 Use an ICS login if prompted.

https://nagios.ics.uci.edu
http://ganglia.ics.uci.edu


Nagios monitors
the availability
of servers and services.  Notifications are sent to system
administrators when unscheduled outages occur.  Use
your ICS login and password when prompted.

Ganglia reports
provides a history
of resource utilization over time.

Please send an email message to
helpdesk if you need help with these systems.



Public
Grid
Computing

ICS Computing Support
manages several community and research
grid
compute clusters.

Grid computing is managed using Sun Grid Engine (SGE) 6.2u5.  Information
about using SGE tools is
available
here:

https://www.ics.uci.edu/computing/linux/sge.php

Please
use check pointing for better fault tolerance in general, but more so
on these public clusters.

The ICS public clusters are available to any member of the ICS
community.   


Public Queue NameOperating SystemSlotsRuntime Limits12hour.qCentOS6 x86
64-bit24hard
limit 12 hours, soft limit 10 hours15day.qCentOS6
x86
64-bit36hard
limit 15 days, soft
limit 14 days



Dokuwiki
and WordPress Farms
For
any research group that wishes to have a wiki for their website,
Computing Support offers Dokuwiki as an option.  Dokuwiki
stores
all the data in plain text files and no database is required.
 Custom themes and plug-ins are available upon request.  Currently, five research groups are using Dokuwiki to get their message out on the
web.  The Computing Support group is also using it internally
to
document their procedures and work.  

Computing
Support has created a Wordpress Farm which is available to
any faculty or research group.
 Currently,
two professors and four research groups are making use of Computer
Support's managed WordPress farm to
create a website or
blog.  Each faculty and research group can download and
install
the theme and plug-ins of their choice to customize the website.
 Security updates are installed by Computing Support as
necessary
to keep the WordPress installation secure.  

Any
faculty or research groups interested in creating a Dokuwiki or
Wordpress site, just needs to send a message to helpdesk@ics.uci.edu.



Data
Center and Centralized Services
Computing
Support offers the
following data center and centralized
services.
 In many cases, these services are available to both
managed
and unmanaged hosts.  Please send any inquiries about
availability
of these services (or anything else you can think of) to helpdesk.
Public
Access Cycle serversRack
Hosting:  Self Managed and ICS ManagedData
Storage and ManagementServer
and Service MonitoringLoad
Balancing/High AvailabilitySubversion
Repository HostingGit
Repository Hosting (coming soon)Wiki
farmRequest
Tracker
Ticketing SystemConference
Registration ServicesWeb Application Hosting


GitLab
and Subversion
ICS
Computing Support
currently runs a research and instructional Subversion server that uses the if.SVNAdmin
package to provide self
service
through a convenient GUI.  Computing Support also intends to
provide GitLab
service beginning Winter
quarter.

Both
the GitLab and if.SVNAdmin allow repository owners to modify their
own
subversion authorization file, create logins, and assign permissions
and roles through a web interface.

ICS
community members who are running Git or Subversion repositories or are interested in using a
revision control system are encouraged to contact helpdesk.








Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
January 06 2016