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
    Schema::table('member_requests', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->text('notes')->nullable();
        $table->text('admin_notes')->nullable();
    });
}

public function down(): void
{
    Schema::table('member_requests', function (Blueprint $table) {
        $table->dropColumn(['phone', 'notes', 'admin_notes']);
    });
}
};
