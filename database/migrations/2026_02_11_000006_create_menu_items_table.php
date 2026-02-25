<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url', 500);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('open_new_tab')->default(false);
            $table->timestamps();
        });

        $now = now();
        DB::table('menu_items')->insert([
            ['title' => 'Главная', 'url' => '/', 'sort_order' => 0, 'is_active' => true, 'open_new_tab' => false, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Новости', 'url' => '/news', 'sort_order' => 1, 'is_active' => true, 'open_new_tab' => false, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Статьи', 'url' => '/articles', 'sort_order' => 2, 'is_active' => true, 'open_new_tab' => false, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Каталог', 'url' => '/catalog', 'sort_order' => 3, 'is_active' => true, 'open_new_tab' => false, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Контакты', 'url' => '/contact', 'sort_order' => 4, 'is_active' => true, 'open_new_tab' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
