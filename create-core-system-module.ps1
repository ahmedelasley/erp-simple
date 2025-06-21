$moduleName = "System"
$coreDir = "Modules\Core"
$fullPath = "$coreDir\$moduleName"
$originalPath = "Modules\$moduleName"

# 1. إنشاء الموديول
php artisan module:make $moduleName

# 2. إنشاء مجلد Core إن لم يكن موجود
if (-Not (Test-Path $coreDir)) {
    New-Item -Path $coreDir -ItemType Directory
}

# 3. نقل الموديول إلى مجلد Core
Move-Item $originalPath $fullPath

# 4. تحديث namespaces في ملفات PHP
Get-ChildItem -Recurse -Path $fullPath -Include *.php | ForEach-Object {
    (Get-Content $_.FullName) -replace "Modules\\$moduleName", "Modules\\Core\\$moduleName" | Set-Content $_.FullName
}

# 5. تعديل module.json
$jsonPath = "$fullPath\module.json"
(Get-Content $jsonPath) -replace "`"name`": `"$moduleName`"", "`"name`": `"System`"" |
    ForEach-Object { $_ -replace "`"alias`": `"system`"", "`"alias`": `"core.system`"" } |
    ForEach-Object { $_ -replace "Modules\\\\$moduleName", "Modules\\\\Core\\\\$moduleName" } |
    Set-Content $jsonPath

# 6. تعليمات أخيرة
Write-Host "`n✅ تم إنشاء الموديول Core/System بنجاح!"
Write-Host "📌 تأكد من تعديل config/modules.php وإضافة السطر التالي:"
Write-Host "`n    'core.system' => ["
Write-Host "        'path' => base_path('Modules/Core/System'),"
Write-Host "    ],`n"

# 7. تنظيف الكاش
composer dump-autoload
php artisan optimize:clear
