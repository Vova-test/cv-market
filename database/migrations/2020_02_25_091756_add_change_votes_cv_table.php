<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeVotesCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->renameColumn('address', 'street_address');
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip_code')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->renameColumn('street_address', 'address');
            $table->dropColumn('region');
            $table->dropColumn('country');
            $table->dropColumn('zip_code');
        });
    }
}
