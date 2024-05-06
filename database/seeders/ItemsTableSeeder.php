<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('items')->delete();

        \DB::table('items')->insert(array (
            0 =>
            array (
                'id' => 1,
                'category_id' => 8,
                'author_id' => 1,
                'code' => 'd75l0',
                'title' => '{"ru":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 MARMI IMPERIALI","hy":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 MARMI IMPERIALI","en":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 MARMI IMPERIALI"}',
                'alias' => 'keramogranit-marmi-imperiali-9296',
                'short_description' => NULL,
                'description' => '{"hy":"<p><strong>Наличие: 25 м2<\\/strong><br \\/>\\r\\nТип: Керамогранит<br \\/>\\r\\nРазмер: 60x60 см<br \\/>\\r\\nТолщина: 10 мм<br \\/>\\r\\nУпаковка: 1,44 м<sup>2<\\/sup><\\/p>","ru":"<p><strong>Наличие: 25 м2<\\/strong><br \\/>\\r\\nТип: Керамогранит<br \\/>\\r\\nРазмер: 60x60 см<br \\/>\\r\\nТолщина: 10 мм<br \\/>\\r\\nУпаковка: 1,44 м<sup>2<\\/sup><\\/p>","en":"<p><strong>Наличие: 25 м2<\\/strong><br \\/>\\r\\nТип: Керамогранит<br \\/>\\r\\nРазмер: 60x60 см<br \\/>\\r\\nТолщина: 10 мм<br \\/>\\r\\nУпаковка: 1,44 м<sup>2<\\/sup><\\/p>"}',
                'price' => 3500.0,
                'bulk_price' => 3000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-16 16:15:05',
            ),
            1 =>
            array (
                'id' => 2,
                'category_id' => 8,
                'author_id' => NULL,
                'code' => 'a8lj0',
                'title' => '{"ru":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 ESX. MAHOGANY\\u00a0","hy":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 ESX. MAHOGANY\\u00a0","en":"\\u041a\\u0415\\u0420\\u0410\\u041c\\u041e\\u0413\\u0420\\u0410\\u041d\\u0418\\u0422 ESX. MAHOGANY\\u00a0"}',
                'alias' => 'keramogranit-esx-mahogany-4837',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 4500.0,
                'bulk_price' => 4500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-16 15:58:09',
            ),
            2 =>
            array (
                'id' => 3,
                'category_id' => 7,
                'author_id' => 1,
                'code' => 'p58ha',
                'title' => '{"ru":"Quadro","hy":"Quadro","en":"Quadro"}',
                'alias' => 'quadro-2531',
            'short_description' => '{"hy":"Стиль: прованс\\r\\nРисунок: под дерево\\r\\nФорма: квадрат\\r\\nШирина (см): 60\\r\\nДлина (см): 60\\r\\nШтук в упаковке (шт.): 5","ru":"Стиль: прованс\\r\\nРисунок: под дерево\\r\\nФорма: квадрат\\r\\nШирина (см): 60\\r\\nДлина (см): 60\\r\\nШтук в упаковке (шт.): 5","en":"Стиль: прованс\\r\\nРисунок: под дерево\\r\\nФорма: квадрат\\r\\nШирина (см): 60\\r\\nДлина (см): 60\\r\\nШтук в упаковке (шт.): 5"}',
                'description' => '{"hy":"<div style=\\"clear:both;\\">Назначение:для пола<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Поверхность:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/matted-tiles.html\\">матовая<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Материал:керамогранит<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Цвет:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/brown-tiles.html\\">коричневый<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Область применения:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/kitchen-tiles.html\\">для кухни<\\/a>,&nbsp;<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/bathroom-tiles.html\\">для ванной<\\/a>, для гостиной, для коридора, для общественных мест<\\/div>","ru":"<div style=\\"clear:both;\\">Назначение:для пола<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Поверхность:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/matted-tiles.html\\">матовая<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Материал:керамогранит<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Цвет:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/brown-tiles.html\\">коричневый<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Область применения:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/kitchen-tiles.html\\">для кухни<\\/a>,&nbsp;<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/bathroom-tiles.html\\">для ванной<\\/a>, для гостиной, для коридора, для общественных мест<\\/div>","en":"<div style=\\"clear:both;\\">Назначение:для пола<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Поверхность:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/matted-tiles.html\\">матовая<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Материал:керамогранит<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Цвет:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/brown-tiles.html\\">коричневый<\\/a><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Область применения:<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/kitchen-tiles.html\\">для кухни<\\/a>,&nbsp;<a href=\\"https:\\/\\/mirplitki.ru\\/catalog\\/bathroom-tiles.html\\">для ванной<\\/a>, для гостиной, для коридора, для общественных мест<\\/div>"}',
                'price' => 5130.0,
                'bulk_price' => 4900.0,
                'discount' => 5.0,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-16 16:10:30',
            ),
            3 =>
            array (
                'id' => 4,
                'category_id' => 7,
                'author_id' => 1,
                'code' => 'j45la',
                'title' => '{"ru":"\\u041a\\u0435\\u0440\\u0430\\u043c\\u0438\\u0447\\u0435\\u0441\\u043a\\u0430\\u044f \\u043f\\u043b\\u0438\\u0442\\u043a\\u0430 \\u043d\\u0430\\u043f\\u043e\\u043b\\u044c\\u043d\\u0430\\u044f Azori Eclipse","hy":"\\u041a\\u0435\\u0440\\u0430\\u043c\\u0438\\u0447\\u0435\\u0441\\u043a\\u0430\\u044f \\u043f\\u043b\\u0438\\u0442\\u043a\\u0430 \\u043d\\u0430\\u043f\\u043e\\u043b\\u044c\\u043d\\u0430\\u044f Azori Eclipse","en":"\\u041a\\u0435\\u0440\\u0430\\u043c\\u0438\\u0447\\u0435\\u0441\\u043a\\u0430\\u044f \\u043f\\u043b\\u0438\\u0442\\u043a\\u0430 \\u043d\\u0430\\u043f\\u043e\\u043b\\u044c\\u043d\\u0430\\u044f Azori Eclipse"}',
                'alias' => 'keramiceskaya-plitka-napolnaya-azori-eclipse',
                'short_description' => '{"hy":"Поверхность укладки: пол\\r\\nДизайн: авторский\\r\\nПоверхность: гладкая\\r\\nКоличество в упаковке: 12 шт, площадь в упаковке: 1,33 м. кв.","ru":"Поверхность укладки: пол\\r\\nДизайн: авторский\\r\\nПоверхность: гладкая\\r\\nКоличество в упаковке: 12 шт, площадь в упаковке: 1,33 м. кв.","en":"Поверхность укладки: пол\\r\\nДизайн: авторский\\r\\nПоверхность: гладкая\\r\\nКоличество в упаковке: 12 шт, площадь в упаковке: 1,33 м. кв."}',
                'description' => '{"hy":"<div style=\\"clear:both;\\">Плитка Eclipse от фабрики Azori - невероятное сочетание полупрозрачных тонов, от бирюзового и кораллового до графитово-коричневого. Эта коллекция удивляет легким и лаконичным дизайном, а также нестандартными орнаментальными решениями декоративных элементов.<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\"><strong>Дизайн<\\/strong><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Орнаментированное напольное покрытие с приятным матовым финишем станет отличным фоном для воплощения в жизнь оригинальных дизайнерских решений. Такой пол прекрасно впишется в интерьер ванной комнаты, оформленной в арабском или этническом стиле.<\\/div>","ru":"<div style=\\"clear:both;\\">Плитка Eclipse от фабрики Azori - невероятное сочетание полупрозрачных тонов, от бирюзового и кораллового до графитово-коричневого. Эта коллекция удивляет легким и лаконичным дизайном, а также нестандартными орнаментальными решениями декоративных элементов.<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\"><strong>Дизайн<\\/strong><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Орнаментированное напольное покрытие с приятным матовым финишем станет отличным фоном для воплощения в жизнь оригинальных дизайнерских решений. Такой пол прекрасно впишется в интерьер ванной комнаты, оформленной в арабском или этническом стиле.<\\/div>","en":"<div style=\\"clear:both;\\">Плитка Eclipse от фабрики Azori - невероятное сочетание полупрозрачных тонов, от бирюзового и кораллового до графитово-коричневого. Эта коллекция удивляет легким и лаконичным дизайном, а также нестандартными орнаментальными решениями декоративных элементов.<\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\"><strong>Дизайн<\\/strong><\\/div>\\r\\n\\r\\n<div style=\\"clear:both;\\">Орнаментированное напольное покрытие с приятным матовым финишем станет отличным фоном для воплощения в жизнь оригинальных дизайнерских решений. Такой пол прекрасно впишется в интерьер ванной комнаты, оформленной в арабском или этническом стиле.<\\/div>"}',
                'price' => 5000.0,
                'bulk_price' => 5000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-16 18:01:43',
            ),
            4 =>
            array (
                'id' => 5,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'df10a',
                'title' => '{"ru":"\\u0418\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u044f\\u043a, \\u0440\\u043e\\u0437\\u043e\\u0432\\u044b\\u0439","hy":"\\u0418\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u044f\\u043a, \\u0440\\u043e\\u0437\\u043e\\u0432\\u044b\\u0439","en":"\\u0418\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u044f\\u043a, \\u0440\\u043e\\u0437\\u043e\\u0432\\u044b\\u0439"}',
                'alias' => 'izvestnyak-rozovyi-3303',
                'short_description' => '{"hy":"Толщина -2-4 см","ru":"Толщина -2-4 см","en":"Толщина -2-4 см"}',
                'description' => '{"hy":"<h3><strong>Известняк<\\/strong><\\/h3>\\r\\n\\r\\n<p>Камень&nbsp;<a href=\\"https:\\/\\/kamelot178.ru\\/naturalnyy-kamen-izvestnyak\\/\\">известняк<\\/a>&nbsp;может быть пористым, плотным или мраморовидным. Он отличается хорошей теплопроводностью, а также:<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><strong>Легкой обрабатываемостью<\\/strong>. Куски не сложно резать, колоть или распиливать в любом из направлений.<\\/li>\\r\\n\\t<li><strong>Высокой пластичностью<\\/strong>. Из минерала создают многогранные формы.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>Материал обладает отменными звуко- и теплоизоляционными свойствами.<\\/p>","ru":"<h3><strong>Известняк<\\/strong><\\/h3>\\r\\n\\r\\n<p>Камень&nbsp;<a href=\\"https:\\/\\/kamelot178.ru\\/naturalnyy-kamen-izvestnyak\\/\\">известняк<\\/a>&nbsp;может быть пористым, плотным или мраморовидным. Он отличается хорошей теплопроводностью, а также:<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><strong>Легкой обрабатываемостью<\\/strong>. Куски не сложно резать, колоть или распиливать в любом из направлений.<\\/li>\\r\\n\\t<li><strong>Высокой пластичностью<\\/strong>. Из минерала создают многогранные формы.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>Материал обладает отменными звуко- и теплоизоляционными свойствами.<\\/p>","en":"<p><strong>Известняк<\\/strong><\\/p>\\r\\n\\r\\n<p>Камень&nbsp;<a href=\\"https:\\/\\/kamelot178.ru\\/naturalnyy-kamen-izvestnyak\\/\\">известняк<\\/a>&nbsp;может быть пористым, плотным или мраморовидным. Он отличается хорошей теплопроводностью, а также:<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><strong>Легкой обрабатываемостью<\\/strong>. Куски не сложно резать, колоть или распиливать в любом из направлений.<\\/li>\\r\\n\\t<li><strong>Высокой пластичностью<\\/strong>. Из минерала создают многогранные формы.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>Материал обладает отменными звуко- и теплоизоляционными свойствами.<\\/p>"}',
                'price' => 6000.0,
                'bulk_price' => 6000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:17:55',
            ),
            5 =>
            array (
                'id' => 6,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'ol4ax',
                'title' => '{"ru":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0441\\u0435\\u0440\\u043e-\\u0437\\u0435\\u043b\\u0435\\u043d\\u044b\\u0439","hy":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0441\\u0435\\u0440\\u043e-\\u0437\\u0435\\u043b\\u0435\\u043d\\u044b\\u0439","en":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0441\\u0435\\u0440\\u043e-\\u0437\\u0435\\u043b\\u0435\\u043d\\u044b\\u0439"}',
                'alias' => 'pescanik-sero-zelenyi-5201',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 4500.0,
                'bulk_price' => 3500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:17:48',
            ),
            6 =>
            array (
                'id' => 7,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'g1n0s',
                'title' => '{"ru":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u043e-\\u043a\\u043e\\u0440\\u0438\\u0447\\u043d\\u0435\\u0432\\u044b\\u0439","hy":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u043e-\\u043a\\u043e\\u0440\\u0438\\u0447\\u043d\\u0435\\u0432\\u044b\\u0439","en":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u043e-\\u043a\\u043e\\u0440\\u0438\\u0447\\u043d\\u0435\\u0432\\u044b\\u0439"}',
                'alias' => 'pescanik-zelto-koricnevyi-6330',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 5000.0,
                'bulk_price' => 5000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:17:40',
            ),
            7 =>
            array (
                'id' => 8,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 's85jnk',
                'title' => '{"ru":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u044b\\u0439 \\u0441 \\u0440\\u0430\\u0437\\u0432\\u043e\\u0434\\u0430\\u043c\\u0438 60 %","hy":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u044b\\u0439 \\u0441 \\u0440\\u0430\\u0437\\u0432\\u043e\\u0434\\u0430\\u043c\\u0438 60 %","en":"\\u041f\\u0435\\u0441\\u0447\\u0430\\u043d\\u0438\\u043a \\u0436\\u0435\\u043b\\u0442\\u044b\\u0439 \\u0441 \\u0440\\u0430\\u0437\\u0432\\u043e\\u0434\\u0430\\u043c\\u0438 60 %"}',
                'alias' => 'pescanik-zeltyi-s-razvodami-60-8778',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 3500.0,
                'bulk_price' => 3500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:17:32',
            ),
            8 =>
            array (
                'id' => 9,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'ag42a',
                'title' => '{"ru":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439","hy":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439","en":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439"}',
                'alias' => 'pecanik-krasnyi-obozzyonnyi-7599',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 2000.0,
                'bulk_price' => 2000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:59',
            ),
            9 =>
            array (
                'id' => 10,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'a41kia',
                'title' => '{"ru":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439 1","hy":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439 1","en":"\\u041f\\u0435\\u0447\\u0430\\u043d\\u0438\\u043a \\u043a\\u0440\\u0430\\u0441\\u043d\\u044b\\u0439 \\u043e\\u0431\\u043e\\u0436\\u0436\\u0451\\u043d\\u043d\\u044b\\u0439 1"}',
                'alias' => 'pecanik-krasnyi-obozzyonnyi-1-1591',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 2500.0,
                'bulk_price' => 2500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:49',
            ),
            10 =>
            array (
                'id' => 11,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'a30ka',
                'title' => '{"ru":"\\u0428\\u0443\\u043d\\u0433\\u0438\\u0442 \\u0441\\u0438\\u043d\\u0435-\\u0447\\u0435\\u0440\\u043d\\u044b\\u0439","hy":"\\u0428\\u0443\\u043d\\u0433\\u0438\\u0442 \\u0441\\u0438\\u043d\\u0435-\\u0447\\u0435\\u0440\\u043d\\u044b\\u0439","en":"\\u0428\\u0443\\u043d\\u0433\\u0438\\u0442 \\u0441\\u0438\\u043d\\u0435-\\u0447\\u0435\\u0440\\u043d\\u044b\\u0439"}',
                'alias' => 'sungit-sine-cernyi-5892',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 1500.0,
                'bulk_price' => 1500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:38',
            ),
            11 =>
            array (
                'id' => 12,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'sd52a',
                'title' => '{"ru":"\\u041f\\u043e\\u043b\\u043e\\u0441\\u0430 \\u043f\\u0438\\u043b\\u0435\\u043d\\u0430\\u044f 30 \\u043c\\u043c","hy":"\\u041f\\u043e\\u043b\\u043e\\u0441\\u0430 \\u043f\\u0438\\u043b\\u0435\\u043d\\u0430\\u044f 30 \\u043c\\u043c","en":"\\u041f\\u043e\\u043b\\u043e\\u0441\\u0430 \\u043f\\u0438\\u043b\\u0435\\u043d\\u0430\\u044f 30 \\u043c\\u043c"}',
                'alias' => 'polosa-pilenaya-30-mm-6387',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 1000.0,
                'bulk_price' => 1000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:28',
            ),
            12 =>
            array (
                'id' => 13,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'q512as',
                'title' => '{"ru":"\\u0410\\u043b\\u0435\\u0432\\u0440\\u043e\\u043b\\u0438\\u0442 \\u0444\\u0438\\u043e\\u043b\\u0435\\u0442\\u043e\\u0432\\u043e-\\u043e\\u0440\\u0430\\u043d\\u0436\\u0435\\u0432\\u044b\\u0439","hy":"\\u0410\\u043b\\u0435\\u0432\\u0440\\u043e\\u043b\\u0438\\u0442 \\u0444\\u0438\\u043e\\u043b\\u0435\\u0442\\u043e\\u0432\\u043e-\\u043e\\u0440\\u0430\\u043d\\u0436\\u0435\\u0432\\u044b\\u0439","en":"\\u0410\\u043b\\u0435\\u0432\\u0440\\u043e\\u043b\\u0438\\u0442 \\u0444\\u0438\\u043e\\u043b\\u0435\\u0442\\u043e\\u0432\\u043e-\\u043e\\u0440\\u0430\\u043d\\u0436\\u0435\\u0432\\u044b\\u0439"}',
                'alias' => 'alevrolit-fioletovo-oranzevyi-2524',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 3500.0,
                'bulk_price' => 3500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:19',
            ),
            13 =>
            array (
                'id' => 14,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'g57jla',
                'title' => '{"ru":"\\u0411\\u0435\\u043b\\u044b\\u0439 \\u043a\\u0432\\u0430\\u0440\\u0446\\u0438\\u0442","hy":"\\u0411\\u0435\\u043b\\u044b\\u0439 \\u043a\\u0432\\u0430\\u0440\\u0446\\u0438\\u0442","en":"\\u0411\\u0435\\u043b\\u044b\\u0439 \\u043a\\u0432\\u0430\\u0440\\u0446\\u0438\\u0442"}',
                'alias' => 'belyi-kvarcit-7820',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 4500.0,
                'bulk_price' => 4500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:16:02',
            ),
            14 =>
            array (
                'id' => 15,
                'category_id' => 20,
                'author_id' => 1,
                'code' => 'p7lo5',
                'title' => '{"ru":"\\u0416\\u0430\\u0434\\u0435\\u0438\\u0442","hy":"\\u0416\\u0430\\u0434\\u0435\\u0438\\u0442","en":"\\u0416\\u0430\\u0434\\u0435\\u0438\\u0442"}',
                'alias' => 'zadeit-7922',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 10000.0,
                'bulk_price' => 10000.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-17 12:15:53',
            ),
            15 =>
            array (
                'id' => 16,
                'category_id' => 11,
                'author_id' => NULL,
                'code' => 'a57klo',
                'title' => '{"ru":"\\u0413\\u0440\\u0430\\u043d\\u0438\\u0442","hy":"\\u0413\\u0440\\u0430\\u043d\\u0438\\u0442","en":"\\u0413\\u0440\\u0430\\u043d\\u0438\\u0442"}',
                'alias' => 'granit-6525',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 5320.0,
                'bulk_price' => 5600.0,
                'discount' => 5.0,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-16 15:58:09',
            ),
            16 =>
            array (
                'id' => 17,
                'category_id' => 6,
                'author_id' => 1,
                'code' => 'j7as4',
                'title' => '{"ru":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Azul","hy":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Azul","en":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Azul"}',
                'alias' => 'plitka-azul-4851',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 6400.0,
                'bulk_price' => 6400.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-18 16:44:00',
            ),
            17 =>
            array (
                'id' => 18,
                'category_id' => 6,
                'author_id' => 1,
                'code' => 'l4pos',
                'title' => '{"ru":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Multicolor","hy":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Multicolor","en":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Multicolor"}',
                'alias' => 'plitka-agata-multicolor-1230',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 6500.0,
                'bulk_price' => 6500.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-18 16:46:35',
            ),
            18 =>
            array (
                'id' => 19,
                'category_id' => 6,
                'author_id' => 1,
                'code' => 'to47jk',
                'title' => '{"ru":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Nero","hy":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Nero","en":"\\u041f\\u043b\\u0438\\u0442\\u043a\\u0430 Agata Nero"}',
                'alias' => 'plitka-agata-nero-6927',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 5800.0,
                'bulk_price' => 5800.0,
                'discount' => NULL,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-18 16:45:00',
            ),
            19 =>
            array (
                'id' => 20,
                'category_id' => 6,
                'author_id' => 1,
                'code' => 'fh78ko',
                'title' => '{"ru":"G-42 MR","hy":"G-42 MR","en":"G-42 MR"}',
                'alias' => 'g-42-mr-2223',
                'short_description' => NULL,
                'description' => NULL,
                'price' => 7200.0,
                'bulk_price' => 8000.0,
                'discount' => 10.0,
                'count' => 100,
                'seo_title' => NULL,
                'seo_description' => NULL,
                'seo_keywords' => NULL,
                'ordering' => 0,
                'active' => 1,
                'created_at' => '2020-11-16 15:58:09',
                'updated_at' => '2020-11-18 16:46:02',
            ),
        ));


    }
}
