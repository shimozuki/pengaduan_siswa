<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP PROCEDURE IF EXISTS update_pengaduan_status;');
        DB::statement('CREATE PROCEDURE update_pengaduan_status(IN `idx` INT, IN `Statusx` ENUM("0", "Proses", "Selesai"))
        BEGIN
            UPDATE `pengaduans` SET `status` = `Statusx` WHERE id_pengaduan = `idx`;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP PROCEDURE IF EXISTS update_pengaduan_status;');
    }
};
