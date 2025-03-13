<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id('membership_id'); // Clave primaria 'membership_id'
            $table->unsignedBigInteger('user_id'); // Clave foránea a 'users'
            $table->unsignedBigInteger('project_id'); // Clave foránea a 'projects'
            $table->string('role')->nullable(); // Rol dentro del proyecto, permitimos nulo
            $table->dateTime('joined_at')->nullable(); // Fecha de ingreso al proyecto, permitimos nulo
            $table->timestamps(); // created_at y updated_at
    
            // Definir las claves foráneas
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('project_id')->references('project_id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
