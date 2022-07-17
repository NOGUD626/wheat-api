<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); # 自動インクリメントするBIGINT型カラムを生成
            $table->char('name', 30);
            $table->string('uid', 128);
            $table->string('email', 50);
            $table->string('line_id', 128);
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps(); # データ登録日と更新日時のための「create_at」と 「updateted_at」を追加
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('status_type')
                ->onDelete('cascade');
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
