<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();;
            $table->string('code')->unique();
            $table->enum('type_discount', ['gift', 'discount'])->default('discount');
            $table->enum('type_value', ['fixed', 'percent', 'both'])->default('fixed');
            //if select fixed then value_fixed is active & if select percent then value_percent is active & if select both active  value_percent&&value_fixed
            $table->decimal('value_fixed', 20, 2)->default(0);
            $table->decimal('value_percent', 20, 2)->default(0);
            $table->decimal('max_discount', 20, 2)->default(0);
            //if The amount of discount>max_discount then value_fixed==max_discount
            $table->integer('count_user')->default(1);//The number of times a user uses this discount code
            $table->integer('count_discount')->default(1);//the number of this discount for all user
            $table->date('start_date')->nullable();//the date of start discount
            $table->date('expiry_date')->nullable();//the date of expiry discount
            $table->enum('status', ['active', 'inactive'])->default('inactive');
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
        Schema::dropIfExists('discounts');
    }
}
