<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Project::query()->insert([
            [
                'user_id' => 1,
                'title' => 'تطبيق عدل',
                'content' => 'تطبيق عدل هو تطبيق وسيط بين المحامين والمستشارين القانونيين ومن يحتاج الى خدمات المحاماة او الاستشارات .. يتم التواصل من خلال التطبيق كتابيا او باستخدام الرسئل الصوتية',
                'image' => 'images/projects/image/1.jpeg',
                'cover_image' => 'images/projects/cover/1.png',
                'slug' => str_replace(' ', '_', 'تطبيق عدل'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق وان للدفع الإلكتروني',
                'content' => 'تعمل بمنظومة أمنة معتمده دولياً ومحلياً تواكب التطورات التكنولوجية للدفع والسداد الإلكترونى لعمليات دفع الفواتير وتحويل وشحن الهواتف المحمولة وأيضاً تسديد حجوزات تذاكر الطيران او النقل البرى بالإضافة إلى دفع التبرعات للمؤسسات الخيرية ... وغيرها من الخدمات',
                'image' => 'images/projects/image/2.jpeg',
                'cover_image' => 'images/projects/cover/2.png',
                'slug' => str_replace(' ', '_', 'تطبيق وان للدفع الإلكتروني'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق بنك الدم',
                'content' => 'تطبيق بنك الدم يهدف إلى تسهيل عملية التبرع بالدم والوصول إلى المتبرعين بسهولة كبيرة ، يحرص التطبيق على الحفاظ على خصوصية بيانات المتبرعين وحمايتهم من الازعاج .',
                'image' => 'images/projects/image/3.jpeg',
                'cover_image' => 'images/projects/cover/3.png',
                'slug' => str_replace(' ', '_', 'تطبيق بنك الدم'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق وموقع اكتشفني',
                'content' => 'تطبيق اكتشفني لاكتشاف المواهب لطللاب المدارس',
                'image' => 'images/projects/image/4.jpeg',
                'cover_image' => 'images/projects/cover/4.png',
                'slug' => str_replace(' ', '_', 'تطبيق وموقع اكتشفني'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق جولد سوشي',
                'content' => 'تطبيق جولد سوشي هو تطبيق خاص بسلسلة مطاعم Gold Sushi Club بالمملكة العربية السعودية',
                'image' => 'images/projects/image/5.jpeg',
                'cover_image' => 'images/projects/cover/5.png',
                'slug' => str_replace(' ', '_', 'تطبيق جولد سوشي'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق دكان',
                'content' => 'تطبيق دكان هو دليل شامل لكل محلات الملابس والاحذية في العديد من مدن مصر .. يسهل التطبيق على المستخدمين تصفح المنتجات المعروضة والتعرف على احدث العروض والخصومات للملابس',
                'image' => 'images/projects/image/6.jpeg',
                'cover_image' => 'images/projects/cover/6.png',
                'slug' => str_replace(' ', '_', 'تطبيق دكان'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق منصور للذبائح',
                'content' => 'تطبيق منصور للذبائح يعمل في بيع وذبح وتغليف وتوصيل أفضل الأغنام البلدي بسيارات مبردة علي مدار العام بجميع مناطق الرياض وتتميز منتجاتنا بالجودة العالية والأسعار المناسبة .',
                'image' => 'images/projects/image/7.jpeg',
                'cover_image' => 'images/projects/cover/7.png',
                'slug' => str_replace(' ', '_', 'تطبيق منصور للذبائح'),
            ], [
                'user_id' => 1,
                'title' => 'تطبيق تو ريدي',
                'content' => 'تطبيق توريدي هو تطبيق يساعد المستخدمين على طلب الطعام من جميع مطاعم المملكة العربية السعودية',
                'image' => 'images/projects/image/8.jpeg',
                'cover_image' => 'images/projects/cover/8.png',
                'slug' => str_replace(' ', '_', 'تطبيق تو ريدي'),
            ],
        ]);
    }
}
