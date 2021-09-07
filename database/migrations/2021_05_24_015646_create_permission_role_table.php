<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('id_permission');
            $table->unsignedInteger('id_role');
        
            $table->foreign('id_permission')->references('id')->on('permission')
                ->onDelete('cascade');
            $table->foreign('id_role')->references('id')->on('role')
                ->onDelete('cascade');
            $table->boolean('isAllowed');    
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
        Schema::dropIfExists('permission_role');
    }
}
