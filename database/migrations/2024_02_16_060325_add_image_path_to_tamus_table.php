<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
            Schema::table('tamus', function (Blueprint $table) {
                $table->string('image_path')->nullable()->before('tujuan');
            });
    }

    public function down()
    {
        Schema::table('tamus', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
