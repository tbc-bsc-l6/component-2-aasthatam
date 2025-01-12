<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table("users")
            ->insert([
                "name" => "Aastha Tamrakar",
                "email" => "tamrakaraastha7@gmail.com",
                "password" => bcrypt("password"),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table("users")->where("email", "=", "tamrakaraastha7@gmail.com")->delete();
    }
};

