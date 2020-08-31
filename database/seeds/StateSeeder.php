<?php

use App\Models\State;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'name' => 'Acre',
                'initials' => 'AC',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Alagoas',
                'initials' => 'AL',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Amapá',
                'initials' => 'AP',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Amazonas',
                'initials' => 'AM',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Bahia',
                'initials' => 'BA',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Ceará',
                'initials' => 'CE',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Distrito Federal',
                'initials' => 'DF',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Espírito Santo',
                'initials' => 'ES',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Goiás',
                'initials' => 'GO',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Maranhão',
                'initials' => 'MA',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Mato Grosso',
                'initials' => 'MT',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Mato Grosso do Sul',
                'initials' => 'MS',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Minas Gerais',
                'initials' => 'MG',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Pará',
                'initials' => 'PR',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Paraíba',
                'initials' => 'PB',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Paraná',
                'initials' => 'PR',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Pernambuco',
                'initials' => 'PE',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Piauí',
                'initials' => 'PI',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Rio de Janeiro',
                'initials' => 'RJ',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Rio Grande do Norte',
                'initials' => 'RN',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Rio Grande do Sul',
                'initials' => 'RS',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Rondônia',
                'initials' => 'RO',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Roraima',
                'initials' => 'RR',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Santa Catarina',
                'initials' => 'SC',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'São Paulo',
                'initials' => 'SP',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Sergipe',
                'initials' => 'SE',
                'country' => 1,
                'createdBy' => 1,
            ],
            [
                'name' => 'Tocantins',
                'initials' => 'TO',
                'country' => 1,
                'createdBy' => 1,
            ]
        ];

        if (!QueryService::ifExistsData(new State())) {
           State::insert($states);
        }
    }
}
