<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('operation_id')->nullable(true);
            $table->text('notification_type')->nullable(true);
            $table->text('date')->nullable(true);
            $table->text('amount')->nullable(true);
            $table->text('withdraw_amount')->nullable(true);
            $table->text('currency')->nullable(true);
            $table->text('sender')->nullable(true);
            $table->text('codepro')->nullable(true);
            $table->text('label')->nullable(true);
            $table->text('sha1hash')->nullable(true);
            $table->text('sha1hash_server')->nullable(true);
            $table->text('unaccepted')->nullable(true);
            $table->text('yandex_string')->nullable(true);
            $table->text('email')->nullable(true);
            $table->text('errors')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
