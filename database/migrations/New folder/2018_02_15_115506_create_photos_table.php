<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('album_id');
            //filename
            $table->string('photo');
            $table->string('title');
            $table->string('size');
            $table->string('description');

            $table->timestamps();
        });

        $this->insertDefaultData();
    }



    public function insertDefaultData(){
        //setup default data
        $rows = [
            [
                'album_id'=>1,
                'photo'=>'test album dewsc',
                'title'=>'my cover image here',
                'size'=>'234 kb',
                'description'=>'my desc image here',

                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ],
            [
                'album_id'=>1,
                'photo'=>'test album dewsc2',
                'title'=>'my cover image here2',
                'size'=>'834 kb',
                'description'=>'my desc image2 here',

                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ],
        ];
        // insert records
        DB::table('photos')->insert($rows);
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
