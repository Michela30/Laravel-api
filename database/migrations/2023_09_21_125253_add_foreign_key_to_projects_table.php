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
        Schema::table('projects', function (Blueprint $table) {
            
            //creare colonna FK
            $table->unsignedBigInteger('type_id')->nullable()->after('description');

            //creare vincolo
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //prima il vincolo
            $table->dropForeign(['type_id']);

            //poi la colonna
            $table->dropColumn('type_id');
        });
    }
};
