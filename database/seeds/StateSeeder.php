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
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Alagoas',
                'initials' => 'AL',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Amapá',
                'initials' => 'AP',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Amazonas',
                'initials' => 'AM',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Bahia',
                'initials' => 'BA',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Ceará',
                'initials' => 'CE',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Distrito Federal',
                'initials' => 'DF',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Espírito Santo',
                'initials' => 'ES',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Goiás',
                'initials' => 'GO',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Maranhão',
                'initials' => 'MA',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Mato Grosso',
                'initials' => 'MT',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Mato Grosso do Sul',
                'initials' => 'MS',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Minas Gerais',
                'initials' => 'MG',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Pará',
                'initials' => 'PR',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Paraíba',
                'initials' => 'PB',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Paraná',
                'initials' => 'PR',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Pernambuco',
                'initials' => 'PE',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Piauí',
                'initials' => 'PI',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Rio de Janeiro',
                'initials' => 'RJ',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Rio Grande do Norte',
                'initials' => 'RN',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Rio Grande do Sul',
                'initials' => 'RS',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Rondônia',
                'initials' => 'RO',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Roraima',
                'initials' => 'RR',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Santa Catarina',
                'initials' => 'SC',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'São Paulo',
                'initials' => 'SP',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Sergipe',
                'initials' => 'SE',
                'country_id' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Tocantins',
                'initials' => 'TO',
                'country_id' => 1,
                'created_by' => 1,
            ]
        ];

        if (!QueryService::ifExistsData(new State())) {
           State::insert($states);
        }
    }
}
