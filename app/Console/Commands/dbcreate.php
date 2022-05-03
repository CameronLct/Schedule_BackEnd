<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MYSQL database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //informations retrieval
        $database = $this->argument('name') ?: config('database.connections.mysql.database');
        $charset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        //empty config
        config(['database.connections.mysql.database' => null]);

        $query = "DROP DATABASE IF EXISTS $database;";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $database CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        echo "Database $database created successfully";

        //recreation of config
        config(['database.connections.mysql.database' => $database]);

    }
}
