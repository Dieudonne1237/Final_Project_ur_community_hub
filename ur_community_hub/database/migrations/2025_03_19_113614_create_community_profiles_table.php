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
        Schema::create('community_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('community_name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('bio')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('facebook_links')->nullable();
            $table->string('linkedin_links')->nullable();
            $table->string('instagram_links')->nullable();
            $table->string('twitter_links')->nullable();
            $table->string('community_status')->default('association'); 
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_profiles');
    }
};
