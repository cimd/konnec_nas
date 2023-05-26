<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('pkg_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('icon');
            $table->string('description');
            $table->string('developer');
            $table->string('developer_link');
            $table->string('category');
            $table->string('installed_version')->nullable();
            $table->string('installed_version_type')->nullable();
            $table->string('installation_status')->nullable();
            $table->boolean('has_config');
            $table->string('config_route')->nullable();
            $table->boolean('can_remove');
            $table->string('newest_version')->nullable();
            $table->string('newest_version_type')->nullable();
            $table->string('newest_version_url')->nullable();
            $table->string('newest_version_filename')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pkg_packages');
    }
};
