<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkgPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkg_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('description');
            $table->string('developer');
            $table->string('developer_link');
            $table->string('category');
            $table->string('installed_version');
            $table->string('installed_version_type');
            $table->string('newest_version');
            $table->string('newest_version_type');
            $table->string('installation_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkg_packages');
    }
}
