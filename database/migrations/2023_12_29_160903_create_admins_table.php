<?php

use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('name')->nullable();
            $table->string('email', 191)->unique()->nullable();
            $table->string('mobile', 13)->unique()->nullable();
            $table->enum('rule', [Admin::ADMIN, Admin::SUPERADMIN]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
