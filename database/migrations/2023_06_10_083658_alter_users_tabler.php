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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('state_id')
                ->after('id')
                ->unsigned()
                ->references('id')
                ->on('states');
            $table->foreignId('city_id')
                ->after('state_id')
                ->unsigned()
                ->references('id')
                ->on('cities');
            $table->enum('gender', ['H', 'M'])->after('remember_token');
            $table->string('cpf', 11)->after('gender');
            $table->date('birth')->after('cpf');
            $table->string('address', 250)->after('birth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['state_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('state_id');
        });
    }
};
