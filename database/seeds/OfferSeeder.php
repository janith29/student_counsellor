<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer')->delete();
        Offer::create(array(
            'inq_id'     => '1',
            'app_id'    => '1',
            'offer_doc'    => '1inquiry/1offer_doc.pdf'
        ));
    }
}
