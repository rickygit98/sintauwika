<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topiks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mahasiswa_id')->nullable();
            $table->foreignId('dosen_id')->nullable();
            // $table->foreignId('dosen2_id')->nullable();
            $table->foreignId('kategori_id')->nullable();

            $table->string('title')->nullable();
            $table->string('status')->nullable();
            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topiks');
    }
}
