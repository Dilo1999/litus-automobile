<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'title')) {
                $table->string('title')->nullable()->after('name');
            }

            if (! Schema::hasColumn('products', 'sub_category')) {
                $table->string('sub_category')->nullable()->after('category');
            }

            if (! Schema::hasColumn('products', 'brand')) {
                $table->string('brand')->nullable()->after('sub_category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'brand')) {
                $table->dropColumn('brand');
            }

            if (Schema::hasColumn('products', 'sub_category')) {
                $table->dropColumn('sub_category');
            }

            if (Schema::hasColumn('products', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};

