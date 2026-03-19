const fs = require('fs');
const path = require('path');
const https = require('https');

// Ensure directories
const dirs = [
    'public/assets/css',
    'public/assets/js',
    'public/assets/images',
    'public/assets/icons/outline',
    'public/assets/icons/solid'
];

dirs.forEach(dir => {
    if (!fs.existsSync(dir)) {
        fs.mkdirSync(dir, { recursive: true });
        console.log(`Created directory: ${dir}`);
    }
});

// 1. Copy from node_modules
const filesToCopy = [
    { src: 'node_modules/bootstrap/dist/css/bootstrap.min.css', dest: 'public/assets/css/bootstrap.min.css' },
    { src: 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', dest: 'public/assets/js/bootstrap.bundle.min.js' },
    { src: 'node_modules/chart.js/dist/chart.umd.js', dest: 'public/assets/js/chart.umd.js' },
    { src: 'node_modules/datatables.net/js/jquery.dataTables.min.js', dest: 'public/assets/js/jquery.dataTables.min.js' },
    { src: 'node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js', dest: 'public/assets/js/dataTables.bootstrap5.min.js' },
    { src: 'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', dest: 'public/assets/css/dataTables.bootstrap5.min.css' },
    { src: 'node_modules/sweetalert2/dist/sweetalert2.all.min.js', dest: 'public/assets/js/sweetalert2.all.min.js' },
    { src: 'node_modules/sweetalert2/dist/sweetalert2.min.css', dest: 'public/assets/css/sweetalert2.min.css' },
    { src: 'node_modules/jquery/dist/jquery.min.js', dest: 'public/assets/js/jquery.min.js' },
];

filesToCopy.forEach(file => {
    if (fs.existsSync(file.src)) {
        fs.copyFileSync(file.src, file.dest);
        console.log(`Copied: ${file.src} -> ${file.dest}`);
    } else {
        console.error(`Not found: ${file.src}`);
    }
});

// 2. Download HeroIcons (Outline and Solid)
const icons = [
    'home', 'users', 'cog-6-tooth', 'chart-bar', 'document-text', 
    'shield-check', 'x-circle', 'lock-closed', 'bars-3', 'user'
];

function downloadIcon(name, type = 'outline') {
    const url = `https://unpkg.com/heroicons@2.1.3/24/${type}/${name}.svg`;
    const dest = `public/assets/icons/${type}/${name}.svg`;
    
    https.get(url, (res) => {
        if (res.statusCode === 200) {
            const file = fs.createWriteStream(dest);
            res.pipe(file);
            file.on('finish', () => {
                file.close();
                console.log(`Downloaded: ${type}/${name}.svg`);
            });
        } else {
            console.error(`Status ${res.statusCode} loading ${url}`);
        }
    }).on('error', (err) => {
        console.error(`Error downloading ${url}:`, err.message);
    });
}

icons.forEach(icon => {
    downloadIcon(icon, 'outline');
    downloadIcon(icon, 'solid');
});
