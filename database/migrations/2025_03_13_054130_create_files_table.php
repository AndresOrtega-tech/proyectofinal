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
        Schema::create('files', function (Blueprint $table) {
            $table->id('file_id'); // Clave primaria 'file_id'
            $table->unsignedBigInteger('project_id'); // Clave foránea a 'projects'
            $table->unsignedBigInteger('user_id'); // Clave foránea a 'users'
            $table->string('file_name');
            $table->string('file_url'); // Para guardar la URL o ruta al archivo
            $table->dateTime('uploaded_at')->nullable(); // Fecha y hora de subida, permitimos nulo
            $table->timestamps(); // created_at y updated_at
    
            // Definir las claves foráneas
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
