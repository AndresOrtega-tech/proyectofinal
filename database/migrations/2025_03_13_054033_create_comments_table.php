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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // Clave primaria 'comment_id'
            $table->unsignedBigInteger('project_id'); // Clave foránea a 'projects'
            $table->unsignedBigInteger('user_id'); // Clave foránea a 'users'
            $table->text('content'); // Contenido del comentario, tipo TEXT
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
        Schema::dropIfExists('comments');
    }
};
