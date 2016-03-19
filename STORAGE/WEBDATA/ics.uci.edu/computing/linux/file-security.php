Understanding and Setting UNIX File Permissions» Account

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






  
File Security




Understanding and Setting UNIX File Permissions
1. Introduction
This guide gives a brief introduction to UNIX file permissions, provides
      instructions on how to perform simple configuration of UNIX file
      permissions, and shows how to find files that may have more permissive
      settings than intended.
2. Theory of Operation
UNIX assigns file permissions to three broad categories:
The user that owns the fileThe group that owns the fileEveryone else (a.k.a 'world' or 'other')
Each permission category can be assigned three permissions:
(r)ead(w)ritee(x)ecute
UNIX permissions can be represented as symbols and as octal digits. Fig.
      1 shows a table of possible values:
OctalSymbolPermission0---No Permissions1--xExecute2-w-Write3-wxWrite and Execute4r--Read5r-xRead and Execute6rw-Read and Write7rwxRead, Write, and Execute
Fig. 1: Table of Permission Combinations
The effect of these permissions varies by file type. There are numerous
      file types, but this guide will only deal with the following types:
'-' — Regular file'd' — Directory
When applied to a regular file, UNIX permissions have the following
      effect:
Read permission allows the file to be openedWrite permission allows the file to be modifiedExecute permission allows the file to be executed directly from the
        shell, if it is a script or binary file
When applied to a directory, UNIX permissions have the following effect:
Read permission allows the directory contents to be listedWrite permission allows files or directories to be created or deleted
        within the directoryExecute permission allows the directory contents to be accessed
UNIX permissions closest to the user take precedence. User permissions
      take priority over group permissions for the user who owns a file or
      directory, and both user and group permissions take priority over the
      'other' permissions for the user and group who owns the file.
3. Setting UNIX File Permissions
There are three utilities used for managing UNIX permissions:
'ls -l' — Displays a
        detailed list of directory contents'chmod' — Changes
        permissions'chgrp' — Changes group
        owners
3.1. 'ls -l'
The ls commands outputs a list of files and directories within a given
      directory, and the '-l'
      option provides a detailed list of the directory contents (including
      permissions).
      
      Fig. 2 shows the output of 'ls -l'
      on a test file, with each section labeled. The portions of the output
      related to UNIX file system permissions are colored red:

     Fig. 2: Labeled output of 'ls
        -l'
The output of Fig. 2 tells us the following:
The '-' file type
        indicates that this is a regular file'rwx' permissions for
        user indicates that the user who owns this file has read, write, and
        execute permissions for the file'r-x' permissions for
        group indicates that the group who owns this file has read and execute
        permissions for the file'---' permissions for
        'other' (i.e., everyone else) means that everyone other than the user or
        group who owns the file has no access to the file.The file is owned by user 'walbert' and group 'support'
 
3.2. 'chmod'
The chmod command changes
      the permission on a given file or directory.
      
      chmod sets permissions in two
      ways.
Using symbolsUsing octal values
This guide uses primarily octal values because they can be entered
      quickly. For more information on using symbols, refer to the chmod
      man page.
      
      When using octal values, a series of three digits defines the permissions
      for user, group, and other in that order. For example, a three-digit octal
      value of 640 would translate to read and write permissions for the user,
      read permission for the group, and no permission for others. When using
      octal values to define permissions, the new octal value entered will
      replace the existing permissions on the file or directory.
      
      (There is an optional leading digit which sets the setuid, setgid, and
      sticky bits. Usage of these permissions bits are outside the scope of this
      guide.)
      
      The following examples show common uses of chmod.
      After the chmod command, the
      output of the ls -l command
      is shown to demonstrate how the file permissions should look. Refer to the
      table in Fig. 1 for explanations of the octal values.
3.2.1. Access for Only Yourself
$ chmod 600 test_file
        $ ls -l test_file
        -rw------- 1 walbert ugrad 0 Nov  5 15:58 test_file
3.2.2. Write Access for Yourself and Read Access for Your Group
$ chmod 640 test_file
        $ ls -l test_file
        -rw-r----- 1 walbert ugrad 0 Nov  5 15:58 test_file
3.2.3. Write Access for Yourself and Read Access for Everyone Else
$ chmod 644 test_file
        $ ls -l test_file
        -rw-r--r-- 1 walbert ugrad 0 Nov  5 15:58 test_file
3.2.4. Write and Execute Access for Yourself Only
$ chmod 700 test_file
        $ ls -l test_file
        -rwx------ 1 walbert ugrad 0 Nov  5 15:58 test_file
3.2.5. Write and Execute Access for Yourself, and Execute Access for
      Everyone
$ chmod 755 test_file
        $ ls -l test_file
        -rwxr-xr-x 1 walbert ugrad 0 Nov  5 15:58 test_file
3.2.6. Write Access to a Directory for Yourself, and Read Access for
      Your Group
$ chmod 750 test_directory
        $ ls -l -d test_directory
        drwxr-x--- 2 walbert ugrad 2.0K Nov  5 15:59 test_directory/
3.2.7. Remove All Non-User Access to a Directory and its Sub-directories
$ chmod -R go-rwx test_directory
        $ ls -l -R test_directory
        test_directory/:
        total 4.0K
        drwx------ 3 walbert ugrad 2.0K Nov  5 16:53 foo/
        -rw------- 1 walbert ugrad    0 Nov  5 16:20
        test_file
        
        test_directory/foo:
        total 4.0K
        drwx------ 3 walbert ugrad 2.0K Nov  5 16:53 bar/
        -rw------- 1 walbert ugrad    0 Nov  5 16:53 test1
        
        test_directory/foo/bar:
        total 4.0K
        drwx------ 2 walbert ugrad 2.0K Nov  5 16:53 baz/
        -rw------- 1 walbert ugrad    0 Nov  5 16:53 test2
        
        test_directory/foo/bar/baz:
        total 0
        -rw------- 1 walbert ugrad 0 Nov  5 16:53 test3
      
      In this case, symbolic permission assignment was used, as octal permission
      assignments usually do not produce the intended result when applied
      recursively. The symbolic permissions used in this example, 'go-rwx', can
      be translated as “for group and other—remove read, write, and execute
      permissions.”
3.3. 'chgrp'
The chgrp command changes
      the group ownership on a given file or directory.
      
      Changing group ownership may be necessary when sharing files and
      directories with other members of your research group.
3.3.1. Changing the Group Ownership of a File
$ chgrp support test_file
        $ ls -l test_file
        -rw-rw---- 1 walbert support 0 Nov  5 15:58 test_file
3.3.2. Changing the Group Ownership of a Directory and its Contents
$ chgrp -R support test_directory
        $ ls -l -R test_directory
        test_directory:
        total 4.0K
        drwx------ 3 walbert support 2.0K Nov  5 16:53 foo/
        -rw------- 1 walbert support    0 Nov  5 16:20
        test_file
        
        test_directory/foo:
        total 4.0K
        drwx------ 3 walbert support 2.0K Nov  5 16:53 bar/
        -rw------- 1 walbert support    0 Nov  5 16:53 test1
        
        test_directory/foo/bar:
        total 4.0K
        drwx------ 2 walbert support 2.0K Nov  5 16:53 baz/
        -rw------- 1 walbert support    0 Nov  5 16:53 test2
        
        test_directory/foo/bar/baz:
        total 0
        -rw------- 1 walbert support 0 Nov  5 16:53 test3
4. Finding Files with Unwanted Permissions
This section provides information on the use of the find command to find
      and display files and directories with permissions that may be
      undesirable. All examples in this section will output results in the
      format typically provided by ls -l.
      
      All examples will use the following format:
      
      find /dir/name -perm /005 -type f
        -print0 | xargs -0 ls -l
      
      Explanation of these options:
      /dir/name — Directory being
      searched
      -perm — Instructs find
      to match files based on given permissions
      -type f — Instructs find
      to match only regular files
      -print0 — Sends output to
      stdout using the null character
      xargs — Command that builds
      another command to execute based on the content of stdin
      -0 — Use the null character
      as the item delimiter
4.1. Find All Files Accessible by 'Other' in Any Way
$ find ~ -perm /007 -type f -print0
        | xargs -0 ls -l
      
      This will display all files within your home directory that have read,
      write, or execute permissions for 'other.' This is useful for getting a
      general idea of what others can access in your home directory.
4.2. Find All Files Readable by 'Other'
$ find . -perm /004 -type f -print0
        | xargs -0 ls -l
      
      This will display all files within the current working directory that are
      world-readable. Many of these files will be 'common' files (such as shared
      libraries, icons, etc.) located in hidden directories, which are generally
      harmless. Any private files that appear on this list (e.g., private SSH
      keys or files on non-hidden directories) should be investigated.
4.3. Find All Files Writable by 'Other'
$ find /extra/research0 -perm /002
        -type f -print0 | xargs -0 ls -l
      
      This will display all files in the /extra/research0 directory that are
      writable by 'other.' Any files that appear in this list should be
      investigated, and in most cases, permissions should be changed to
      something more restrictive.
4.4. Find All Files Executable by User or Group, and Writable by 'Other'
$ find ~ -perm -102 -type f -print0
        | xargs -0 ls -l  # User
        $ find ~ -perm -012 -type f -print0 | xargs -0 ls -l  # Group
      
      This will display all files in your home directory that are both
      world-writable and executable by either the user or the group that owns
      the file. Files that are user-executable and world-writable are a major
      security vulnerability and should be fixed immediately unless you know
      exactly what you are doing.
4.5. Find All Files Owned by a Specific Group
$ find ~ -group NameOfGroup -type f
        -print0 | xargs -0 ls -l
      
      This will display all files in your home directory that are owned by the
      specified group.
4.6. Find All Files Not Owned by a Specific Group
$ find . -not -group NameOfGroup
        -type f -print0 | xargs -0 ls -l
      
      This will display all files in the current working directory that are not
      owned by the specified group.
5. Further Resources
For detailed documentation on the commands used in this guide, see the
      man pages for the following commands
lschmodchgrpfindxargs
For other resources on the commands used in this guide (and UNIX file
      system permissions in general):
Wikipedia
          — File system permissionsWikipedia — chmodWikipedia — chgrpIBM
          — Learn Linux, 101: Manage file permissions and ownershipTLDP —
          3.4.1. Access rights: Linux's first line of defense






UC copyright | UCI directory | Intranet | Site Map | icswebmaster@ics.uci.edu |     | Updated: November 19 2013