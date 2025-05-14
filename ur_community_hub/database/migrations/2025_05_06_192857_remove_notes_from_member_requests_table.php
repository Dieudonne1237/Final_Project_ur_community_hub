<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNotesFromMemberRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            if (Schema::hasColumn('member_requests', 'notes')) {
                $table->dropColumn('notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            $table->text('notes')->nullable();
        });
    }
}
