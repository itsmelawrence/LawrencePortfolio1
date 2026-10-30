<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // The contact form has no subject field, so saved messages leave it empty.
    // Production's contacts table has no subject column at all; there is nothing to change there.
    public function up(): void
    {
        if (! Schema::hasColumn('contacts', 'subject')) {
            return;
        }

        Schema::table('contacts', function (Blueprint $table) {
            $table->string('subject')->nullable()->change();
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('contacts', 'subject')) {
            return;
        }

        Schema::table('contacts', function (Blueprint $table) {
            $table->string('subject')->nullable(false)->change();
        });
    }
};
