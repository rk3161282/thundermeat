<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->tinyInteger('status')->default('1');
            $table->string('delivery_duration', 100)->nullable();
            $table->string('min_purchase_amount', 100)->nullable();
            $table->string('max_purchase_amount', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('delivery_duration');
            $table->dropColumn('min_purchase_amount');
            $table->dropColumn('max_purchase_amount');
        });
    }
}
