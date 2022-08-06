<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinebotConfigTable extends Migration
{
    public function up()
    {
        Schema::create('linebot_config', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('url_path', 20);
            $table->string('channel_accecc_token');
            $table->string('channel_secret', 50);
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('linebot_config');
    }
}
