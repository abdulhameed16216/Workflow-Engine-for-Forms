  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('cus_fname');
          $table->string('cus_lname');
          $table->string('cus_email');
          $table->date('cus_dob');
          $table->integer('cus_status')->default(0);
          $table->timestamps();
          $table->unique('cus_email', 'cus_email_uniq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
