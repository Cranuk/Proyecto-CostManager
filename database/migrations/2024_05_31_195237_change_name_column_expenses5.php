<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->renameColumn('update_at', 'updated_at');
        });
    }

    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->renameColumn('updated_at', 'update_at');
        });
    }
};
