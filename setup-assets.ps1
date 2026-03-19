# Create directories
New-Item -ItemType Directory -Force -Path "public/assets/css"
New-Item -ItemType Directory -Force -Path "public/assets/js"
New-Item -ItemType Directory -Force -Path "public/assets/images"
New-Item -ItemType Directory -Force -Path "public/assets/icons/outline"
New-Item -ItemType Directory -Force -Path "public/assets/icons/solid"

# Copy files from node_modules
$files = @(
    @("node_modules/bootstrap/dist/css/bootstrap.min.css", "public/assets/css/bootstrap.min.css"),
    @("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", "public/assets/js/bootstrap.bundle.min.js"),
    @("node_modules/chart.js/dist/chart.umd.js", "public/assets/js/chart.umd.js"),
    @("node_modules/datatables.net/js/jquery.dataTables.min.js", "public/assets/js/jquery.dataTables.min.js"),
    @("node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js", "public/assets/js/dataTables.bootstrap5.min.js"),
    @("node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css", "public/assets/css/dataTables.bootstrap5.min.css"),
    @("node_modules/sweetalert2/dist/sweetalert2.all.min.js", "public/assets/js/sweetalert2.all.min.js"),
    @("node_modules/sweetalert2/dist/sweetalert2.min.css", "public/assets/css/sweetalert2.min.css"),
    @("node_modules/jquery/dist/jquery.min.js", "public/assets/js/jquery.min.js")
)

foreach ($file in $files) {
    if (Test-Path $file[0]) {
        Copy-Item $file[0] $file[1] -Force
        Write-Host "Copied: $($file[0]) -> $($file[1])"
    } else {
        Write-Warning "Not found: $($file[0])"
    }
}

# Download HeroIcons
$icons = @('home', 'users', 'cog-6-tooth', 'chart-bar', 'document-text', 'shield-check', 'x-circle', 'lock-closed', 'bars-3', 'user')

foreach ($icon in $icons) {
    $outlineUrl = "https://unpkg.com/heroicons@2.1.3/24/outline/$icon.svg"
    $solidUrl = "https://unpkg.com/heroicons@2.1.3/24/solid/$icon.svg"
    
    try {
        Invoke-WebRequest -Uri $outlineUrl -OutFile "public/assets/icons/outline/$icon.svg" -UseBasicParsing
        Invoke-WebRequest -Uri $solidUrl -OutFile "public/assets/icons/solid/$icon.svg" -UseBasicParsing
        Write-Host "Downloaded: $icon"
    } catch {
        Write-Error "Failed to download $icon : $_"
    }
}

Write-Host "Asset setup complete!"
