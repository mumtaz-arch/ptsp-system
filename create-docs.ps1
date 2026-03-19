$files = @(
    "docs/01_project_overview.md",
    "docs/02_project_spec.md",
    "docs/03_system_design.md",
    "docs/04_database_design.md",
    "docs/05_feature_spec.md",
    "docs/06_ui_guidelines.md",
    "docs/07_technical_rules.md",
    "docs/08_execution_prompt.md"
)

# Ensure directory exists
New-Item -ItemType Directory -Force -Path "docs"

# Create empty files
foreach ($f in $files) {
    if (-not (Test-Path $f)) {
        New-Item -ItemType File -Force -Path $f
        Write-Host "Created: $f"
    } else {
        Write-Host "Exists: $f"
    }
}
