<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	public function up()
	{
		Schema::create('transactions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('account_id')->unsigned();
            $table->index('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
			$table->date('date');
			$table->string('description', 500);
			$table->decimal('amount');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('transactions');
	}
}