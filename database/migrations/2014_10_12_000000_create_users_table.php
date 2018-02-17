<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            //$table->integer('role_id')->index()->unsigned()->nullable();

            /*
             * default role is as subscribrer rather than mull
             * 1=admin,
             * 2=author,
             * 3=subscriber
             *
             * default set as app complains about it being null
            */
            //$table->integer('role_id')->default(3);
            //$table->integer('is_active')->default(0);
			
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //setup default user
        $rows = [
            [
                'name' => 'admin',
                'email' => 'admin@app.com',
                'password' =>  bcrypt('pass'),
                //'role_id'=>1,
                //'is_active'=>1,
                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ]/*,
            [
                'name' => 'author',
                'email' => 'author@app.com',
                'password' =>  bcrypt('pass'),
                'role_id'=>2,
                'is_active'=>1,
                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ],
            [
                'name' => 'subscriber',
                'email' => 'subscriber@app.com',
                'password' =>  bcrypt('pass'),
                'role_id'=>3,
                'is_active'=>1,
                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ]*/
        ];
        // insert records
        DB::table('users')->insert($rows);


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
