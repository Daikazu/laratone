<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{

    private $tablename;

    public function __construct()
    {
        $this->tablename = config('laratone.table_prefix') . 'colors';

    }


    public function up()
    {

        Schema::Create($this->tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('colorbook_id')->unsigned();
            $table->string('name');
            $table->string('lab');
            $table->string('hex');
            $table->string('rgb');
            $table->string('cmyk');

            $table->foreign('colorbook_id')
                ->references('id')
                ->on($this->tablename)
                ->onDelete('cascade');

            $table->timestamps();

        });

    }

    public function down()
    {
        Schema::dropIfExists($this->tablename);
    }

}