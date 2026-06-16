<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'original_price')) {
                $table->decimal('original_price', 12, 2)->nullable()->after('brand');
            }

            if (! Schema::hasColumn('products', 'sale_price')) {
                $table->decimal('sale_price', 12, 2)->nullable()->after('original_price');
            }

            if (! Schema::hasColumn('products', 'special_discount')) {
                $table->decimal('special_discount', 12, 2)->nullable()->after('sale_price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            foreach (['special_discount', 'sale_price', 'original_price'] as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
