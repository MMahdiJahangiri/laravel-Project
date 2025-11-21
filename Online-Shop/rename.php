<?php
/**
 * rename_classes_advanced.php
 *
 * نسخه پیشرفته از اسکریپت تغییر نام مدل‌ها و کنترلرها در پروژه Laravel.
 * این نسخه علاوه بر تغییر نام فایل‌ها و کلاس‌ها، همه‌ی namespace و use‌ها را هم اصلاح می‌کند.
 */

$directories = [
    'app/Http/Controllers',
    'app/Models',
];

// نگاشت جمع → مفرد
$replacements = [
    'ProductPhotos' => 'ProductPhoto',
    'ProductVideos' => 'ProductVideo',
    'ProductTypes'  => 'ProductType',
    'Products'      => 'Product',
    'product_photos' => 'ProductPhoto',
    'product_videos' => 'ProductVideo',
    'product_types'  => 'ProductType',
    'product'        => 'Product',
];

// تابع کمکی برای جایگزینی حساس به حروف بزرگ/کوچک
function replaceInsensitive($search, $replace, $subject) {
    return preg_replace_callback('/' . preg_quote($search, '/') . '/i', function($matches) use ($replace) {
        return $replace;
    }, $subject);
}

// مرحله ۱: تغییر نام کلاس‌ها و namespace درون فایل‌ها
foreach ($directories as $dir) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $oldPath = $file->getPathname();
            $content = file_get_contents($oldPath);

            foreach ($replacements as $old => $new) {
                // تغییر نام کلاس‌ها
                $content = preg_replace('/class\s+' . $old . '\b/i', 'class ' . $new, $content);

                // تغییر useها
                $content = preg_replace('/use\s+App\\\\Models\\\\' . $old . '\b/i', 'use App\\Models\\' . $new, $content);
                $content = preg_replace('/use\s+App\\\\Http\\\\Controllers\\\\' . $old . '\b/i', 'use App\\Http\\Controllers\\' . $new, $content);

                // تغییر رفرنس‌های مستقیم در کد
                $content = replaceInsensitive($old, $new, $content);
            }

            file_put_contents($oldPath, $content);
        }
    }
}

// مرحله ۲: تغییر نام فایل‌ها
foreach ($directories as $dir) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);

    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $oldPath = $file->getPathname();
            $filename = $file->getFilename();

            foreach ($replacements as $old => $new) {
                if (stripos($filename, $old) !== false) {
                    $newFilename = str_ireplace($old, $new, $filename);
                    $newPath = $file->getPath() . DIRECTORY_SEPARATOR . $newFilename;

                    if ($oldPath !== $newPath) {
                        rename($oldPath, $newPath);
                        echo "✅ Renamed file: {$filename} → {$newFilename}\n";
                    }
                    break;
                }
            }
        }
    }
}

echo "\n🎉 تمام شد! همه‌ی فایل‌ها، کلاس‌ها و useها به‌روزرسانی شدند.\n";
