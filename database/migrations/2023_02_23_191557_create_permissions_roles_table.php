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
        Schema::create('permission_role', function (Blueprint $table) {
            // $table->id();
            $table->primary(['permission_id', 'role_id']);
            $table->foreignId("permission_id")->constrained()->onDelete('cascade');
            $table->foreignId("role_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};

// tinker
// $admin->permissions()->attach($perm);
// $perm = App\Models\Permission::find(1);
// $user->roles()->attach($admin);
// $admin = App\Models\Role::find(1);
// $user = App\Models\User::find(1);