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
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Admin\Ad::class, 'ad_id');
            $table->foreignIdFor(\App\Models\User::class, 'owner_id');
            $table->foreignIdFor(\App\Models\User::class, 'buyer_id');
            $table->string('channel')->nullable(false);
            $table->timestamp('blocked_at')->nullable();
            $table->timestamps();

            $table->unique(['owner_id', 'buyer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
