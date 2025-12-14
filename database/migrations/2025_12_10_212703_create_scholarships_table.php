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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
             $table->string('title'); // "Academic Excellence Scholarship"
    $table->text('description'); // Short description
    $table->string('category'); // "Academic", "Sports", "Financial", "STEM"
    
    // 2. Award Details (from sample)
    $table->decimal('award_amount', 12, 2); // 50000.00
    $table->string('award_description'); // "¥50,000/year", "Full Tuition"
    
    // 3. Application Info (from sample)
    $table->date('deadline'); // Application deadline
    
    // 4. Status & Counts (from sample)
    $table->enum('status', ['active', 'ending_soon', 'closed'])
          ->default('active');
    $table->integer('applicants_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
