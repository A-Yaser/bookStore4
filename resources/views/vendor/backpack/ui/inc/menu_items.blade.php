@inject('helper', 'Backpack\LanguageSwitcher\Helpers\LanguageSwitcherHelper')
{{-- {{__("dashboard.Language")}} --}}

<x-backpack::menu-dropdown title="{{trans('dashboard.Authentication')}}" icon="la las la-shield-alt">
    {{-- <x-backpack::menu-dropdown-header title="Authentication" /> --}}
    @can('users.see')<x-backpack::menu-dropdown-item title="{{trans('dashboard.Users')}}" icon="la la-user" :link="backpack_url('user')" />@endcan
    <x-backpack::menu-dropdown-item title="{{trans('dashboard.Roles')}}" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="{{trans('dashboard.Permissions')}}" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>



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
<x-backpack::menu-item title="Roles" icon="la la-question" :link="backpack_url('role')" />
<x-backpack::menu-item title="Permissions" icon="la la-question" :link="backpack_url('permission')" />