<?php

use Illuminate\Database\Seeder;
use App\Apply;

class ApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apply')->delete();
        Apply::create(array(
            'inq_id'     => '1',
            'hd_doc'    => '1inquiry/1hd_doc.pdf',
            'ielts_doc'    => '1inquiry/1ielts_doc.pdf',
            'cl_doc' => '1inquiry/1cl_doc.pdf',
            'rl_doc' => '1inquiry/1rl_doc.pdf',
            'cv_doc' => '1inquiry/1cv_doc.pdf'
        ));
    }
}
