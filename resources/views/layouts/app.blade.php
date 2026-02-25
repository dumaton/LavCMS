<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ХимТехПром - промышленное оборудование и химия под заказ')</title>
    <meta name="description" content="@yield('meta_description', 'Комплексные поставки промышленного оборудования, промышленной химии, инструмента и расходных материалов от ведущих мировых производителей.')">
    <link rel="stylesheet" href="{{ asset('v2/styles.css') }}" data-precedence="styles.css">
    <link rel="icon" href="/icon.png" type="image/png">
    <style>
      @media (max-width: 1023px) {
        #mobile-menu { display: none; position: absolute; top: 100%; left: 0; right: 0; z-index: 50; }
        #mobile-menu.is-open { display: flex !important; }
      }
      @media (min-width: 1024px) {
        #mobile-menu { display: none !important; }
      }
    </style>
  </head>
  <body class="font-sans antialiased">
    <header
      id="site-header"
      class="sticky top-0 left-0 right-0 z-50 bg-white backdrop-blur-md border-b border-gray-200 shadow-sm relative"
    >
      <div
        class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 py-3 sm:py-4"
      >
        <a class="flex items-center gap-3" href="{{ route('home') }}">
          <img
            src="{{ asset('images/logo.png') }}"
            alt="Химтехпром — промышленное оборудование"
            class="object-contain"
            width="100"
            fetchpriority="high"
          />
        </a>
        <div class="flex flex-col">
          <span class="text-lg font-bold tracking-wide text-[#0e4098] uppercase">Химтехпром</span>
          <span class="text-[10px] tracking-[0.25em] text-[#8b9ab5] uppercase">Промышленное оборудование</span>
        </div>
        <nav class="hidden items-center gap-6 lg:flex" aria-label="Основное меню">
          <a class="text-sm font-medium text-gray-700 transition-colors hover:text-[#2c5282] tracking-wide uppercase" href="#about">О компании</a>
          <a class="text-sm font-medium text-gray-700 transition-colors hover:text-[#2c5282] tracking-wide uppercase" href="#brands">Бренды</a>
          <a class="text-sm font-medium text-gray-700 transition-colors hover:text-[#2c5282] tracking-wide uppercase" href="#products">Продукция</a>
          <a class="text-sm font-medium text-gray-700 transition-colors hover:text-[#2c5282] tracking-wide uppercase" href="#contacts">Контакты</a>
          <a href="tel:+79174360001" class="flex items-center gap-1.5 text-sm text-gray-600 transition-colors hover:text-[#1a2b4c]">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0" aria-hidden="true"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>
            <span>+7 (917) 436-00-01</span>
          </a>
          <a href="tel:+73472151757" class="flex items-center gap-1.5 text-sm text-gray-600 transition-colors hover:text-[#1a2b4c]">
            <span>+7 (347) 215-17-57</span>
          </a>
          <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive h-9 py-2 has-[>svg]:px-3 bg-[#2c5282] text-[#f8f9fb] hover:bg-[#3b6db5] rounded-sm px-6" href="#contacts">Запросить КП</a>
        </nav>
        <button
          id="menu-toggle"
          type="button"
          class="lg:hidden p-2 text-gray-700 hover:bg-gray-100 rounded-sm transition-colors"
          aria-label="Открыть меню"
          aria-controls="mobile-menu"
          aria-expanded="false"
        >
          <span class="menu-icon-open">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6" aria-hidden="true">
              <path d="M4 5h16"></path>
              <path d="M4 12h16"></path>
              <path d="M4 19h16"></path>
            </svg>
          </span>
          <span class="menu-icon-close hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6" aria-hidden="true">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </span>
        </button>
      </div>
      <div
        id="mobile-menu"
        class="flex flex-col bg-white border-t border-gray-200 shadow-lg max-h-[calc(100vh-4rem)] overflow-y-auto lg:hidden"
        aria-hidden="true"
        aria-label="Мобильное меню"
      >
        <nav class="flex flex-col gap-0 p-4" aria-label="Основное меню">
          <a class="mobile-menu-link py-3 px-4 text-base font-medium text-gray-700 hover:text-[#2c5282] hover:bg-gray-100 rounded-sm uppercase tracking-wide" href="#about">О компании</a>
          <a class="mobile-menu-link py-3 px-4 text-base font-medium text-gray-700 hover:text-[#2c5282] hover:bg-gray-100 rounded-sm uppercase tracking-wide" href="#brands">Бренды</a>
          <a class="mobile-menu-link py-3 px-4 text-base font-medium text-gray-700 hover:text-[#2c5282] hover:bg-gray-100 rounded-sm uppercase tracking-wide" href="#products">Продукция</a>
          <a class="mobile-menu-link py-3 px-4 text-base font-medium text-gray-700 hover:text-[#2c5282] hover:bg-gray-100 rounded-sm uppercase tracking-wide" href="#contacts">Контакты</a>
          <a class="mobile-menu-link flex items-center gap-2 py-3 px-4 text-base text-gray-600 hover:text-[#1a2b4c] hover:bg-gray-100 rounded-sm" href="tel:+79174360001">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>
            +7 (917) 436-00-01
          </a>
          <a class="mobile-menu-link flex items-center gap-2 py-3 px-4 text-base text-gray-600 hover:text-[#1a2b4c] hover:bg-gray-100 rounded-sm" href="tel:+73472151757">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>
            +7 (347) 215-17-57
          </a>
          <a class="mobile-menu-link inline-flex items-center justify-center py-3 px-6 mt-2 text-sm font-medium text-white bg-[#2c5282] rounded-sm hover:bg-[#1e4a8a] uppercase tracking-wide" href="#contacts">Запросить КП</a>
        </nav>
      </div>
    </header>

    <main>
      @yield('content')
    </main>

    <footer class="bg-[#0f1a2e] border-t border-[#1e3054]">
      <div class="mx-auto max-w-7xl px-6 py-16">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
          <div class="flex flex-col gap-4 lg:col-span-1">
            <div class="flex items-center gap-3">
              <span class="text-base font-bold tracking-wide text-[#f8f9fb] uppercase">Химтехпром</span>
            </div>
            <p class="text-sm leading-relaxed text-[#8b9ab5]">
              Комплексные поставки промышленного оборудования и химии для предприятий России и СНГ.
            </p>
            <div class="flex flex-col gap-2 mt-2">
              <a href="tel:+79174360001" class="flex items-center gap-2 text-sm text-[#8b9ab5] hover:text-[#f8f9fb] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4" aria-hidden="true">
                  <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                </svg>
                +7 (917) 436-00-01
              </a>
              <a href="tel:+73472151757" class="flex items-center gap-2 text-sm text-[#8b9ab5] hover:text-[#f8f9fb] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4" aria-hidden="true">
                  <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                </svg>
                +7 (347) 215-17-57
              </a>
              <a href="mailto:ooohtp@mail.ru" class="flex items-center gap-2 text-sm text-[#8b9ab5] hover:text-[#f8f9fb] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4" aria-hidden="true">
                  <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                  <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                </svg>
                ooohtp@mail.ru
              </a>
              <span class="flex items-center gap-2 text-sm text-[#8b9ab5]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4" aria-hidden="true">
                  <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>
                г. Уфа, ул. Гоголя, 60/1
              </span>
            </div>
          </div>
          <div class="flex flex-col gap-4">
            <h4 class="text-xs font-medium tracking-widest text-[#5a9cf5] uppercase">Навигация</h4>
            <nav class="flex flex-col gap-2.5">
              <a class="text-sm text-[#8b9ab5] transition-colors hover:text-[#f8f9fb]" href="#about">О компании</a>
              <a class="text-sm text-[#8b9ab5] transition-colors hover:text-[#f8f9fb]" href="#brands">Бренды</a>
              <a class="text-sm text-[#8b9ab5] transition-colors hover:text-[#f8f9fb]" href="#products">Продукция</a>
              <a class="text-sm text-[#8b9ab5] transition-colors hover:text-[#f8f9fb]" href="#contacts">Контакты</a>
            </nav>
          </div>
          <div class="flex flex-col gap-4">
            <h4 class="text-xs font-medium tracking-widest text-[#5a9cf5] uppercase">Продукция</h4>
            <nav class="flex flex-col gap-2.5">
              <span class="text-sm text-[#8b9ab5] transition-colors">Приводная техника</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">КИП и автоматика</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">Насосное оборудование</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">Трубопроводная арматура</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">Химия для нефтепереработки</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">Химия для лакокрасочных предприятий</span>
              <span class="text-sm text-[#8b9ab5] transition-colors">Химия для пищевой промышленности</span>
            </nav>
          </div>
          <div class="flex flex-col gap-4">
            <h4 class="text-xs font-medium tracking-widest text-[#5a9cf5] uppercase">Реквизиты</h4>
            <div class="flex flex-col gap-2 text-sm text-[#8b9ab5]">
              <p>ООО «Химтехпром»</p>
              <p>ИНН: 0276974787</p>
              <p>КПП: 027401001</p>
              <p>ОГРН: 1230200013779</p>
              <p class="mt-2 text-xs leading-relaxed">
                Юр. адрес: 450015, г. Уфа, ул. Гоголя, д. 60/1, офис 504
              </p>
            </div>
          </div>
        </div>
        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-[#1e3054] pt-8 md:flex-row">
          <p class="text-xs text-[#5a6a85]">
            © {{ date('Y') }} ООО «Химтехпром». Все права защищены.
          </p>
          <div class="flex gap-6">
            <a class="text-xs text-[#5a6a85] hover:text-[#8b9ab5] transition-colors" href="#">Политика конфиденциальности</a>
            <a class="text-xs text-[#5a6a85] hover:text-[#8b9ab5] transition-colors" href="#">Пользовательское соглашение</a>
          </div>
        </div>
      </div>
    </footer>

    @if(session('success') || session('error') || ($errors->any() ?? false))
      <div
        id="flash-toast"
        class="fixed z-[60] bottom-4 right-4 max-w-xs w-full sm:w-80 transform transition-all duration-300 ease-out translate-y-0 opacity-100"
      >
        @if(session('success'))
          <div class="relative overflow-hidden rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-xl shadow-emerald-900/10 text-sm text-emerald-900">
            <div class="flex gap-3">
              <div class="mt-0.5">
                <svg class="h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293A1 1 0 106.293 10.707l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
              </div>
              <div class="flex-1">
                <p class="font-medium">Сообщение отправлено</p>
                <p class="mt-1 text-xs text-emerald-800">{{ session('success') }}</p>
              </div>
              <button type="button" id="flash-toast-close" class="ml-2 text-emerald-700/70 hover:text-emerald-900 transition-colors">
                <span class="sr-only">Закрыть</span>
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M6 6l8 8M6 14L14 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
        @elseif(session('error') || $errors->any())
          <div class="relative overflow-hidden rounded-md border border-red-200 bg-red-50 px-4 py-3 shadow-xl shadow-red-900/10 text-sm text-red-900">
            <div class="flex gap-3">
              <div class="mt-0.5">
                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l6.518 11.59C19.02 16.95 18.245 18 17.104 18H2.896c-1.14 0-1.915-1.05-1.157-2.31l6.518-11.59zM11 8a1 1 0 10-2 0v3.5a1 1 0 102 0V8zm-1 6a1.25 1.25 0 100-2.5A1.25 1.25 0 0010 14z" clip-rule="evenodd"/>
                </svg>
              </div>
              <div class="flex-1">
                <p class="font-medium">Не удалось отправить</p>
                <p class="mt-1 text-xs text-red-800">
                  @if(session('error'))
                    {{ session('error') }}
                  @elseif($errors->any())
                    Проверьте форму ниже и исправьте ошибки, затем попробуйте ещё раз.
                  @endif
                </p>
              </div>
              <button type="button" id="flash-toast-close" class="ml-2 text-red-700/70 hover:text-red-900 transition-colors">
                <span class="sr-only">Закрыть</span>
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M6 6l8 8M6 14L14 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
        @endif
      </div>
    @endif

    <script>
      (function () {
        var header = document.getElementById('site-header');
        var toggle = document.getElementById('menu-toggle');
        var menu = document.getElementById('mobile-menu');
        var openIcon = toggle && toggle.querySelector('.menu-icon-open');
        var closeIcon = toggle && toggle.querySelector('.menu-icon-close');
        var links = menu && menu.querySelectorAll('a');

        function openMenu() {
          if (!menu || !toggle) return;
          menu.classList.add('is-open');
          menu.setAttribute('aria-hidden', 'false');
          toggle.setAttribute('aria-expanded', 'true');
          toggle.setAttribute('aria-label', 'Закрыть меню');
          if (openIcon) openIcon.classList.add('hidden');
          if (closeIcon) closeIcon.classList.remove('hidden');
          document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
          if (!menu || !toggle) return;
          menu.classList.remove('is-open');
          menu.setAttribute('aria-hidden', 'true');
          toggle.setAttribute('aria-expanded', 'false');
          toggle.setAttribute('aria-label', 'Открыть меню');
          if (openIcon) openIcon.classList.remove('hidden');
          if (closeIcon) closeIcon.classList.add('hidden');
          document.body.style.overflow = '';
        }

        var closeBtn = document.getElementById('mobile-menu-close');
        if (toggle && menu) {
          toggle.addEventListener('click', function () {
            if (menu.classList.contains('is-open')) closeMenu();
            else openMenu();
          });
          if (closeBtn) closeBtn.addEventListener('click', closeMenu);
          if (links && links.length) {
            for (var i = 0; i < links.length; i++) {
              links[i].addEventListener('click', closeMenu);
            }
          }
          document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) closeMenu();
          });
        }
      })();

      (function () {
        var toast = document.getElementById('flash-toast');
        if (!toast) return;

        var closeBtn = document.getElementById('flash-toast-close');
        function hideToast() {
          toast.classList.add('opacity-0', 'translate-y-2', 'pointer-events-none');
          setTimeout(function () {
            if (toast && toast.parentNode) {
              toast.parentNode.removeChild(toast);
            }
          }, 300);
        }

        if (closeBtn) {
          closeBtn.addEventListener('click', hideToast);
        }

        setTimeout(hideToast, 5000);
      })();
    </script>
  </body>
</html>
