<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function($table) {
            $table->string('birth_date')->nullable();
            $table->string('start_date')->nullable();
            $table->string('dead_line')->nullable();
            $table->string('missed_visit')->nullable();
            $table->string('visit_date')->nullable();
            $table->string('follow_up')->nullable();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
		$table->dropColumn('birth_date');
        $table->dropColumn('start_date');
		$table->dropColumn('dead_line');
		$table->dropColumn('missed_visit');
		$table->dropColumn('visit_date');
		$table->dropColumn('follow_up');
    	});
    }
}
