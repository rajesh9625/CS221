Using modules at the Bren:School of Information and Computer Science» Account

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






  
Module information




In order to handle the many different software packages that are available here at ICS, we use a system called Modules. The Modules package is a system that will allow you to easily set your shell environment by selecting from different software packages.
Introduction
Modules is a system for configuring and maintaining the shell and environment variables needed to use various software packages. The Modules system is easy to use, has a built-in help facility, and runs on many platforms under many operating system versions.
Most importantly, Modules insulates you from the petty details of a package's installation. To use a software package, you usually have to add to your PATH and MANPATH variables, and you often have to set other application-specific or system variables as well. The Modules system frees you from having to know the precise pathnames to the various pieces of the package; from knowing what variables need to be set for the package to work; and from having to spend time tracking changes to all of this information.
The Basics of the Modules System
If you are using the bash shell, the following line contains the minimum code required in your shell configuration files:
source /opt/Modules/init/bash
You can see the different shell configuration files in our changing your shell page. Note that these lines should be the very first statements executed in the configuration files. This assures a well-configured environment for commands run later in your shell configuration files, as well as for later interactive sessions. Complete examples of a shell configuration files can be found on any ICS Linux or UNIX server in:
 /pkg/ics/etc/skel
 Modules commands come first, to guarantee a well-configured environment for other commands. Every time you login, these commands are automatically executed and your environment is set up.
Useful Module Commands
module avail
Lists all of the modules available at ICS (Note: Some of these may not be available on your particular system).
module display modulename
Prints out a short description of modulename, including the changes to your environment.
module showmodulename
Shows information about modulename. It is similar to the module display command.
module help modulename
Shows you where you can get help and report bugs with the software in the module.
module list
Displays the list of modules that you have currently loaded.
module load modulename
Loads the current default version for the software package modulename. If you need to use a different version, then run module load modulename/version.
module unload modulename
Removes the specified module package from your shell environment.
More Information about Modules
The ics-default module loads several commonly-used modules. You can add software packages to your environment by using the module load command, either interactively at the shell prompt or by adding the command to your shell configuration files. If you run the command interactively, it will affect your environment in that window for the current session only. If you wish the change to be permanent, you will need to add it to your shell configuration files. Following a few simple rules will let you personalize your environment safely: Modules commands should come before any direct setting of shell or environment variables. If you must assign a value to a variable that a module modifies (e.g. PATH and MANPATH), make sure you include the current value of that variable.
Using Modules Well
It is possible to make every command you will ever want to run available all the time, by loading all of the modules. This may seem desirable at first, but it has some drawbacks. Your environment will be needlessly bloated with packages you will rarely use. The negative effects of this are particularly noticeable when the man command has to search a long MANPATH. The time that it takes to login is increased since the system has to configure everything for each module you load. Some packages may be mutually incompatible or have undesireable interactions. Every shell you start (or window you open), executes your shell configuration files in order to load the PATH, MANPATH, and other variables needed. Running the module load command in a shell window only affects that shell.
Additional Information
Running the command 
module help
 lists the options of the Modules system. There are UNIX man pages for Modules (man module) and for modulerun. There is also a man page (man modulefile) with information on writing your own module file. The author of Modules is John L. Furlani of SunSoft. He presented a paper, "Modules: Providing a Flexible User Environment," at the USENIX LISA V conference held in San Diego, October 1991. The paper is available in the proceedings from that conference.






Copyright Inquiries |
   UCI Directory |
   Intranet |
   
   
 
  icswebmaster |
Updated: 
November 04 2013