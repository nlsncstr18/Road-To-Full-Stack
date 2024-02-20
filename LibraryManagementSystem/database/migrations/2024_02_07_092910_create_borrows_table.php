<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('borrowed_at')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->timestamps();
        });



        // Schema::create('borrows', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('author');

        //     $table->dateTime('borrowed_at')->nullable();
        //     $table->dateTime('returned_at')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
