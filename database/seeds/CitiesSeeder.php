<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    { 
        $i = 1;
        $cities = [
            [
                'id' => $i++,
                'name' => 'ابها',
            ],
            [
                'id' => $i++,
                'name' => 'ابو عريش',
            ],
            [
                'id' => $i++,
                'name' => 'مكة المكرمة',
            ],
            [
                'id' => $i++,
                'name' => 'الدمام',
            ],
            [
                'id' => $i++,
                'name' => 'الدوادمي',
            ],
            [
                'id' => $i++,
                'name' => 'الدلم',
            ],
            [
                'id' => $i++,
                'name' => 'الدرعية',
            ],
            [
                'id' => $i++,
                'name' => 'عفيف',
            ],
            [
                'id' => $i++,
                'name' => 'احد المسارحة',
            ],
            [
                'id' => $i++,
                'name' => 'احد رفيده',
            ],
            [
                'id' => $i++,
                'name' => 'البكيرية'
            ],
            [
                'id' => $i++,
                'name' => 'الغاط'
            ],
            [
                'id' => $i++,
                'name' => 'الخبراء'
            ],
            [
                'id' => $i++,
                'name' => 'الخفجي'
            ],
            [
                'id' => $i++,
                'name' => 'حائل'
            ],
            [
                'id' => $i++,
                'name' => 'الحريق'
            ],
            [
                'id' => $i++,
                'name' => 'الخرج'
            ],
            [
                'id' => $i++,
                'name' => 'الخبر'
            ],
            [
                'id' => $i++,
                'name' => 'الهفوف'
            ],
            [
                'id' => $i++,
                'name' => 'الخرمة'
            ],
            [
                'id' => $i++,
                'name' => 'الجبيل'
            ],
            [
                'id' => $i++,
                'name' => 'الجموم'
            ],
            [
                'id' => $i++,
                'name' => 'ليلى'
            ],
            [
                'id' => $i++,
                'name' => 'مدينة الملك عبد الله الاقتصادية'
            ],
            [
                'id' => $i++,
                'name' => 'المجاردة'
            ],
            [
                'id' => $i++,
                'name' => 'المجمعة'
            ],
            [
                'id' => $i++,
                'name' => 'المذنب'
            ],
            [
                'id' => $i++,
                'name' => 'المزاحمية'
            ],
            [
                'id' => $i++,
                'name' => 'القطيف'
            ],
            [
                'id' => $i++,
                'name' => 'القنفذة'
            ],
            [
                'id' => $i++,
                'name' => 'القريات'
            ],
            [
                'id' => $i++,
                'name' => 'القويعية'
            ],
            [
                'id' => $i++,
                'name' => 'الوجه'
            ],
            [
                'id' => $i++,
                'name' => 'عنك'
            ],
            [
                'id' => $i++,
                'name' => 'النعيرية'
            ],
            [
                'id' => $i++,
                'name' => 'عرعر'
            ],
            [
                'id' => $i++,
                'name' => 'الرس'
            ],
            [
                'id' => $i++,
                'name' => 'السليل'
            ],
            [
                'id' => $i++,
                'name' => 'الطائف'
            ],
            [
                'id' => $i++,
                'name' => 'الظهران'
            ],
            [
                'id' => $i++,
                'name' => 'الزلفي'
            ],
            [
                'id' => $i++,
                'name' => 'بدر'
            ],
            [
                'id' => $i++,
                'name' => 'بيشة'
            ],
            [
                'id' => $i++,
                'name' => 'بقيق'
            ],
            [
                'id' => $i++,
                'name' => 'بريدة'
            ],
            [
                'id' => $i++,
                'name' => 'ضبا'
            ],
            [
                'id' => $i++,
                'name' => 'حفر البطن'
            ],
            [
                'id' => $i++,
                'name' => 'خميس مشيط'
            ],
            [
                'id' => $i++,
                'name' => 'حوطه بنى تميم'
            ],
            [
                'id' => $i++,
                'name' => 'خيبر'
            ],
            [
                'id' => $i++,
                'name' => 'جدة'
            ],
            [
                'id' => $i++,
                'name' => 'محايل'
            ],
            [
                'id' => $i++,
                'name' => 'رابغ'
            ],
            [
                'id' => $i++,
                'name' => 'رفحاء'
            ],
            [
                'id' => $i++,
                'name' => 'صفوى'
            ],
            [
                'id' => $i++,
                'name' => 'سكاكا'
            ],
            [
                'id' => $i++,
                'name' => 'صامطة'
            ],
            [
                'id' => $i++,
                'name' => 'شقراء'
            ],
            [
                'id' => $i++,
                'name' => 'شروره'
            ],
            [
                'id' => $i++,
                'name' => 'سيهات'
            ],
            [
                'id' => $i++,
                'name' => 'الشنان'
            ],
            [
                'id' => $i++,
                'name' => 'ثادق'
            ],
            [
                'id' => $i++,
                'name' => 'قريه العليا'
            ],
            [
                'id' => $i++,
                'name' => 'صبيا'
            ],
            [
                'id' => $i++,
                'name' => 'صفوى',
            ],
            [
                'id' => $i++,
                'name' => 'سكاكا',
            ],
            [
                'id' => $i++,
                'name' => 'صامطة',
            ],
            [
                'id' => $i++,
                'name' => 'شقراء',
            ],
            [
                'id' => $i++,
                'name' => 'شروره',
            ],
            [
                'id' => $i++,
                'name' => 'سيهات',
            ],
            [
                'id' => $i++,
                'name' => 'الشنان',
            ],
            [
                'id' => $i++,
                'name' => 'ثادق',
            ],
            [
                'id' => $i++,
                'name' => 'بللسمر',
            ],
            [
                'id' => $i++,
                'name' => 'راس تنورة',
            ],
            [
                'id' => $i++,
                'name' => 'تاروت'
            ],
            [
                'id' => $i++,
                'name' => 'تثليث'
            ],
            [
                'id' => $i++,
                'name' => 'تربه'
            ],
            [
                'id' => $i++,
                'name' => 'طريف'
            ],
            [
                'id' => $i++,
                'name' => 'ثول'
            ],
            [
                'id' => $i++,
                'name' => 'عنيزة'
            ],
            [
                'id' => $i++,
                'name' => 'الشماسية'
            ],
            [
                'id' => $i++,
                'name' => 'ينبع'
            ],
            [
                'id' => $i++,
                'name' => 'الباحة'
            ],
            [
                'id' => $i++,
                'name' => 'المدينة المنورة'
            ],
            [
                'id' => $i++,
                'name' => 'جازان'
            ],
            [
                'id' => $i++,
                'name' => 'نجران'
            ],
            [
                'id' => $i++,
                'name' => 'الرياض'
            ],
            [
                'id' => $i++,
                'name' => 'تبوك'
            ],
            [
                'id' => $i++,
                'name' => 'الجندل'
            ],
            [
                'id' => $i++,
                'name' => 'أملج'
            ],
            [
                'id' => $i++,
                'name' => 'البدائع'
            ],
        ];
        City::insert($cities);
    }
}
