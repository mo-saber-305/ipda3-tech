<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::query()->create([
            'site_icon' => 'images/settings/ipda3_icon.jpg',
            'header_logo' => 'images/settings/ipda3_logo_dark.png',
            'footer_logo' => 'images/settings/ipda3_logo.png',
            'footer_image' => 'images/settings/footer_image.jpg',
            'intro_image' => 'images/settings/intro_image.jpeg',
            'intro_content' => 'إبداع تك .. شريكك التقني الأمثل لبدء مشروعك الآن',
            'slogan_image' => 'images/settings/who-are-we.png',
            'slogan_content' => 'إبداع تك هي شركة برمجيات مصرية بدأت عملها فى عام 2017 متخصصون فى تصميم و تطوير المواقع الالكترونية وبرامج المبيعات والبرامج الإدارية وبرمجة تطبيقات الهواتف ، راحة و إبهار عملائنا هو ما يهمنا ، نؤمن بقوة الشباب ، و ندعم أفكارهم و بناء ونجاح مشاريعهم بكل ما نستطيع ، هكذا بدأ الإبداع و سيستمر إن شاء الله ، فدع الفرصة لخبرائنا لمساعدتك في إنشاء موقعك الخاص بأحدث وأفضل التصميمات المبتكرة',
            'address' => 'المنصورة-حي الجامعة-تقسيم الزعفران',
            'facebook' => 'https://www.facebook.com',
            'whatsapp' => 'https://web.whatsapp.com',
            'linkedin' => 'https://www.linkedin.com',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://www.instagram.com',
        ]);
    }
}
