<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        // AS CLASSES USADAS SÃO PADRÃO DO FAKER:
        'nome' => $faker->name, // name = classe padrão do faker
        'telefone' => $faker->tollFreePhoneNumber, // tollFreePhoneNumber = classe padrão do faker
        'email' => $faker->unique()->email, // unique - só aceita 1 valor - email = classe padrão do faker
        'motivo_contato' => $faker->numberBetween(1,3), //numberBetween = classe padrão do faker entre 1 e 3
        'mensagem' => $faker->text(200) //text = classe padrão do faker  - max caracteres 200
    ];
});
