<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    @hasSection('meta_keywords')
    <meta name="keywords" content="@yield('meta_keywords')">
    @endif
    <link rel="stylesheet" href="{{ asset('styles.css') }}" data-precedence="styles.css">
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/png">
    <style>
      @media (max-width: 1023px) {
        #mobile-menu {
          display: none;
          position: absolute;
          top: 100%;
          left: 0;
          right: 0;
          z-index: 50;
        }

        #mobile-menu.is-open {
          display: flex !important;
        }
      }

      @media (min-width: 1024px) {
        #mobile-menu {
          display: none !important;
        }
      }
    </style>
    @stack('styles')
  </head>
  <body class="font-sans antialiased">
    @php
      $mainMenuItems = \App\Models\MenuItem::active()->ordered()->get();
      $phoneMobile = \App\Models\Setting::get('phone_mobile');
      $phoneCity = \App\Models\Setting::get('phone_city');
    @endphp
    <header id="site-header" class="fixed top-0 left-0 right-0 z-50 bg-navy/95 backdrop-blur-sm border-b border-navy-light">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8">
        <a class="flex items-center gap-3" href="{{ route('home') }}">
          <div class="flex h-10 w-10 items-center justify-center rounded-sm border border-gold">
            <span class="font-serif text-lg font-bold text-gold">ГРХ</span>
          </div>
          <div class="">
            <p class="text-sm font-semibold leading-tight text-primary-foreground">Адвокат Гиндуллин</p>
            <p class="text-xs leading-tight text-gold">Ришат Хатмуллович</p>
          </div>
        </a>
        <nav class="hidden items-center gap-8 lg:flex">
          @foreach($mainMenuItems as $item)
            <a
              class="text-sm font-medium tracking-wide text-primary-foreground/80 transition-colors hover:text-gold"
              href="{{ $item->url }}"
              @if($item->open_new_tab) target="_blank" rel="noopener" @endif
            >
              {{ $item->title }}
            </a>
          @endforeach
        </nav>
        <div class="hidden items-center gap-4 lg:flex">
          @if($phoneMobile)
            <a href="tel:{{ preg_replace('/\D+/', '', $phoneMobile) }}" class="flex items-center gap-2 text-sm font-medium text-gold transition-colors hover:text-gold-light">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4" aria-hidden="true">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
              </svg>
              {{ $phoneMobile }}
            </a>
          @endif
          @if($phoneCity)
            <a href="tel:{{ preg_replace('/\D+/', '', $phoneCity) }}" class="hidden xl:flex items-center gap-2 text-xs font-medium text-primary-foreground/80 transition-colors hover:text-gold">
              {{ $phoneCity }}
            </a>
          @endif
        </div>
        <button
          id="menu-toggle"
          type="button"
          class="text-primary-foreground lg:hidden p-2 rounded-sm hover:bg-navy-light/60 transition-colors"
          aria-label="Открыть меню"
          aria-controls="mobile-menu"
          aria-expanded="false"
        >
          <span class="menu-icon-open">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu h-6 w-6" aria-hidden="true">
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
        class="flex flex-col bg-navy-light border-t border-navy-light shadow-lg max-h-[calc(100vh-4rem)] overflow-y-auto lg:hidden"
        aria-hidden="true"
        aria-label="Мобильное меню"
      >
        <nav class="flex flex-col gap-0 p-4" aria-label="Основное меню">
          @foreach($mainMenuItems as $item)
            <a
              class="mobile-menu-link py-3 px-4 text-base font-medium text-white hover:text-gold hover:bg-navy-light/60 rounded-sm tracking-wide"
              href="{{ $item->url }}"
              @if($item->open_new_tab) target="_blank" rel="noopener" @endif
            >
              {{ $item->title }}
            </a>
          @endforeach
          @if($phoneMobile)
            <a class="mobile-menu-link flex items-center gap-2 py-3 px-4 text-base text-white hover:text-gold hover:bg-navy-light/60 rounded-sm" href="tel:{{ preg_replace('/\D+/', '', $phoneMobile) }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
              </svg>
              {{ $phoneMobile }}
            </a>
          @endif
        </nav>
      </div>
    </header>

    <main>
      @yield('content')
    </main>

    <footer class="border-t border-navy-light bg-navy py-12">
      <div class="mx-auto max-w-7xl px-4 lg:px-8">
        <div class="flex flex-col items-center gap-6 md:flex-row md:justify-between">
          <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 items-center justify-center rounded-sm border border-gold">
              <span class="font-serif text-base font-bold text-gold">ГРХ</span>
            </div>
            <div>
              <p class="text-sm font-semibold text-primary-foreground">Адвокат Гиндуллин Р.Х.</p>
              <p class="text-xs text-primary-foreground/60">НО «Уфимская коллегия адвокатов» РБ</p>
            </div>
          </div>
          <nav class="flex flex-wrap items-center justify-center gap-6">
            @foreach($mainMenuItems as $item)
              <a
                class="text-sm text-primary-foreground/60 transition-colors hover:text-gold"
                href="{{ $item->url }}"
                @if($item->open_new_tab) target="_blank" rel="noopener" @endif
              >
                {{ $item->title }}
              </a>
            @endforeach
          </nav>
        </div>
        <div class="mt-8 border-t border-navy-light pt-8">
          <div class="flex flex-col items-center gap-4 text-center md:flex-row md:justify-between md:text-left">
            <p class="text-xs text-primary-foreground/40">
              2026 Адвокат Гиндуллин Ришат Хатмуллович. Все права защищены.
            </p>
            <a
              class="text-xs text-primary-foreground/40 transition-colors hover:text-gold"
              href="{{ route('legal.privacy') }}"
            >
              Политика конфиденциальности
            </a>
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

    @if(!empty($analyticsCode))
      {!! $analyticsCode !!}
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
    @stack('scripts')
  </body>
</html>
