<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const PROPERTIES_CASCADE = 'cascade';

    const PROPERTIES_RESTRICT = 'restrict';

    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('bill_detail', function (Blueprint $table) {
            $table->foreign('id_bill')
                ->references('id')
                ->on('bills')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
            $table->foreign('id_product')
                ->references('id')
                ->on('product')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('bill_in', function (Blueprint $table) {
            $table->foreign('id_supplier')
                ->references('id')
                ->on('supplier')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('bill_in_detail', function (Blueprint $table) {
            $table->foreign('id_bill_in')
                ->references('id')
                ->on('bill_in')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('comment', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
            $table->foreign('id_product')
                ->references('id')
                ->on('product')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('permission', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('product', function (Blueprint $table) {
            $table->foreign('id_type')
                ->references('id')
                ->on('type_product')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('rating', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
            $table->foreign('id_product')
                ->references('id')
                ->on('product')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role')
                ->references('id')
                ->on('roles')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
            $table->foreign('id_permission')
                ->references('id')
                ->on('permission')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });
        Schema::table('store', function (Blueprint $table) {
            $table->foreign('id_product')
                ->references('id')
                ->on('product')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });
        Schema::table('history_stored_in_day', function (Blueprint $table) {
            $table->foreign('id_store')
                ->references('id')
                ->on('store')
                ->onDelete(self::PROPERTIES_CASCADE)
                ->onUpdate(self::PROPERTIES_CASCADE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('bills_id_user_foreign');
        });
        Schema::table('bill_detail', function (Blueprint $table) {
            $table->dropForeign('bills_detail_id_bill_foreign');
            $table->dropForeign('bills_detail_id_product_foreign');
        });
        Schema::table('bill_in', function (Blueprint $table) {
            $table->dropForeign('bill_in_id_supplier_foreign');
        });
        Schema::table('bill_in_detail', function (Blueprint $table) {
            $table->dropForeign('bill_in_detail_id_bill_in_foreign');
        });
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign('comment_id_id_user_foreign');
            $table->dropForeign('comment_id_id_product_foreign');
        });
        Schema::table('permission', function (Blueprint $table) {
            $table->dropForeign('permission_id_user_in_foreign');
        });
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_id_type_in_foreign');
            $table->dropForeign('product_id_user_in_foreign');
        });
        Schema::table('rating', function (Blueprint $table) {
            $table->dropForeign('rating_id_user_in_foreign');
            $table->dropForeign('rating_id_product_in_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_role_in_foreign');
            $table->dropForeign('users_id_permission_in_foreign');
        });
        Schema::table('store', function (Blueprint $table) {
            $table->dropForeign('store_id_product_in_foreign');
        });
        Schema::table('history_stored_in_day', function (Blueprint $table) {
            $table->dropForeign('history_stored_in_day_id_store_in_foreign');
        });
    }
}
