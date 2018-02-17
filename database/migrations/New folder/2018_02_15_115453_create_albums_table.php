<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            $table->string('cover_image');

            $table->timestamps();
        });

        $this->insertDefaultData();
    }


    public function insertDefaultData(){
        //setup default data
        $rows = [
            [
            'name'=>'test album',
            'description'=>'test album dewsc',
            'cover_image'=>'my cover image here',

            'created_at'=>date('Y-m-d G:i:s'),
            'updated_at'=>date('Y-m-d G:i:s')
            ],
            [
            'name'=>'test album2',
            'description'=>'test album dewsc2',
            'cover_image'=>'my cover image2 here',

            'created_at'=>date('Y-m-d G:i:s'),
            'updated_at'=>date('Y-m-d G:i:s')
            ]
        ];
        // insert records
        DB::table('albums')->insert($rows);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
