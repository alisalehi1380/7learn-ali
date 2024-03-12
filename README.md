
![306548521-f34f9b88-ae0f-49c8-861e-bf1137410056](https://github.com/alisalehi1380/7learn-ali/assets/111766206/f2960916-890d-407c-9b27-785ba44e8bd5)


<div dir="rtl">
با سلام و عرض ادب 

از آنجایی که توضیح هر کد تولید شده ای، توسط نویسنده ی آن، سرعت و درک بهتر را به همراه دارد، توضیحاتی خدمتتان ارائه میکنم.

- ایجاد پست ها و تگ ها و کتگوری در سیدر + جاب ارسال اس ام اس =>
  [دسترسی سریع](https://gitlab.com/ali-salehi/7learn/-/blob/master/database/seeders/DatabaseSeeder.php?ref_type=heads)

- ورژن بندی api و مشخص کردن کنترلر مربوطه، با استفاده از میدلور و قبل از رسیدن درخواست به core اپلیکیشن =>
  [دسترسی سریع](https://gitlab.com/ali-salehi/7learn/-/blob/master/app/Http/Middleware/CheckControllerVersion.php?ref_type=heads)

- هلپر فانکشن مورد نظر ( تست هاش هم در unit نوشته شده) =>
  [دسترسی سریع](https://gitlab.com/ali-salehi/7learn/-/blob/master/app/Helpers/ArrayPairFinder.php?ref_type=heads)

- برای اس ام اس از روشی قدیمی pattern استفاده شده. همچنان در برخی اپلیکیشن ها استفاده میشه و کمی کار بیشتری برای پیاده سازی نسبت به روش های حال حاضر که کلید ها مشخص هستند، میبره =>
  [دسترسی سریع](https://gitlab.com/ali-salehi/7learn/-/blob/master/app/Notifications/Channels/NasrpayamSmsChannel.php?ref_type=heads) - [داکیومنت ippanel](https://github.com/ippanel/php-rest-sdk)



- چالش اسکریپت تغییر نام فایل با زبان Shell =>
  [لینک](https://gist.github.com/alisalehi1380/06b65b010d809a0e5fbb7c647b1e22c4) - [فیلم کارکرد](https://github.com/alisalehi1380/changer-files-name-shell-script)

- چالش کامند با زبان Golang =>
  [لینک](https://gist.github.com/alisalehi1380/395d44ed6ba45b2f2b6cdc134c0f5e48) - [فیلم کارکرد](https://github.com/alisalehi1380/find-pair-numbers-golang)


- من 2-3 روزی میشه که مودم ایرانسل خریداری کردم و متاسفانه به طور کامل دسترسی من به دانلود اکستنشن ها و پول کردن ایمیج ها بسته شده! خیلی از راه ها رو امتحان کردم ولی متاسفانه موفق نشدم. بر اساس تجربه پروژه رو داکرایز کردم و باید کار بکنه.
- و در نهایت، لطفا معذرت خواهی من رو بابت اینکه احتمال داره در بالا آوردن پروژه با داکر به اررور بر بخورید، بپذیرید.🙏


- این سبب شد برای استیک سرچ هم نتونم ایمیج ش رو بگیرم و به طور کامل پیاده سازی ش کنم. ولی با توجه به داکیومنت و ... برداشت من این هست که برای fulltext search در لاراول میشه از laravel/scout استفاده کرد. البته باید درایور الستیک روش نصب بشه.
- با توجه به جمله ی "برای حالتی که الستیک سرچ به هر دلیلی خالی می شود و باید دوباره پست هارا ایندکس کرد راه حل مناسب و سریع در نظر بگیرید" به نظرم منظور شما استفاده از این پکیج نبوده و باید به عنوان یک سرویس به الستیک نگاه کرد و به صورت یک observer تمام حرکات در MySql رو توی الستیک اعمال کرد.

</div>
