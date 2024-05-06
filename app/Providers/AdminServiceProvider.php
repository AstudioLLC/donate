<?php


namespace App\Providers;


use App\Models\Block;
use App\Models\Chat;
use App\Models\Children;
use App\Models\CoreValue;
use App\Models\CorporateDonor;
use App\Models\Country;
use App\Models\Faq;
use App\Models\File;
use App\Models\Fundraiser;
use App\Models\Gallery;
use App\Models\Gift;
use App\Models\HomeBlock;
use App\Models\Language;
use App\Models\Need;
use App\Models\News;
use App\Models\OurPublication;
use App\Models\Page;
use App\Models\Region;
use App\Models\Report;
use App\Models\Slider;
use App\Models\Social;
use App\Models\SuccessStory;
use App\Models\User;
use App\Models\Video;
use App\Models\Volunteering;
use App\Models\WelcomeModal;
use App\Observers\Admin\BlockObserver;
use App\Observers\Admin\ChatObserver;
use App\Observers\Admin\ChildrenObserver;
use App\Observers\Admin\CoreValueObserver;
use App\Observers\Admin\CorporateDonorObserver;
use App\Observers\Admin\CountryObserver;
use App\Observers\Admin\FaqObserver;
use App\Observers\Admin\FileObserver;
use App\Observers\Admin\FundraiserObserver;
use App\Observers\Admin\GalleryObserver;
use App\Observers\Admin\GiftObserver;
use App\Observers\Admin\HomeBlockObserver;
use App\Observers\Admin\LanguageObserver;
use App\Observers\Admin\NeedObserver;
use App\Observers\Admin\NewsObserver;
use App\Observers\Admin\OurPublicationObserver;
use App\Observers\Admin\PageObserver;
use App\Observers\Admin\RegionObserver;
use App\Observers\Admin\ReportObserver;
use App\Observers\Admin\SliderObserver;
use App\Observers\Admin\SocialObserver;
use App\Observers\Admin\SponsorObserver;
use App\Observers\Admin\SuccessStoryObserver;
use App\Observers\Admin\VideoObserver;
use App\Observers\Admin\VolunteeringObserver;
use App\Observers\Admin\WelcomeModalObserver;
use App\Services\PageManager\Facades\PageManager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class


AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::aliasComponent('admin.components._modal', 'modal');
        Blade::aliasComponent('admin.components._seo', 'seo');
        Blade::aliasComponent('admin.components._submit', 'submit');
        Blade::aliasComponent('admin.components._formTitle', 'formTitle');
        Blade::aliasComponent('admin.components._itemsAllList', 'itemsAllList');
        Blade::aliasComponent('admin.components._checkbox', 'checkbox');
        Blade::aliasComponent('admin.components._file', 'file');
        Blade::aliasComponent('admin.components._imageDestroy', 'imageDestroy');

        Blade::include('admin.includes.ckeditor', 'ckeditor');

        Blade::directive('bylang', function ($expression) {
            return "<?php \$__env->startComponent('admin.components._bylang'".($expression?", $expression":'')."); foreach(\$isos as \$iso): \$__env->slot('bylang_'.\$iso) ?>";
        });
        Blade::directive('endbylang', function () {
            return "<?php \$__env->endSlot();endforeach;echo \$__env->renderComponent() ?>";
        });

        //Blade::aliasComponent('admin.components.modal', 'modal2');
        Blade::aliasComponent('admin.components.input', 'input');
        Blade::aliasComponent('admin.components.zselect', 'zselect');
        Blade::aliasComponent('admin.components.labelauty', 'labelauty');

        Blade::aliasComponent('admin.components.alink', 'alink');
        Blade::aliasComponent('admin.components.banner_block', 'bannerBlock');
        Blade::aliasComponent('admin.components.card', 'card');


        Blade::directive('css', function ($expression) {
            return "<?php echo newCss($expression) ?>";
        });
        Blade::directive('js', function ($expression) {
            return "<?php echo newJs($expression) ?>";
        });
        Blade::directive('safe', function ($expression) {
            return "<?php echo safe($expression) ?>";
        });
        Blade::directive('banners', function ($expression) {
            return "<?php \$this_count=\$params[$expression]['count']??1; \$key=$expression; for(\$i=0; \$i<\$this_count; \$i++): ?>";
        });
        Blade::directive('endbanners', function () {
            return "<?php endfor; unset(\$i, \$key, \$this_count); ?>";
        });
        Blade::directive('cards', function ($expression) {
            return "<?php \$thisExpression=$expression; \$key=\$thisExpression['banners']; \$thisExpression['count']=\$params[\$key]['count']??1; \$__env->startComponent('admin.components.cards', \$thisExpression); for(\$i=0; \$i<\$thisExpression['count']; \$i++): \$__env->slot('tab_'.\$i)?>";
        });
        Blade::directive('endcards', function($expression){
            return "<?php \$__env->endSlot(); endfor; unset(\$i, \$key, \$thisExpression); echo \$__env->renderComponent()?>";
        });
        Blade::directive('banner', function ($expression) {
            return "<?php echo banner(\$params, \$banners, \$key??null, \$i??0, $expression) ?>";
        });

        Validator::extend('is_url', function ($attribute, $value, $parameters, $validator) {
            return to_url($value) == $value;
        });
        Validator::extend('not_in_routes', function ($attribute, $value, $parameters, $validator) {
            return !PageManager::inUsedRoutes($value);
        });
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^\+?([0-9][- ]*){8,}$/', $value);
        });
        Validator::extend('mail', function ($attribute, $value, $parameters, $validator) {
            return is_email($value);
        });

        $this->app['view']->addNamespace('admin', base_path() . '/resources/views/admin');


        Page::observe(PageObserver::class);
        Gallery::observe(GalleryObserver::class);
        File::observe(FileObserver::class);
        Report::observe(ReportObserver::class);
        Video::observe(VideoObserver::class);
        CoreValue::observe(CoreValueObserver::class);
        Block::observe(BlockObserver::class);
        News::observe(NewsObserver::class);
        CorporateDonor::observe(CorporateDonorObserver::class);
        SuccessStory::observe(SuccessStoryObserver::class);
        Slider::observe(SliderObserver::class);
        Social::observe(SocialObserver::class);
        HomeBlock::observe(HomeBlockObserver::class);
        Faq::observe(FaqObserver::class);
        Region::observe(RegionObserver::class);
        Need::observe(NeedObserver::class);
        Children::observe(ChildrenObserver::class);
        User::observe(SponsorObserver::class);
        Country::observe(CountryObserver::class);
        Gift::observe(GiftObserver::class);
        Chat::observe(ChatObserver::class);
        Fundraiser::observe(FundraiserObserver::class);
        Language::observe(LanguageObserver::class);
        Volunteering::observe(VolunteeringObserver::class);
        WelcomeModal::observe(WelcomeModalObserver::class);
        OurPublication::observe(OurPublicationObserver::class);
    }
}
