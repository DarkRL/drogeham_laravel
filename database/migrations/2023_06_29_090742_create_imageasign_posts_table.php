<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imageasign_posts', function (Blueprint $table) {
            $table->id();
            $table->text('photo');
            $table->timestamp('updated_at')->useCurrent();
        });

        DB::table('imageasign_posts')->insert([
            'photo' => 'empty',
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imageasign_posts');
    }
};
