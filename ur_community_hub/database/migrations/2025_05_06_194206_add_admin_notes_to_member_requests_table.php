<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminNotesToMemberRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            $table->text('admin_notes')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
        });
    }
}
