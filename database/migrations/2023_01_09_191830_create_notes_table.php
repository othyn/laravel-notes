<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Othyn\LaravelNotes\Resolvers\UserResolver;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection(
            name: config(
                key: 'laravel-notes.database.connection'
            )
        )->create(
            table: config(
                key: 'laravel-notes.database.table'
            ),
            callback: function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger(column: UserResolver::notesIdField())->nullable();
                $table->string(column: UserResolver::notesTypeField())->nullable();

                $table->morphs(name: 'notable');

                $table->text(column: 'contents');

                $table->timestamps();
                $table->softDeletes();

                $table->index(columns: [
                    UserResolver::notesIdField(),
                    UserResolver::notesTypeField(),
                ]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection(
            name: config(
                key: 'laravel-notes.database.connection'
            )
        )->dropIfExists(
            table: config(
                key: 'laravel-notes.database.table'
            ),
        );
    }
};
