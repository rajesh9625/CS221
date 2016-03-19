ics grid computing @ the bren school of information and computer sciences» Account

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






  
ICS Grid Computing




What is the ICS grid?
The ICS grid contains groups of both public and research distributed computing clusters. These clusters are unified by the Sun Grid Engine (SGE) where jobs are submitted, scheduled, and dispatched according to available resources. Jobs may embed requests for certain types of resources or these can be requested at time of submission. Your job will be queued and dispatched when the appropriate resources are available.
Research clusters are owned by various faculty members and have dedicated nodes to run their computing jobs. Trying to submit jobs directly to these clusters will result in jobs being rejected or access being denied unless appropriate permissions are previously granted. The ICS grid also has public clusters for general use. These have wall clock limits so that the general public may have a turn on the grid. Below is a listing of the public queues.

Public QueueOSRuntime LimitSlots12hour.qCentOS 6 (RHEL 6) x86_6412 hours4815day.qCentOS 6 (RHEL 6) x86_6415 days48

For a list of all queues you can query SGE:
$ qconf -sql
To get details on a particular queue, such as time, nodes, access, etc.:
$ qconf -sq 12hour.q
 
How do I request an account?
All ICS accounts can access the public queues. Contact helpdesk in order to get access to research queues.
 
How do I access my account?
Linux/Solaris/MacOS:
To access the grid simply login via ssh since these systems have ssh installed by default.
$ ssh -Y icsusername@openlab.ics.uci.edu
Windows:
On Windows, use the free PuTTY application or one of these alternatives. Telnet access is NOT available. If you use ssh without the -Y or -X option, you will not be able to view X11 graphics.
 
I am logged in, now what?
Once you are logged in, you have access to a shell for which you can access ICS computing resources such as our software stack along with the grid. In order to access these, you must know a few commands before you begin. 
$ module load sge
Let's go over the command above. The module command allows you to load specific software applications out of the software stack. In this case, the application is SGE. This will setup essential environment variables in order to run the commands provided by sge. You may edit your shell rc files to automatically load sge if that is your primary use or even if you find it convenient so you do not have to run it at every login. There are no additional resources taken up if you decide not to use it even with the module loaded as the command will only modify your environment variables.
For more on modules and our software stack, please visit our module page.
 
I loaded SGE, what commands can I run?
For starters, the first command to get accustomed to is qstat. If you run qstat alone, you will see nothing for the first time because by default it displays the status for submitted jobs. To get a full listing run:
$ qstat -f
Once you submit a job, you will be given a job id to track the detail of job completion.
$ qstat -j «job_id»
This command will give you better detail as to why your job is sitting in the queue waiting to be dispatched. Resources may be busy, so you will have to wait and sit tight. If your job sits in the queue for too long, especially in our 12-hour or 15-day-long public queues, please email helpdesk to assist you in looking at the queues more thoroughly.
You can also delete a job using its id number.
$ qdel «job_id»
Now, let's submit your first job! The simple method is to not request any particular resource constraints, such as memory, platform, or SGE queues.
$ qsub /auto/sge-6.2u5/examples/jobs/sleeper.sh
This simple script, once dispatched, will run on an SGE selected host and sleep for a given number of seconds. This exciting script is used to test that the basic SGE scheduling is working. It is a good idea to test and run it at times when your custom scripts and/or applications refuse to run. You can test particular SGE queues by specifying a queue request during submission, as follows:
$ qsub -q 12hour.q /auto/sge-6.2u5/examples/jobs/sleeper.sh
There are various requests that can be made. You can read about them in the man pages. The usage page is a valuable resource for your routine tasks of using the grid more effectively. For example, you may use job arrays for scenarios that require running several identical jobs which will work on different datasets. You would submit a job array of an appropriate size to do that. Otherwise, we would bombard the scheduler with hundreds of thousands of jobs.  This could result in bringing down the scheduler and you explaining to your colleagues that you single-handedly brought SGE down as they are on a deadline.
 
How do I get files/scripts to and from my account?
For systems managed by Computing Support, you will find that your UNIX home directory has already been mounted via NFS. All of our nodes on the grid automount your home directories as well as our software stack mentioned above via the use of modules. If this is your case, then you are already off on the right foot and have it easy when it comes to transporting files to and from your ICS account for use on the grid.
For systems not managed by ICS, the easiest way of transporting files is using secure copy, i.e. scp. Besides the command line scp utility bundled with all Linux, Solaris, and Mac hosts, there are GUI clients for MacOS and Windows, and of course, Linux. If you have large collections of files or large individual files that change only partially, you might be interested in using rsync as well.
For Windows users, we recommend the free WinSCP application, which gives you a graphical interface for SCP, SFTP, and FTP. Machines within the Windows UCI-ICS domain will already have their H: drive mounted, so you can just drag and drop directly to your home directory.
For Mac OS X users, we recommend the free, though oddly named, Cyberduck application, which provides graphical file browsing via FTP, SCP, SFTP, WebDAV, and even Amazon S3(!). Macs also have access to your UNIX home directory, so you can easily drag and drop files.
For Linux and Solaris users, we recommend utilizing the built-in capabilities of KDE's Swiss-army-knife browser Konqueror or twin-panel file manager Krusader. Both support the secure file browser kio-plugin called fish. Advanced users should read the document How to Move Data, which discusses in detail how to transfer large amounts of data over the network. Again if you have a Linux or Solaris install from ICS, you will have your home directory mounted and accessible from your desktop.
 
How do I use the grid?
There are basically two good uses for SGE. The Sun Grid Engine scheduler controls all the access to the grid's computing nodes. All jobs must use the qsub or qrsh commands, which submit jobs to the grid in an orderly fashion. There are policies in place to prevent a single user from dominating the machine by flooding the queue with jobs, particularly a 12-hour and 14-day wallclock limit for longer jobs on our public queues. THIS SYSTEM IS NOT FOOLPROOF. Please be courteous and run as few simultaneous jobs as possible, particularly if you notice that there is a lot of usage (with the qstat command).
You can check the status of the batch queue backlog using the qstat and qhost commands. For more information see the section on Monitoring and Controlling Jobs from the wiki.
Send email to helpdesk@ics.uci.edu if you have complaints about your job turnaround or if you need special scheduling considerations to meet a project deadline.
Batch submission
Use the qsub command to submit a job script to the grid. A job script consists of UNIX directives, comments, and executable statements. It is important to remember that all the commands in the job script execute serially on the node that runs your script.
TIP: When your script begins execution the working directory is your home directory. Use the -cwd option with qsub to use the current working directory (wherever you currently are). Output and error will be directed wherever you happen to be, allowing for a cleaner environment. Otherwise stdout and stderr go to your home directory.
SGE provides an abundant number of examples for you to start out with. You can find them located at $SGE_ROOT/examples, or just Google "SGE examples" and you will have plenty of references.
There are several things to look out for when using batch submissions.
Submitting a large set of jobs. This has the affect of saturating the scheduler to a crawl and at times making it inaccessible to you and everyone else on the grid. The best solution is to use job arrays.If you chain jobs, remember to check the status of the previous job before spawning another qsub. This will prevent the system from flooding the scheduler with failed jobs.Remember that for your convenience we automounted your home directory along with our software stack. Please be aware that if you flood the scheduler with jobs that mount a software stack or access data from your home directory, your scripts will fail trying to look up a file or directory. If you encounter this, please make sure to make create more robust scripts by adding random timers or give the lookup some time to return your mounts.
Interactive
The submission of interactive jobs instead of batch jobs is useful in situations where a job requires your direct input to influence the job results. Such situations are typical for X Windows applications or for tasks in which your interpretation of immediate results is required to steer further processing.
You can create interactive jobs in three ways:
qlogin – An rlogin-like session that is started on a host selected by the Grid Engine software.qrsh – The equivalent of the standard UNIX rsh facility. A command is executed remotely on a host selected by the Grid Engine system. If no command is specified, a remote rlogin session is started on a remote host.qsh – An xterm that is displayed from the machine that is running the job. The display is set corresponding to your specification or to the setting of the DISPLAY environment variable. If the DISPLAY variable is not set, and if no display destination is defined, the Grid Engine system directs the xterm to the 0.0 screen of the X server on the host from which the job was submitted.
The default handling of interactive jobs differs from the handling of batch jobs. Interactive jobs are not queued if the jobs cannot be executed when they are submitted. When a job is not queued immediately, the user is notified that the cluster is currently too busy.
You can change this default behavior with the -now no option to qsh, qlogin, and qrsh. If you use this option, interactive jobs are queued like batch jobs. When you use the -now yes option, batch jobs that are submitted with qsub can also be handled like interactive jobs. Such batch jobs are either dispatched for running immediately, or they are rejected.
 
Where can I get more information on grid computing?
The best resource is always the user documentation. Your peers are the next best source since they may already have experience using the grid for what may be the very purpose you might need.
 
Where do I report problems?
Please contact helpdesk if you have problems accessing the grid or if there is a failure beyond normal script logic failures. We are here to make sure that the grid is operational and that you have access so that you can make full use of the grid. When emailing please articulate what problem(s) you are experiencing, what scripts you are trying to run, and how you are submitting them to the grid. Please copy/paste any relevant error messages. This will help us troubleshoot the problem in a timely fashion.






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
April 14 2014