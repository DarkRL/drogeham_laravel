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
        //
        Schema::create('extra_pages', function (Blueprint $table) {
            $table->id();
            $table->text('headline');
            $table->text('pagename');
            $table->text('fulltext');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('extra_pages');
    }
};
