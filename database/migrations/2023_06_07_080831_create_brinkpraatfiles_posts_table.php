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
        Schema::create('brinkpraatfile_posts', function (Blueprint $table) {
            $table->id();
            $table->text('filename');
            $table->text('filepath');
            $table->timestamp('datetime')->useCurrent;
            $table->timestamp('updated_at')->useCurrent;
            $table->timestamp('created_at')->useCurrent;
            $table->tinyInteger('public')->default('0'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brinkpraatfile_posts');
    }
};
