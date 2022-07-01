<?php

use App\Models\Course;
use App\Models\User;
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
    public function up()
    {
        Schema::create('add_to_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(Course::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('payment_id')->nullable();
            $table->string('browser_name')->nullable();
            $table->integer('qty')->nullable()->default(1);
            $table->integer('price')->nullable()->default(0);
            $table->string('status')->nullable()->default(0); // Pending
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
        Schema::dropIfExists('add_to_carts');
    }
};
