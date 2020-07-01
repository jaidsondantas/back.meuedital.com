<?php

use App\Models\PublicTenderNotice;
use App\Services\QueryService;
use Illuminate\Database\Seeder;

class PublicTenderNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = [
            [
                'name' => 'Concurso PCDF - Polícia Civil do DF',
                'description' => 'Pense um pouco e responda: quantas janelas de oportunidades de fato significativas abrem-se durante uma vida?',
                'year' => '2019',
                'organ_id' => 1,
                'examination_board_id' => 1,
                'status_public_tender_notice_id' => 1,
                'created_by' => 1
            ]
        ];

        if (!QueryService::ifExistsData(new PublicTenderNotice())) {
            PublicTenderNotice::insert($entity);
        }
    }
}
