<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            // Criação da coluna de chave estrangeira
            $table->unsignedBigInteger('id_user');  // Definindo manualmente a chave estrangeira
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->enum('tipo', ['evento', 'viagem']);
            $table->dateTime('data_hora');
            $table->string('local_origem')->nullable(); // Para viagens
            $table->string('local_destino'); // Local do evento ou destino da viagem
            $table->integer('quantidade_disponivel');
            $table->decimal('preco', 10, 2);
            $table->string('imagem')->nullable();
            $table->timestamps();

            // Definindo a chave estrangeira manualmente
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
