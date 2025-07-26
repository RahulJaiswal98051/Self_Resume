<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddRoleProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
<<<<<<< HEAD
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'role')) {
            $table->enum('role', ['admin', ''])->nullable();
        }

        if (!Schema::hasColumn('users', 'profile')) {
            $table->string('profile')->nullable();
        }
=======
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
        $table->enum('role', ['admin', 'user'])->default('user'); // Add role column i want set defult value user
        $table->string('profile')->nullable();           // Add profile column
>>>>>>> 7a248947792dda9e6d35cdac4f4ddfd26ca60950
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'role')) {
            $table->dropColumn('role');
        }

        if (Schema::hasColumn('users', 'profile')) {
            $table->dropColumn('profile');
        }
    });
}
}