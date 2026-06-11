<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

$tables = [
    'users',
    'profiles',
    'categories',
    'providers',
    'scholarships',
    'applications',
    'documents',
    'favorites',
    'chat_rooms',
    'chat_participants',
    'messages',
    'admin_logs',
    'application_status_logs'
];

$seederContent = "<?php\n\nnamespace Database\Seeders;\n\nuse Illuminate\Database\Seeder;\nuse Illuminate\Support\Facades\DB;\n\nclass DataMigrationSeeder extends Seeder\n{\n    public function run()\n    {\n";

foreach ($tables as $table) {
    $rows = DB::table($table)->get();
    if ($rows->count() > 0) {
        $seederContent .= "        DB::table('$table')->insert([\n";
        foreach ($rows as $row) {
            $array = json_decode(json_encode($row), true);
            $seederContent .= "            " . var_export($array, true) . ",\n";
        }
        $seederContent .= "        ]);\n\n";
    }
}

$seederContent .= "    }\n}\n";

File::put(database_path('seeders/DataMigrationSeeder.php'), $seederContent);

echo "DataMigrationSeeder created successfully!\n";
