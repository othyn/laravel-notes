<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Othyn\LaravelNotes\Resolvers\UserResolver;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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
                $table->bigIncrements(
                    column: 'id'
                );

                $table->string(
                    column: UserResolver::notesTypeField()
                )->nullable();

                $table->unsignedBigInteger(
                    column: UserResolver::notesIdField()
                )->nullable();

                $table->morphs(
                    name: 'notable'
                );

                $table->text(
                    column: 'note'
                );

                $table->timestamps();

                $table->index(
                    columns: [
                        UserResolver::notesTypeField(),
                        UserResolver::notesIdField(),
                    ]
                );
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(
            name: config(
                key: 'laravel-notes.database.connection'
            )
        )->drop(
            table: config(
                key: 'laravel-notes.database.table'
            ),
        );
    }
};
