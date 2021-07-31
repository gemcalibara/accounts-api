<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration {

	public function up()
	{
		Schema::create('accounts', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('account_name', 300);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('accounts');
	}
}