<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToMemberRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email'); // Add the 'phone' column
        });
    }

    public function down(): void
    {
        Schema::table('member_requests', function (Blueprint $table) {
            $table->dropColumn('phone'); // Remove the 'phone' column if needed to roll back
        });
    }
}
