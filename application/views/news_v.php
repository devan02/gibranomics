<section class="l-section l-section--container">
    <div class="l-grid__row ">
        <div class="l-grid__xxs--4 l-grid__m--9 set-order-on-mobile">
            <div class="Heading Heading--mobileMarginTop resetMarginBottom" id="m579a8a4beab641fa8b6f3f2f6daad072">
                <h1 class="Heading__text">Newsroom</h1>
            </div>

            <div class="m-Search smallMarginBottom-M " data-jsmodule="Search" id="mbe0aa8dbab404a03a6e0ae9ef3da3f14">
                <div class="c-Search " data-jsmodule="Search">
                    <div class="c-Search__wrapper">
                        <div class="c-Search__icon">
                            <span class="icon" aria-hidden="true">
                                <svg><use xlink:href="/assets/iconssearch.svg#search-search" /></svg>
                            </span>
                        </div>
                        <form class="c-Search__form" action="search?contentType=e833bea4-7572-4310-944f-f57c92ab7ead" method="get">
                            <input type="search" name="query" id="mbe0aa8dbab404a03a6e0ae9ef3da3f14-query" class="c-Search__input" placeholder="Search for News..." data-js="search-input">
                            <input type="hidden" name="orderBy" id="frm-1b0f77ad27724be5ba8898cfb0ed12cc-orderBy" data-js-input="data-sort-by" />

                                <input type="hidden" name="contentType" value="e833bea4-7572-4310-944f-f57c92ab7ead">
                            <button type="submit" class="m-Serach__btn">
                                <span class="c-Search__btnLabel">Search</span>
                                <span class="c-Search__btnIcon">
                                    <span class="icon" aria-hidden="true">
                                        <svg><use xlink:href="/assets/iconssearch.svg#search-search" /></svg>
                                    </span>
                                </span>
                            </button>
                        </form>
                        <div class="c-Search__blank"></div>
                    </div>
                </div>
            </div>

            <div id="mfef0b887cf5e4bb29c0823276e2264d5" class="m-LatestNews" data-jsmodule="LatestNews" >
                <div class="Heading Heading--border" >
                    <h2 class="Heading__text h3">
                        Latest news
                    </h2>
                    <a href="<?=base_url();?>articles" class="Heading__link show-on-desktop" target="|Custom" >View all</a>
                </div>

                <ul class="m-LatestNews__list">
                    <?php
                        foreach ($articles as $key => $value) { //artikel terbaru
                            if($key == 0){
                    ?>

                    <li>
                        <div class="c-BoxRelatedContentItem " data-jscomponent="BoxRelatedContentItem">
                            <picture>
                                <!-- <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1" /> -->
                                <!-- <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=43E2571D43B0671687CAD63962B61A2F 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1 2x" /> -->
                                <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="<?=$this->master_m->parseImg($value->thumbnail);?>" />
                            </picture>
                            <div class="c-BoxRelatedContentItem__content">
                                <a class="c-BoxRelatedContentItem__heading" href="<?=base_url();?>news/detail/<?=$value->slug;?>">
                                    <div class="Heading ">
                                        <h3 class="Heading__text ">
                                            <?=$value->title;?>
                                        </h3>
                                    </div>
                                </a>
                                <div class="c-BoxRelatedContentItem__info">
                                    <time class="c-BoxRelatedContentItem__date" datetime="2023-09-28"><?=$this->master_m->parseDate($value->published_at);?></time>
                                    <?php
                                        $tempCat = $this->model->get_categories_article($value->id);
                                        if(count($tempCat) > 0){
                                            foreach ($tempCat as $cat) {
                                    ?>
                                    <a href="#"><?=$cat->category;?></a>
                                    <?php
                                            }
                                        }

                                    ?>
                                </div>
                                <div class="c-BoxRelatedContentItem__description">
                                    <p>
                                        <?=$value->abstract;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php
                            }
                        }
                    ?>

                    <?php
                        foreach ($articles as $key => $value) { //artikel list
                            if($key > 0){
                    ?>

                    <li>
                        <div class="c-BoxRelatedContentItem " data-jscomponent="BoxRelatedContentItem">
                            <picture>
                                <!-- <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1" /> -->
                                <!-- <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=43E2571D43B0671687CAD63962B61A2F 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1 2x" /> -->
                                <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="<?=$this->master_m->parseImg($value->thumbnail);?>" />
                            </picture>
                            <div class="c-BoxRelatedContentItem__content">
                                <a class="c-BoxRelatedContentItem__heading" href="<?=base_url();?>articles/detail/sada">
                                    <div class="Heading ">
                                        <h3 class="Heading__text ">
                                            <?=$value->title;?>
                                        </h3>
                                    </div>
                                </a>
                                <div class="c-BoxRelatedContentItem__info">
                                    <time class="c-BoxRelatedContentItem__date" datetime="2023-09-28"><?=$this->master_m->parseDate($value->published_at);?></time>
                                    <?php
                                        $tempCat = $this->model->get_categories_article($value->id);
                                        if(count($tempCat) > 0){
                                            foreach ($tempCat as $cat) {
                                    ?>
                                    <a href="#"><?=$cat->category;?></a>
                                    <?php
                                            }
                                        }

                                    ?>
                                </div>
                                <div class="c-BoxRelatedContentItem__description">
                                    <p>
                                        <?=$value->abstract;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php
                            }
                        }
                    ?>
                </ul>
                
                <a href="search?contentType=e833bea4-7572-4310-944f-f57c92ab7ead&amp;orderBy=Date" class="m-LatestNews__link show-on-mobile" target="|Custom" >View all</a>
            </div>
        </div>

        <div class="l-grid__xxs--4 l-grid__m--3 rightColumnTopPadding">            
            <div class="m-AdditionalLinks ">
                <div class="Heading m-AdditionalLinks__heading">
                    <h3 class="Heading__text ">
                        More News
                    </h3>
                </div>
                <ul class="m-AdditionalLinks__list">
                    <?php
                        if(count($categories) > 0){
                            foreach ($categories as $key => $value) {
                    ?>
                    <li>
                        <a href="#" class="Link m-AdditionalLinks__link" >#<?=$this->master_m->parseCategory($value->slug);?></a>
                    </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="m3c31e908c4b34de2a1132841adfadeed" class="l-section l-section--fluid ">
    <div class="l-section__placeholder">
        <div class="m-NewsletterSocialMedia  resetMarginBottom" data-jsmodule="NewsletterSocialMedia">
            <a href="#" title="Subscribe to the newsletter" >
                <div class="m-NewsletterSocialMedia__bgImage">
                    <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgdesktopx2.jpg?rev=8013db63193843f596eac67651cbee04&amp;w=3200&amp;h=368&amp;as=1&amp;cc=1&amp;hash=8D19561B74FECD467A4009B3B5A8E512" />
                        <source media="(min-width: 1260px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgdesktopx2.jpg?rev=8013db63193843f596eac67651cbee04&amp;w=1600&amp;h=184&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=797DEA1B55F25C34C21D418A1A310DF2 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgdesktopx2.jpg?rev=8013db63193843f596eac67651cbee04&amp;w=3200&amp;h=368&amp;as=1&amp;cc=1&amp;hash=8D19561B74FECD467A4009B3B5A8E512 2x" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgmobilex2.jpg?rev=b841b253283d4051a2a31d884498710c&amp;w=375&amp;h=422&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=152F710D0785AC00355CCC58672A3F72 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgmobilex2.jpg?rev=b841b253283d4051a2a31d884498710c&amp;w=750&amp;h=844&amp;as=1&amp;cc=1&amp;hash=42642213A41E46265DDA4B7774C7A605 2x" />
                        <img alt="Newsletter section background - the Space" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Irena/Modules-Content/NewsletterSM/NewsletterSMbgdesktopx2.jpg?rev=8013db63193843f596eac67651cbee04&amp;w=533&amp;h=61&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=B6F4636AA8A41F5FA2AA4235A6077585" />
                    </picture>
                </div>
                <div class="l-wrapper">
                    <div class="m-NewsletterSocialMedia__wrapper">
                        <span class="m-NewsletterSocialMedia__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70" height="72" viewbox="0 0 70 72">
                                <image id="L1" width="36" height="52" transform="translate(17 20)" xlink:href="data:image/png;base64,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"/>
                                <image id="Layer_770" data-name="Layer 770" width="70" height="45" xlink:href="data:image/png;base64,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"/>
                            </svg>
                        </span>

                        <div class="m-NewsletterSocialMedia__colLeft">
                            <p class="m-NewsletterSocialMedia__header">Stay up to date</p>
                            <span class="m-NewsletterSocialMedia__link Link">Subscribe to the newsletter</span>
                        </div>
                        <div class="m-NewsletterSocialMedia__colRight">
                            <span class="m-NewsletterSocialMedia__description">Stories you might have missed, key data and upcoming events information straight into your mailbox</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<section id="m9f0e0f69e973439d8fdbb786731a0b9c" class="l-section l-section--fluid colorBg--3 ">
    <div class="l-wrapper">
        <section id="me3bc2664fd1a458e8c892e2ac8544460" class="l-section l-section--container ">
            <div class="l-grid__row">
                <div class="l-grid__xxs--4 l-grid__m--12">     
                    <div class="l-grid__row">
                        <div class="l-grid10__m--10 " id="mfb14b72096e341629e7934b1cb336e97">
                            <div class="m-BoxRelatedContent  " data-jsmodule="BoxRelatedContent" data-boxrelatedcontent-space="">
                                <div class="swiper-container ">
                                    <div class="Heading m-BoxRelatedContent__heading Heading--border">
                                        <h2 class="Heading__text ">
                                            Infographics
                                        </h2>
                                    </div>
                                    <div class="swiper-navigation">
                                        <button class="icon icon--swiper swiper-button-prev">
                                            <svg><use xlink:href="/assets/icons/arrows.svg#arrows-swiper"></use></svg>
                                        </button>
                                        <button class="icon icon--swiper swiper-button-next">
                                            <svg><use xlink:href="/assets/icons/arrows.svg#arrows-swiper"></use></svg>
                                        </button>
                                    </div>
                                    <ul class="swiper-wrapper">
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <!-- <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=345F462BE36031B1884AE969D8AE6D2D" /> -->
                                                    <!-- <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=46C58943D35AADA32FA3B9756BC63860 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=345F462BE36031B1884AE969D8AE6D2D 2x" /> -->
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="assets/img/image13.jpg" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;h=2869&amp;w=5117&amp;la=en&amp;hash=C99ED9B7330CA8B628CFB153FA7E0B9F" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                The impact on emissions of replacing fossil fuels with renewables and increasing energy efficiency through 2030
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;h=2869&amp;w=5117&amp;la=en&amp;hash=C99ED9B7330CA8B628CFB153FA7E0B9F" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/The-impact-on-emissions-of-replacing-fossil-fuels-with-renewables-and-increasing-energy.jpg?rev=6faedffe65ef40aaa1d7cf8791ffbd4d&amp;h=2869&amp;w=5117&amp;la=en&amp;hash=C99ED9B7330CA8B628CFB153FA7E0B9F" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <!-- <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=F412BECB96022F67092AE00C380DFEC6" /> -->
                                                    <!-- <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=90C2925056C101AA5DAC01AD01FB0C92 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=F412BECB96022F67092AE00C380DFEC6 2x" /> -->
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="assets/img/image14.jpg" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=CE4357E868BA84A0C26B98B08D2928B7" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Scale-up and redirect investment to reach the 1.5&#186;C climate goal
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=CE4357E868BA84A0C26B98B08D2928B7" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Scaleup-and-redirect-investment-to-reach-the-15C-climate-goal.jpg?rev=ac07e76be0a04d98ba440fea9c04a44a&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=CE4357E868BA84A0C26B98B08D2928B7" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <!-- <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=A69C709788F3F3BF7E1203EB286E5C9E" /> -->
                                                    <!-- <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=10DB8A7C5EC67FC7C0B7E825A996BDD1 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=A69C709788F3F3BF7E1203EB286E5C9E 2x" /> -->
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="assets/img/image15.jpg" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FC9C2C60FABC63CFE3B6D3B01AAE0767" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Role of biomass for energy and feedstock by end-use sector in 1.5&#176;C Scenario
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FC9C2C60FABC63CFE3B6D3B01AAE0767" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Role-of-biomass-for-energy-and-feedstock-by-enduse-sector-in-15C-Scenario.jpg?rev=8948223721fd4e38a90e663023b28441&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FC9C2C60FABC63CFE3B6D3B01AAE0767" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                            
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=17A0C2BF25C7AA462AD69B7A8DFA2BE0" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=D945393041AF66697DAC4985B5B03804 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=17A0C2BF25C7AA462AD69B7A8DFA2BE0 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=79E95239364557C0AC913D39F1144349" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=C2717DCEB308A8CFE8641D069E05BC99" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Renewable energy jobs will grow substantially by 2030
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=C2717DCEB308A8CFE8641D069E05BC99" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewable-energy-jobs-will-grow-substantially-by-2030.jpg?rev=1d7eb40827094a498a7566dd501b5efc&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=C2717DCEB308A8CFE8641D069E05BC99" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=16EF43BA14CE84635B6C3C14026C1847" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=C2BF49C3E23280D20BA3C4752A83E8F9 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=16EF43BA14CE84635B6C3C14026C1847 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=AD447E7CD68B29AB044250DAD488D914" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FF2FD7BBC2890D19034AE5F1BB24B939" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Renewables scale-up by 2030
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FF2FD7BBC2890D19034AE5F1BB24B939" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Renewables-scale-up-by-2030.jpg?rev=52d36ce091fc40eda334cd9576edd9b7&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=FF2FD7BBC2890D19034AE5F1BB24B939" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=B3E90046F5FCC4D906DA73CC0023FFB1" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=752261BBCE83DFA630F38EEDA7DF78A4 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=B3E90046F5FCC4D906DA73CC0023FFB1 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=F18F3012A1F6DF510B4DADACB6BB2F82" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;h=1013&amp;w=1800&amp;la=en&amp;hash=7705D4F60F76AD82A0ECB97E6DEE558A" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Reducing emissions by 2050 through six technological avenues
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;h=1013&amp;w=1800&amp;la=en&amp;hash=7705D4F60F76AD82A0ECB97E6DEE558A" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Reducing-emissions-by-2050-through-six-technological-avenues.jpg?rev=91a8cbe718b044dd97ce6c305273fba4&amp;h=1013&amp;w=1800&amp;la=en&amp;hash=7705D4F60F76AD82A0ECB97E6DEE558A" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=30F65F29A87F07D0D0D01534397595E5" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=C5310288E90C6A0A10BE50C5CE33D292 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=30F65F29A87F07D0D0D01534397595E5 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=75FEF6E08639E0633B4CB5E0CF1E7066" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;h=1622&amp;w=2884&amp;la=en&amp;hash=5B704D51F38AB06B3443FBB911ABAD7F" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">Priority areas and actions by 2030</h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;h=1622&amp;w=2884&amp;la=en&amp;hash=5B704D51F38AB06B3443FBB911ABAD7F" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                            <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Priority-areas-and-actions-by-2030.jpg?rev=2d780c55cb9146f6b20cea6132e4ec17&amp;h=1622&amp;w=2884&amp;la=en&amp;hash=5B704D51F38AB06B3443FBB911ABAD7F" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=841055DB2E981C92AFE9624A47223A1F" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=B5FB3282BF44A41657BFA35F3FBA87BE 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=841055DB2E981C92AFE9624A47223A1F 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=4B2554D8BC74856BA82B94C747E38947" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=A9AFB6E50DDAE74698849B0808C5EF1A" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Population served by decentralised renewable energy solutions globally, 2010-2019 (million)
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=A9AFB6E50DDAE74698849B0808C5EF1A" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Population-served-by-decentralised-renewable-energy-solutions-globally-20102019.jpg?rev=86e870acbe12465b9adaf3ac06e33eb9&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=A9AFB6E50DDAE74698849B0808C5EF1A" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=1554E8A39F56C03B4092C4560653BCD3" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=6983B6ED76FBAF1CE0560942080BC32A 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=1554E8A39F56C03B4092C4560653BCD3 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=44FDE258F2E04D73CDC3B69A26D250F8" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;h=1097&amp;w=1967&amp;la=en&amp;hash=5FFFBCBA25E9B182942FE077814B6F56" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Growth in hydrogen production with renewable electricity in Paris Agreement-aligned scenario
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;h=1097&amp;w=1967&amp;la=en&amp;hash=5FFFBCBA25E9B182942FE077814B6F56" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Growth-in-hydrogen-production-with-renewable-electricity-in-Paris-Agreement-aligned-scenario.jpg?rev=ff03b505a3c24121967494b8162ffb11&amp;h=1097&amp;w=1967&amp;la=en&amp;hash=5FFFBCBA25E9B182942FE077814B6F56" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=8441A48A8056DCACB12797D5DBA7F73F" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=90F93DEDB09DE33F197D6857FC0277D7 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=8441A48A8056DCACB12797D5DBA7F73F 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=045014515408A278203E963AD4E0F6C9" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;h=8841&amp;w=15350&amp;la=en&amp;hash=632050EBCA981B8D98FFA01789DC6BCA" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Enabling policy framework for a just and inclusive energy transition
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;h=8841&amp;w=15350&amp;la=en&amp;hash=632050EBCA981B8D98FFA01789DC6BCA" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                            <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/WETO22/Enabling-policy-framework-for-a-just-and-inclusive-energy-transition.jpg?rev=5ff13632e37b43b1a64f850735c87c85&amp;h=8841&amp;w=15350&amp;la=en&amp;hash=632050EBCA981B8D98FFA01789DC6BCA" >
                                                            <span class="icon" aria-hidden="true" >
                                                            <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=FBE84EB6C18445E80FC3FA724A6B1E9D" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=5C639787122DA931301BFDF11AC1F8BE 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=FBE84EB6C18445E80FC3FA724A6B1E9D 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=8911D2470D96062BAD0284E67CF6F38D" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=4DD65BEEA9CF1149045CB873E5D762E9" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                            Water consumption of hydrogen in 2050
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=4DD65BEEA9CF1149045CB873E5D762E9" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Water-consumption-of-hydrogen-in-2050.jpg?rev=ff987adae2474389a2a596696f57f39c&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=4DD65BEEA9CF1149045CB873E5D762E9" >
                                                            <span class="icon" aria-hidden="true" >
                                                            <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=F09C7D4A8339EE45EA857BB8513CDC5F" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=956F68B6B6E1F94DBF9935D5CD1F08A6 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=F09C7D4A8339EE45EA857BB8513CDC5F 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=C539872D4DFF64A6ED22BA40ACDF2300" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=F93741549B37C66629286FCFE05ED508" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Top producers of critical materials in electrolysers
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=F93741549B37C66629286FCFE05ED508" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Top-producers-of-critical-materials-in-electrolysers.jpg?rev=4fd668ccae294706b07b7e60e247daab&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=F93741549B37C66629286FCFE05ED508" >
                                                            <span class="icon" aria-hidden="true" >
                                                            <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=184A94DAE6A19C2A3B8FFB8FB70BEE18" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=E74BA4CB680F907FCE9F75BCDE5E3CEE 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=184A94DAE6A19C2A3B8FFB8FB70BEE18 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=62AD097FB71823110C71324C2B18503F" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=9F8847734891C93B93E0CFEA7C5458C8" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                            Technology leadership opportunities in green hydrogen value chains
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=9F8847734891C93B93E0CFEA7C5458C8" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technology-leadership-opportunities-in-green-hydrogen-value-chains.jpg?rev=16281ea297be4c7b975d2c940d2add60&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=9F8847734891C93B93E0CFEA7C5458C8" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=315518E3F6791AF530B4192A4F1757DA" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=C5E8DBD0F81091F2771BC13C1E0F491B 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=315518E3F6791AF530B4192A4F1757DA 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=606290BA3C7833E22CF9316602BDD8AB" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=E8FB5D9B51E181DDBD3EF4F23CAEC7C2" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Technical potential for producing green hydrogen
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=E8FB5D9B51E181DDBD3EF4F23CAEC7C2" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Technical-potential-for-producing-green-hydrogen.jpg?rev=799beb11b3fd45ab9128ed14de517ef2&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=E8FB5D9B51E181DDBD3EF4F23CAEC7C2" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="swiper-slide">
                                            <div class="c-InfographicItem" data-jscomponent="InfographicItem">
                                                <picture>
                                                    <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=8E6C663E72A93E5FD3E8FE9188D79EB1" />
                                                    <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;w=500&amp;h=250&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=C620037941FA2DB980F17C1CB438A2A9 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;w=1000&amp;h=500&amp;as=1&amp;cc=1&amp;hash=8E6C663E72A93E5FD3E8FE9188D79EB1 2x" />
                                                    <img alt="" class="c-InfographicItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;w=166&amp;h=83&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=5DCA43A6A48EE7D12867E6CA9193B277" />
                                                </picture>
                                                <div class="c-InfographicItem__content">
                                                    <button class="c-InfographicItem__link" data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=8D491ADC0C0F71EF4541762D91CAA2B6" >
                                                        <div class="Heading c-InfographicItem__heading">
                                                            <h3 class="Heading__text ">
                                                                Stranded asset risk for major net fossil fuel exporters
                                                            </h3>
                                                        </div>
                                                    </button>
                                                    <div class="c-InfographicItem__buttons">
                                                        <a href="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=8D491ADC0C0F71EF4541762D91CAA2B6" class="c-Button " data-jscomponent="Button" download="screen.jpg">
                                                            <span class="icon" aria-hidden="true">
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-download"></use></svg>
                                                            </span>
                                                            <span class="c-Button__label">Download</span>
                                                        </a>
                                                        <button class="c-Button " data-jscomponent="Button" data-zoom="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Infographics/2022/Geopolitics-H2-Stranded-asset-risk-for-major-net-fossil-fuel-exporters.jpg?rev=08fd47aa283f476e8bc521a579857527&amp;h=1875&amp;w=3334&amp;la=en&amp;hash=8D491ADC0C0F71EF4541762D91CAA2B6" >
                                                            <span class="icon" aria-hidden="true" >
                                                                <svg><use xlink:href="/assets/icons/button.svg#button-magnifier"></use></svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-BoxRelatedContent__more">
                                    <a href="search?contentType=e2bba81a-d991-4090-a792-671c12a7a22b&amp;orderBy=Date" class="Link" target="|Custom" >View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<section id="m3335853da81c4b3fbdab7b4109689a9d" class="l-section l-section--container ">
    <div class="l-section__placeholder">
        <div class="l-grid__row">
            <div class="elems-2 elems-2--md">
                <div class="m-col equal-col-modules">

                    <div class="Heading Heading--border" id="mcdd4453d838c4230a0494c17ce154039">
                        <h2 class="Heading__text">Featured video</h2>
                    </div>
                    <!-- ArticleVideo #START -->
                    <div class="m-ArticleVideo colorBgInner--5" data-jsmodule="ArticleVideo" id="4281a39853c349f397424eaaacdc6f69">
                        <!-- VideoItem #START -->
                        <div class="c-VideoItem c-VideoItem--half-page colorBg " data-jscomponent="VideoItem">
                            <div class="c-VideoItem__videoWrapper">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/ewHSW6nRexg?enablejsapi=1" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <div class="c-VideoItem__content">
                                <div class="m-TopHeader__sharing">
                                    <div class="c-Sharing " data-jscomponent="Sharing">
                                        <ul class="c-Sharing__list">
                                            <li>
                                                <button class="c-Sharing__link" title="Share via Twitter" data-sharing-type="twitter" >
                                                    <span class="icon " aria-hidden="true">
                                                        <svg><use xlink:href="/assets/icons/sharing.svg#sharing-twitter"></use></svg>
                                                    </span>
                                                </button>
                                            </li>

                                            <li>
                                                <button class="c-Sharing__link" title="More " data-sharing-type="sharemore" >
                                                    <span class="icon " aria-hidden="true">
                                                        <svg><use xlink:href="/assets/icons/sharing.svg#sharing-sharemore"></use></svg>
                                                    </span>
                                                </button>
                                                <div class="c-Sharing__tooltip " data-sharing-tooltip="sharemore">
                                                    <ul class="c-Sharing__list">
                                                        <li>
                                                            <button class="c-Sharing__link" title="Share via Facebook" data-sharing-type="facebook"  data-url="https://www.irena.org/News">
                                                                <span class="icon " aria-hidden="true">
                                                                    <svg><use xlink:href="/assets/icons/sharing.svg#sharing-facebook"></use></svg>
                                                                </span>
                                                            </button>
                                                        </li>

                                                        <li>
                                                            <button class="c-Sharing__link" title="Share via Linkedin" data-sharing-type="linkedin" >
                                                                <span class="icon " aria-hidden="true">
                                                                    <svg><use xlink:href="/assets/icons/sharing.svg#sharing-linkedin"></use></svg>
                                                                </span>
                                                            </button>
                                                        </li>

                                                        <li>
                                                            <button class="c-Sharing__link" title="Share via Email" data-sharing-type="email" >
                                                                <span class="icon " aria-hidden="true">
                                                                    <svg><use xlink:href="/assets/icons/sharing.svg#sharing-email"></use></svg>
                                                                </span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <button class="c-Sharing__link" title="Clipboard" data-sharing-type="clipboard"  data-clipboard="{&quot;date&quot;:&quot;&quot;,&quot;yt&quot;:&quot;ewHSW6nRexg&quot;,&quot;type&quot;:&quot;ytvideo&quot;,&quot;intType&quot;:&quot;ytvideo&quot;,&quot;storedDate&quot;:&quot;2023-10-07T06:09:41.5306763+00:00&quot;,&quot;id&quot;:&quot;a6d8076651cc4d78bb89056a5b546720&quot;,&quot;dsid&quot;:&quot;a6d8076651cc4d78bb89056a5b546720&quot;,&quot;title&quot;:&quot;Actions to accelerate energy transition &amp; strengthen climate resilience in SIDS&quot;,&quot;pgid&quot;:&quot;15138396444444d78d6bd8b99ca55979&quot;,&quot;url&quot;:&quot;https://www.irena.org/News&quot;}">
                                                    <span class="icon icon--clipboard" aria-hidden="true">
                                                        <svg><use xlink:href="/assets/icons/sharing.svg#sharing-clipboard"></use></svg>
                                                    </span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="Heading ">
                                    <h2 class="Heading__text">
                                        Actions to accelerate energy transition & strengthen climate resilience in SIDS
                                    </h2>
                                </div>

                                <div class="c-VideoItem__quotation c-VideoItem__quotation--quote">

                                </div>

                                <div class="c-VideoItem__links">

                                </div>

                            </div>
                        </div>
                        <!-- VideoItem #END -->
                    </div>
                    <!-- ArticleVideo #END -->
                </div>

                <div class="m-col equal-col-modules">
                    <div class="Heading Heading--border" id="mfd7c21e2bdbd4759b6f097f2caa7bca5">
                        <h2 class="Heading__text">
                            Photo gallery
                        </h2>
                    </div>
                    <!-- PhotoGallery #START -->
                    <div class="m-PhotoGallery " data-jsmodule="PhotoGallery" data-photosetid="72157690016392124" data-max="10" data-error-msg="An error occurred. Refresh the page to try again." data-direction="" id="gfd7c21e2bdbd4759b6f097f2caa7bca5">
                        <div class="m-PhotoGallery__container colorBg--5">
                            <div class="swiper-container m-PhotoGallery__swiper" data-photogallery-swiper="">
                                <div class="loader loader--v2" data-photogallery-loader=""></div>
                                <div class="swiper-wrapper" data-photogallery-wrapper=""></div>
                                <button class="icon icon--button m-PhotoGallery__magnify is--hide" data-photogallery-magnify>
                                    <svg><use xlink:href="/assets/icons/button.svg#button-magnifier" /></svg>
                                </button>
                            </div>
                            <div class="swiper-container m-PhotoGallery__thumbsswiper" data-photogallery-thumbsswiper="">
                                <div class="swiper-wrapper" data-photogallery-thumbswrapper=""></div>
                                <button class="icon icon--swiper swiper-button-prev">
                                    <svg><use xlink:href="/assets/icons/arrows.svg#arrows-swiper" /></svg>
                                </button>

                                <button class="icon icon--swiper swiper-button-next">
                                    <svg><use xlink:href="/assets/icons/arrows.svg#arrows-swiper" /></svg>
                                </button>
                            </div>
                        </div>

                        <div class="m-PhotoGallery__linkcontainer colorBg--5">
                            <a href="https://www.flickr.com/photos/irenaimages/sets/72157690016392124" class="Link m-PhotoGallery__more" rel="noopener noreferrer" target="_blank" title="opens new window" >more</a>
                        </div>
                    </div>
                    <!-- PhotoGallery #END -->
                </div>
            </div>
        </div>
    </div>
</section>