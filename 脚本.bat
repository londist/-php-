@ECHO OFF
powershell.exe -command "ls 'C:\Users\Londist\Desktop\php\canteen_management_system-master\staff\*.php' | foreach-object { $_.LastWriteTime = Get-Date; $_.CreationTime = Get-Date }"
PAUSE
