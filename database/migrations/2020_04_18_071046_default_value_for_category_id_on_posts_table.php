<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefaultValueForCategoryIdOnPostsTable extends Migration
{
    private $table = 'posts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(['category_id']);

            $table->unsignedBigInteger('category_id')
                ->nullable()
                ->default(1)
                ->change();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(['category_id']);

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')
                ->nullable(false)
                ->default(NULL)
                ->change();
        });
    }
}
