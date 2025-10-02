REG DELETE «HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\Explorer\Shell Icons» /f
taskkill /F /IM explorer.exe
cd %USERPROFILE%
cd appdata
cd local
attrib -h IconCache.db
del IconCache.db
start explorer.exe
exit