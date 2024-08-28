@inject('helper', 'Backpack\LanguageSwitcher\Helpers\LanguageSwitcherHelper')
 
<li class="nav-item me-2 dropdown language-switcher">
    
    <a class="nav-link dropdown-toggle text-decoration-none" data-bs-toggle="dropdown" data-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" style="cursor: pointer">
        @if($flags ?? true)
        <span class="nav-link-icon" style="width: fit-content">
            <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($helper->getCurrentLocale()) }}" style="width: 1.5rem" />
        </span>
        @endif
        @if($main_label ?? false || (($flags ?? true) === false && !isset($main_label)))
        <span class="nav-link-title">
            {{ is_string($main_label ?? false) ? $main_label : $helper->getLocaleName($helper->getCurrentLocale()) }}
          
        </span>
        @endif
        {{__("dashboard.Language")}}
        
    </a>
    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-end" style="right: 0">
        @php
            $useAdminPrefix = config('backpack.language-switcher.use_backpack_route_prefix');
        @endphp
        @foreach(config('backpack.crud.locales', []) as $locale => $name)
        <li>
            <a class="dropdown-item {{ $locale === $helper->getCurrentLocale() ? 'active disabled' : '' }}" href="{{ route('language-switcher.locale', [
                    'locale' => $useAdminPrefix ? $locale : null, 
                    'backpack_prefix' => $useAdminPrefix ? config('backpack.base.route_prefix') : 'set-locale',
                    'setLocale' => $useAdminPrefix ? 'set-locale' : $locale
                ])}}">
                @if($flags ?? true)
                <span class="nav-link-icon" style="width: fit-content">
                    <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($locale) }}" style="width: 1.5rem" />
                </span>
                @endif
                <span class="nav-link-title">
                    {{ $name }}
                </span>
            </a>
        </li>
        @endforeach
    </ul>
</li>
{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@role('admin')
<x-backpack::menu-dropdown title="{{trans('dashboard.Authentication')}}" icon="la las la-shield-alt">
    {{-- <x-backpack::menu-dropdown-header title="Authentication" /> --}}
    <x-backpack::menu-dropdown-item title="{{trans('dashboard.Users')}}" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="{{trans('dashboard.Roles')}}" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="title="{{trans('dashboard.Permissions')}}" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
@endrole

<x-backpack::menu-item title="{{trans('dashboard.Books')}}" icon="la la-book-open" :link="backpack_url('book')" />
<x-backpack::menu-item title="{{trans('dashboard.Authors')}}" icon="la la-user-edit" :link="backpack_url('author')" />
<x-backpack::menu-item title="{{trans('dashboard.Categories')}}" icon="la la-question" :link="backpack_url('category')" />
<x-backpack::menu-item title="{{trans('dashboard.Publishers')}}" icon="la la-landmark" :link="backpack_url('publisher')" />

{{-- <x-backpack::menu-dropdown title="Translation Manager" icon="la la-language"> --}}
    {{-- <x-backpack::menu-dropdown-item title="Arabic" icon="flag flag-saudi-arabia" :link="backpack_url('ar')" />
    <x-backpack::menu-dropdown-item title="English" icon="la la-group" :link="backpack_url('en')" /> --}}
  
{{-- </x-backpack::menu-dropdown> --}}
{{-- <x-backpack::menu-item title="Translation Manager" icon="la la-stream" :link="backpack_url('translation-manager')" /> --}}
<x-backpack::menu-item title='Settings' icon='la la-cog' :link="backpack_url('setting')" />