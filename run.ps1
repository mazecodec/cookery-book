Get-Job | Remove-Job -Name Job*
Start-Job -Name Job1 -ScriptBlock {php artisan serve}
Start-Job -Name Job2 -ScriptBlock {yarn run dev}
