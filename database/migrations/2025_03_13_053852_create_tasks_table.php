/c:/Users/andre/Desktop/IDS/RED_SOCIAL_PROYECTOS_COLABORATIVOS_v2/redSocialProyectos/database/migrations/2025_03_13_053852_create_tasks_table.php
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->date('due_date')->nullable();
            
            // Asegúrate de que el tipo de datos coincida con la columna referenciada
            $table->unsignedBigInteger('project_id');
            
            // Crea la clave foránea con onDelete y onUpdate
            $table->foreign('project_id')
                  ->references('project_id')
                  ->on('projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            // Si hay un usuario asignado a la tarea
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->foreign('assigned_to')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};