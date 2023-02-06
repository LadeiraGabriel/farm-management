<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->float('weight');
            $table->boolean('is_vaccinated');
            $table->string('image_path');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

  /*   - id - primaryKey
- nome - String
- idade - Number int
- peso Number Float
- vascinada - Boolean
- user_id - ForeignKey */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('cows', function(Blueprint $table){
            $table->dropForeignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
        });
        Schema::dropIfExists('cows');
    }
};
