<article>
  <section class="l-section l-section--fluid">
    <div class="l-section__placeholder">
      <header>
        <div class="m-TopHeader " data-jsmodule="TopHeader">
          <?php
            $picture = "";
            $category = "";

            if(!empty($data)){
              $picture = $this->master_m->parseImg($data['thumbnail']);
              $category = $this->model->get_category($data['category_primary'])['category'];
            }
          ?>
          <div class="m-TopHeader__bgImage">
            <picture>
              <source media="(min-width: 2540px)" srcset="<?=$picture;?>" />
              <source srcset="<?=$picture;?>" />
              <img alt="<?=$data['title'];?>" loading="lazy" src="<?=$picture;?>" />
            </picture>
          </div>
          <div class="l-wrapper">
            <div class="m-TopHeader__bgColor" data-topheader-bgcolor="fixed">
              <div class="m-TopHeader__image">
                <picture>
                  <source media="(min-width: 2540px)" srcset="<?=$picture;?>" />
                  <source srcset="<?=$picture;?>" />
                  <img alt="<?=$data['title'];?>" loading="lazy" src="<?=$picture;?>" class="img-height" />
                </picture>
              </div>
              <div class="m-TopHeader__container" data-topheader-container="">
                
                <!-- <div class="m-TopHeader__sharing">
                  <div class="c-Sharing " data-jscomponent="Sharing">
                    <ul class="c-Sharing__list">
                      <li>
                        <button class="c-Sharing__link" title="Share via Twitter" data-sharing-type="twitter">
                          <i class="bi bi-share-fill"></i>
                        </button>
                      </li>
                      <li>
                        <button class="c-Sharing__link" title="More " data-sharing-type="sharemore">
                          <i class="bi bi-share-fill"></i>
                        </button>
                        <div class="c-Sharing__tooltip " data-sharing-tooltip="sharemore">
                          <ul class="c-Sharing__list">
                            <li>
                              <button class="c-Sharing__link" title="Share via Facebook" data-sharing-type="facebook" data-url="https://www.irena.org/News/articles/2023/Sep/IRENA-Office-in-Germany-Officially-Inaugurated">
                                <i class="bi bi-share-fill"></i>
                              </button>
                            </li>
                            <li>
                              <button class="c-Sharing__link" title="Share via Linkedin" data-sharing-type="linkedin">
                                <i class="bi bi-share-fill"></i>
                              </button>
                            </li>
                            <li>
                              <button class="c-Sharing__link" title="Share via Email" data-sharing-type="email">
                                <i class="bi bi-share-fill"></i>
                              </button>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <button class="c-Sharing__link" title="Clipboard" data-sharing-type="clipboard" data-clipboard="{&quot;date&quot;:&quot;27 September 2023&quot;,&quot;image&quot;:&quot;https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/Bonn-IITC-office-inauguration.jpg?rev=06fac7cd2019438d98d15db4f81745d4&amp;w=332&amp;h=174&amp;as=1&amp;cc=1&amp;hash=31484812E29F82B3441AE35E5177DB81&quot;,&quot;category&quot;:&quot;Articles&quot;,&quot;categoryUrl&quot;:&quot;/search?contentType=922d770c-a4e6-4222-9483-3011736e2380&amp;orderBy=Date&quot;,&quot;description&quot;:&quot;&quot;,&quot;type&quot;:&quot;article&quot;,&quot;intType&quot;:&quot;article&quot;,&quot;storedDate&quot;:&quot;2023-10-07T06:27:34.2003578+00:00&quot;,&quot;id&quot;:&quot;0e76c74478684668b40278b7b3cad1b9&quot;,&quot;title&quot;:&quot;IRENA Office in Germany Officially Inaugurated&quot;,&quot;pgid&quot;:&quot;0e76c74478684668b40278b7b3cad1b9&quot;,&quot;url&quot;:&quot;https://www.irena.org/News/articles/2023/Sep/IRENA-Office-in-Germany-Officially-Inaugurated&quot;}">
                          <i class="bi bi-share-fill"></i>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div> -->

                <h1 class="m-TopHeader__heading"> <?=(!empty($data)) ? $title : '';?> </h1>
                <div class="m-TopHeader__footer">
                  <div class="m-TopHeader__footerLeft">
                    <time class="m-TopHeader__date" datetime="2023-09-27"><?=$this->master_m->parseDate($data['created_at']);?></time>
                    <span class="m-TopHeader__category"> <?=$category;?> </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="m-Breadcrumbs  ">
              <div class="c-Breadcrumbs">
                <nav class="c-Breadcrumbs__wrapper" aria-label="Navigation path">
                  <ol class="c-Breadcrumbs__list" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <a class="c-Breadcrumbs__link" itemprop="item" href="<?=base_url();?>">
                        <span itemprop="name">Home</span>
                      </a>
                      <meta itemprop="position" content="1" />
                      <span class="c-Breadcrumbs__separator">></span>
                    </li>
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <a class="c-Breadcrumbs__link" itemprop="item" href="<?=base_url();?>news">
                        <span itemprop="name">News</span>
                      </a>
                      <meta itemprop="position" content="2" />
                      <span class="c-Breadcrumbs__separator">></span>
                    </li>
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <span class="c-Breadcrumbs__text" itemprop="name"><?=$category;?></span>
                      <meta itemprop="position" content="3" />
                      <span class="c-Breadcrumbs__separator">></span>
                    </li>
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <span class="c-Breadcrumbs__text" itemprop="name"><?=$this->master_m->parseYear($data['published_at']);?></span>
                      <meta itemprop="position" content="4" />
                      <span class="c-Breadcrumbs__separator">></span>
                    </li>
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <span class="c-Breadcrumbs__text" itemprop="name"><?=$this->master_m->parseShortMonth($data['published_at']);?></span>
                      <meta itemprop="position" content="5" />
                      <span class="c-Breadcrumbs__separator">></span>
                    </li>
                    <li itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
                      <span class="c-Breadcrumbs__text" itemprop="name"><?=$title;?></span>
                      <meta itemprop="position" content="6" />
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
  </section>
  <section class="l-section l-section--container ">
    <div class="l-grid__row">
      <!-- <div class="l-grid__xxs--4 l-grid__m--2 set-order-on-mobile ">
        <div class="m-NewsletterSmallForm show-on-desktop" data-jsmodule="NewsletterSmallForm">
          <div class="Heading ">
            <h4 class="Heading__text "> Newsletter </h4>
          </div>
          <form class="m-NewsletterSmallForm__form" action="/subscriptionform" method="post">
            <input type="text" name="EmailId" class="m-NewsletterSmallForm__input" data-newslettersmallform-input="" placeholder="Enter e-mail address" aria-label="Subscribe" />
            <button type="submit" class="m-NewsletterSmallForm__btn" data-newslettersmallform-submit="" disabled="">Go</button>
          </form>
        </div>
      </div> -->

      <div class="l-grid__m--12 ">
        <div class="l-grid__row">
          <div class="l-grid10__m--8 l-grid10__m__offset--1 " id="mbeec8f31cfa647d9a8946d7861356468">
            <!-- RichText #START -->
            <div class="m-RichText " data-jsmodule="RichText">
              <!-- RichTextComponent #START -->
              <div class="c-RichText " data-jscomponent="RichText">
                <?=$data['content'];?>
              </div>
              <!-- RichTextComponent #END -->
            </div>
            <!-- RichText #END -->
          </div>
          <div class="l-grid10__m--9 l-grid10__m__offset--1 " id="m255fd7dc4e6b49509b1f4ad9027cc0fe"></div>
          <div class="l-grid10__m--8 l-grid10__m__offset--1 " id="m7ddd0e1d2d834aaab70d5152a6c560af"></div>
          <div class="l-grid10__m--9 l-grid10__m__offset--1 " id="m7ff3c637d4f649938ed056b3f42df39b">
            <div class="m-BoxRelatedContent  " data-jsmodule="BoxRelatedContent" data-boxrelatedcontent-space="">
              <div class="swiper-container">
                <div class="Heading m-BoxRelatedContent__heading Heading--border" id="m50997385d28d458fad31397c25abdfe6">
                  <h2 class="Heading__text"> Related content </h2>
                </div>
                
                <!-- <div class="swiper-navigation is--hide">
                  <button class="icon icon--swiper swiper-button-prev">
                    <svg>
                      <use xlink:href="<? //base_url();?>assets/front/icons/arrows.svg#arrows-swiper" />
                    </svg>
                  </button>
                  <button class="icon icon--swiper swiper-button-next">
                    <svg>
                      <use xlink:href="<? //base_url();?>assets/front/icons/arrows.svg#arrows-swiper" />
                    </svg>
                  </button>
                </div> -->

                <ul class="swiper-wrapper" data-slides-mobile="" data-slides-tablet="" data-slides-desktop="">
                  <li class="swiper-slide">
                    <div class="c-BoxRelatedContentItem  " data-jscomponent="BoxRelatedContentItem">
                      <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=43E2571D43B0671687CAD63962B61A2F 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=52DCF6CD81C8D98CE036ED322D5C76D1 2x" />
                        <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-release.jpg?rev=553d9a49bd1f4a47836fa7ac3e7b631b&amp;w=216&amp;h=123&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=B16DF0AE833782BC160709CE238A2F62" />
                      </picture>
                      <div class="c-BoxRelatedContentItem__content">
                        <a class="c-BoxRelatedContentItem__heading" href="/News/pressreleases/2023/Sep/Renewables-Jobs-Nearly-Doubled-in-Past-Decade-Soared-to-13-Point-7-Million-in-2022">
                          <div class="Heading ">
                            <h3 class="Heading__text "> Renewables Jobs Nearly Doubled in Past Decade, Soared to 13.7 Million in 2022 </h3>
                          </div>
                        </a>
                        <div class="c-BoxRelatedContentItem__info">
                          <time class="c-BoxRelatedContentItem__date" datetime="2023-09-28">28 September 2023</time>
                          <a href="/Search?contentType=8632933e-7fb6-4dbe-8407-fe1354cdc20d&amp;orderBy=Date">Press Releases</a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="c-BoxRelatedContentItem  " data-jscomponent="BoxRelatedContentItem">
                      <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/Day-2-blog.jpg?rev=a684711f163e4ea7865a7433fada0223&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=6B8935F4DBDED1392AE0580F8612581C" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/Day-2-blog.jpg?rev=a684711f163e4ea7865a7433fada0223&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=F27C74FFF445FA2035495BC0DBDE07B5 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/Day-2-blog.jpg?rev=a684711f163e4ea7865a7433fada0223&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=6B8935F4DBDED1392AE0580F8612581C 2x" />
                        <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/Day-2-blog.jpg?rev=a684711f163e4ea7865a7433fada0223&amp;w=216&amp;h=123&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=B9AC415B6EC2A06F83ACD534BF58A67F" />
                      </picture>
                      <div class="c-BoxRelatedContentItem__content">
                        <a class="c-BoxRelatedContentItem__heading" href="/News/articles/2023/Sep/Innovation-Week-2023-As-it-Happens">
                          <div class="Heading ">
                            <h3 class="Heading__text "> Innovation Week 2023 - Indirect electrification and workshops: As it Happens </h3>
                          </div>
                        </a>
                        <div class="c-BoxRelatedContentItem__info">
                          <time class="c-BoxRelatedContentItem__date" datetime="2023-09-26">26 September 2023</time>
                          <a href="/search?contentType=922d770c-a4e6-4222-9483-3011736e2380&amp;orderBy=Date">Articles</a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="c-BoxRelatedContentItem  " data-jscomponent="BoxRelatedContentItem">
                      <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/RRA-Bosnia-and-Herzegovina-release.png?rev=dfed037790fb47bb9c01e43a1798e1a8&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=08E29CACA26AF56A918724B596C5049E" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/RRA-Bosnia-and-Herzegovina-release.png?rev=dfed037790fb47bb9c01e43a1798e1a8&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=05D1D0DE87E2B30422760F6B64BE58CD 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/RRA-Bosnia-and-Herzegovina-release.png?rev=dfed037790fb47bb9c01e43a1798e1a8&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=08E29CACA26AF56A918724B596C5049E 2x" />
                        <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/RRA-Bosnia-and-Herzegovina-release.png?rev=dfed037790fb47bb9c01e43a1798e1a8&amp;w=216&amp;h=123&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=01E215517016A79EDE117A53730A31F9" />
                      </picture>
                      <div class="c-BoxRelatedContentItem__content">
                        <a class="c-BoxRelatedContentItem__heading" href="/News/pressreleases/2023/Sep/Integrated-Renewables-Strategy-Will-Deliver-Bosnia-and-Herzegovinas-Energy-Security-Prosperity">
                          <div class="Heading ">
                            <h3 class="Heading__text "> Integrated Renewables Strategy Will Deliver Bosnia and Herzegovina’s Energy Security, Prosperity </h3>
                          </div>
                        </a>
                        <div class="c-BoxRelatedContentItem__info">
                          <time class="c-BoxRelatedContentItem__date" datetime="2023-09-25">25 September 2023</time>
                          <a href="/Search?contentType=8632933e-7fb6-4dbe-8407-fe1354cdc20d&amp;orderBy=Date">Press Releases</a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="c-BoxRelatedContentItem  " data-jscomponent="BoxRelatedContentItem">
                      <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/IIW2023-as-it-happens.jpg?rev=ecc83b51384a46a1a01f2bed97f46ac6&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=F92CD58A5C3B8971925A3604646E3979" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/IIW2023-as-it-happens.jpg?rev=ecc83b51384a46a1a01f2bed97f46ac6&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=DD19DE23FE676C223801B8749F41DA11 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/IIW2023-as-it-happens.jpg?rev=ecc83b51384a46a1a01f2bed97f46ac6&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=F92CD58A5C3B8971925A3604646E3979 2x" />
                        <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Article/2023/Sep/IIW2023-as-it-happens.jpg?rev=ecc83b51384a46a1a01f2bed97f46ac6&amp;w=216&amp;h=123&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=0B9EB1B5335C2420D969813BA52E4AED" />
                      </picture>
                      <div class="c-BoxRelatedContentItem__content">
                        <a class="c-BoxRelatedContentItem__heading" href="/News/articles/2023/Sep/Innovation-Week-2023-As-it-Happens-Day1">
                          <div class="Heading ">
                            <h3 class="Heading__text "> Innovation Week 2023: Direct Electrification (Renewable-powered Solutions) Day </h3>
                          </div>
                        </a>
                        <div class="c-BoxRelatedContentItem__info">
                          <time class="c-BoxRelatedContentItem__date" datetime="2023-09-25">25 September 2023</time>
                          <a href="/search?contentType=922d770c-a4e6-4222-9483-3011736e2380&amp;orderBy=Date">Articles</a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="c-BoxRelatedContentItem  " data-jscomponent="BoxRelatedContentItem">
                      <picture>
                        <source media="(min-width: 2540px)" srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Innovation-week-press-release.jpg?rev=bb62dd1dd2054149a86c21163cb0c57e&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=F47D49C8AC08B467C599A148385F3FE9" />
                        <source srcset="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Innovation-week-press-release.jpg?rev=bb62dd1dd2054149a86c21163cb0c57e&amp;w=650&amp;h=371&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=D75F9DDB194E9642AEB8F3C3F0AFBB32 1x, https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Innovation-week-press-release.jpg?rev=bb62dd1dd2054149a86c21163cb0c57e&amp;w=1300&amp;h=742&amp;as=1&amp;cc=1&amp;hash=F47D49C8AC08B467C599A148385F3FE9 2x" />
                        <img alt="" class="c-BoxRelatedContentItem__image" loading="lazy" src="https://mc-cd8320d4-36a1-40ac-83cc-3389-cdn-endpoint.azureedge.net/-/media/Images/IRENA/Agency/Press-Release/2023/Sep/Innovation-week-press-release.jpg?rev=bb62dd1dd2054149a86c21163cb0c57e&amp;w=216&amp;h=123&amp;as=1&amp;bc=ffffff&amp;cc=1&amp;hash=2F1AEC98B775E1404A1B573F92679190" />
                      </picture>
                      <div class="c-BoxRelatedContentItem__content">
                        <a class="c-BoxRelatedContentItem__heading" href="/News/pressreleases/2023/Sep/IRENA-Innovation-Week-Spurs-Renewable-Solutions-to-Decarbonise-End-use-Sectors">
                          <div class="Heading ">
                            <h3 class="Heading__text "> IRENA Innovation Week Spurs Renewable Solutions to Decarbonise End-use Sectors </h3>
                          </div>
                        </a>
                        <div class="c-BoxRelatedContentItem__info">
                          <time class="c-BoxRelatedContentItem__date" datetime="2023-09-21">21 September 2023</time>
                          <a href="/Search?contentType=8632933e-7fb6-4dbe-8407-fe1354cdc20d&amp;orderBy=Date">Press Releases</a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>

<style>
.img-height{
  height: 316px;
}
</style>