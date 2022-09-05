<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('folders_files', function (Blueprint $table) {
            $table->foreignId('folder_id')->nullable(false)->constrained()->cascadeOnDelete();
            $table->foreignId('file_id')->nullable(false)->constrained()->cascadeOnDelete();
            $table->primary(['folder_id','file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders_files');
    }
};
