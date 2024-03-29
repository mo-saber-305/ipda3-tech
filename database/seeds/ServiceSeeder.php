<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Service::query()->insert([
            [
                'user_id' => 1,
                'title' => 'استضافة المواقع',
                'content' => 'ع خدمة استضافة المواقع من ابداع تك يمكنك استضافة موقعك الالكتروني على أفضل السيرفرات العالمية بأسعار مناسبة جدا وفي المتناول .تتضمن عروضنا أيضا شراء النطاقات Domains الخاصة بموقعك ، كما يمكنك من خلالها الحصول على ايميلات رسمية للعمل Business Emails مثل info@my-website.com للتواصل الرسمي مع الأشخاص والشركات والبنوك وهكذا .',
                'image' => 'images/services/1.png',
                'slug' => str_replace(' ', '-', 'استضافة المواقع')
            ], [
                'user_id' => 1,
                'title' => 'البرامج المحاسبية و الإدارية',
                'content' => 'تصميم وبرمجة تطبيقات الإدارية و المحاسبية لتكون مناسبة لاحتياجات مجالك المستثمر فيه و تنظيم التعاملات المحاسبية و المنظومة الادارية التى تعد عصب اى استثمار مربح.',
                'image' => 'images/services/2.png',
                'slug' => str_replace(' ', '-', 'البرامج المحاسبية و الإدارية')
            ], [
                'user_id' => 1,
                'title' => 'برمجة تطبيقات الجوال',
                'content' => 'نحرص على اختيار التصميمات الجذابة والمميزة والتي تتوافق مع تجربة المستخدم . واجبنا ان تكون المواقع الالكترونية متوافقة مع مختلف أحجام الشاشات وأنواعها .',
                'image' => 'images/services/3.png',
                'slug' => str_replace(' ', '-', 'برمجة تطبيقات الجوال')
            ], [
                'user_id' => 1,
                'title' => 'برمجة وتصميم المواقع',
                'content' => 'تصميم وبرمجة مواقع الكترونية ذات شكل فريد وتصميمات احترافية تساعدك على الظهور امام عملائك بشكل يليق بمؤسستك ويساعد عملائك على التواصل مع مؤسستك .',
                'image' => 'images/services/4.png',
                'slug' => str_replace(' ', '-', 'برمجة وتصميم المواقع')
            ], [
                'user_id' => 1,
                'title' => 'تدريب ابداع',
                'content' => 'تقدم إبداع تك خدمة التدريب للمبرمجين حديثي التخرج والطلاب لتأهيل المتدربين لسوق العمل عن طريق تنفيذ مشاريع حقيقية في مجال تطوير المواقع الالكترونية وتطبيقات الموبايل',
                'image' => 'images/services/5.png',
                'slug' => str_replace(' ', '-', 'تدريب ابداع')
            ], [
                'user_id' => 1,
                'title' => 'التسويق الالكتروني',
                'content' => 'تقدم إبداع تك خدمة التسويق الإلكتروني من خلال منصات التواصل الإجتماعي والتي تستخدم من قبل الملايين لضمان الوصول لأكبر عدد ممكن من العملاء المستهدفين في أقل وقت وبأقل تكلفة ممكنة',
                'image' => 'images/services/6.png',
                'slug' => str_replace(' ', '-', 'التسويق الالكتروني')
            ],
        ]);
    }
}
