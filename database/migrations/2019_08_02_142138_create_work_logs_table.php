<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->comment('内容');
            $table->enum('type',['primary','success','warning','danger'])->comment('日志类型，primary：普通；success:兴奋的；waring：注意(小问题)；danger:值得关注的（耗费半天以上的）');
            $table->string('image',150)->nullable()->comment('插图');
            $table->integer('like_count')->default(0)->comment('点赞数');
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
        Schema::dropIfExists('work_logs');
    }
}
