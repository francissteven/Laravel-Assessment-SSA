<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned, auto_increment, primary key
            $table->string('prefixname')->nullable(); // varchar(255), nullable
            $table->string('firstname'); // varchar(255), not nullable
            $table->string('middlename')->nullable(); // varchar(255), nullable
            $table->string('lastname'); // varchar(255), not nullable
            $table->string('suffixname')->nullable(); // varchar(255), nullable
            $table->string('username')->unique(); // varchar(255), unique
            $table->string('email')->unique(); // varchar(255), unique
            $table->text('password'); // text, not nullable
            $table->text('photo')->nullable(); // text, nullable
            $table->string('type')->default('user')->index(); // varchar(255), indexed, default 'user'
            $table->string('remember_token', 100)->nullable(); // varchar(100), nullable
            $table->timestamp('email_verified_at')->nullable(); // timestamp, nullable
            $table->timestamps(); // created_at and updated_at as timestamps, nullable by default
            $table->softDeletes(); // deleted_at as a timestamp, nullable
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
