<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('announcement_benefit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id')->constrained()->onDelete('cascade');
            $table->foreignId('benefit_id')->constrained()->onDelete('cascade');
            $table->unique(['announcement_id', 'benefit_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('announcement_benefit');
    }
};