<?php

use Illuminate\Database\Seeder;
use App\Inquiry;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquiry')->delete();
        Inquiry::create(array(
            'std_name'     => 'Sajith Lakruwan',
            'email'    => 'sajithlakruwan@gmail.com',
            'address'    => '95/25C Batalanda, Makola',
            'age' => '20',
            'phone_num' => '0710113861',
            'course' => 'BIO Medical',
            'university' => 'SLIIT',
            'start_date' => '2021-01-01',
            'submit_document' => '1',
            'submit_offer' => '1',
        ));
    }
}
