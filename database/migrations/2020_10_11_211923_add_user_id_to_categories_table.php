<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::table(
            'categories',
            static function (Blueprint $table) {
                $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'categories',
            static function (Blueprint $table) {
                $table->dropForeign('categories_user_id_foreign');
                $table->dropColumn('user_id');
            }
        );
    }
}
