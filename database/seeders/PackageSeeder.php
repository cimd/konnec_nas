<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Apache',
                'icon' => 'apache',
                'description' => 'Apache web server',
                'developer' => 'apache developer',
                'developer_link' => 'https://www.apache.org',
                'category' => '["Utilities"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => true,
                'can_remove' => false,
                'installation_status' => 'Installed'
            ],
            [
                'name' => 'MariaDB',
                'icon' => 'mariadb',
                'description' => 'Maria DB server',
                'developer' => 'MariaDB',
                'developer_link' => 'https://mariadb.org/',
                'category' => '["Utilities"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => true,
                'can_remove' => false,
                'installation_status' => 'Installed'
            ],
            [
                'name' => 'PHP8',
                'icon' => 'php',
                'description' => 'PHP 8.0',
                'developer' => 'PHP',
                'developer_link' => 'https://www.php.net',
                'category' => '["Utilities"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => true,
                'can_remove' => false,
                'installation_status' => 'Installed'
            ],
            [
                'name' => 'Redis',
                'icon' => 'redis',
                'description' => 'Redis Server',
                'developer' => 'Redis',
                'developer_link' => 'https://redis.io',
                'category' => '["Utilities"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => true,
                'can_remove' => false,
                'installation_status' => 'Installed'
            ],
            [
                'name' => 'Lollypop',
                'icon' => 'lollypop',
                'description' => 'Music Player',
                'developer' => 'Gnome',
                'developer_link' => 'https://wiki.gnome.org/Apps/Lollypop',
                'category' => '["Media"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => false,
                'can_remove' => true,
                'installation_status' => null
            ],
            [
                'name' => 'phpMyAdmin',
                'icon' => 'phpMyAdmin',
                'description' => 'phpMyAdmin',
                'developer' => 'Gnome',
                'developer_link' => 'https://wiki.gnome.org/Apps/Lollypop',
                'category' => '["Media"]',
                'installed_version' => null,
                'installed_version_type' => 'stable',
                'newest_version' => null,
                'newest_version_type' => null,
                'has_config' => false,
                // 'config_route' => '/phpmyadmin',
                'can_remove' => true,
                'installation_status' => 'Installed'
            ],  
            [
                'name' => 'Plex',
                'icon' => '',
                'description' => 'Plex Media Player',
                'developer' => 'Plex.tv',
                'developer_link' => 'plex.tv',
                'category' => 'media',
                'installed_version' => '',
                'installed_version_type' => '',
                'newest_version' => '1.27.2.5929-a806c5905',
                'newest_version_type' => '',
                'has_config' => false,
                // 'config_route' => '/phpmyadmin',
                'can_remove' => true,
                'installation_status' => ''
            ],  
            // [
                // 'name' => '',
                // 'icon' => '',
                // 'description' => '',
                // 'developer' => '',
                // 'developer_link' => '',
                // 'category' => '',
                // 'installed_version' => '',
                // 'installed_version_type' => '',
                // 'newest_version' => '',
                // 'newest_version_type' => '',
                // 'has_config' => false,
                // 'config_route' => '/phpmyadmin',
                // 'can_remove' => true,
                // 'installation_status' => ''
            // ],
        ];
        Package::insert($data);
    }
}
