<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-100 p-0 h-0.5">
    <flux:sidebar sticky collapsible="mobile"
    class="m-4 p-4 shadow-sm h-[calc(100vh-2rem)] w-64 rounded-2xl border border-zinc-200 bg-white shadow-sm">

    <flux:sidebar.header class="px-2 pt-2">

        <x-app-logo
            :sidebar="true"
            href="{{ route('dashboard') }}"
            wire:navigate
        />

        <flux:sidebar.collapse class="lg:hidden" />

    </flux:sidebar.header>


    <flux:sidebar.nav>

        @if(auth()->user()->isAdmin())

            <flux:sidebar.group :heading="__('Admin')" class="grid">

                <flux:sidebar.item
                    icon="home"
                    :href="route('admin.dashboard')"
                    :current="request()->routeIs('admin.dashboard')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700">
                    Dashboard
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="users"
                    :href="route('admin.students.index')"
                    :current="request()->routeIs('admin.students.*')"
                    wire:navigate>
                    Students
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="user"
                    :href="route('admin.teachers.index')"
                    :current="request()->routeIs('admin.teachers.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    Teachers
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="user-group"
                    :href="route('admin.parents.index')"
                    :current="request()->routeIs('admin.parents.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    Parents
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="academic-cap"
                    :href="route('admin.classes.index')"
                    :current="request()->routeIs('admin.classes.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700">
                    Classes
                </flux:sidebar.item>

            </flux:sidebar.group>


        @elseif(auth()->user()->isTeacher())

            <flux:sidebar.group :heading="__('Teacher')" class="grid gap-1">

                <flux:sidebar.item
                    icon="home"
                    :href="route('teacher.dashboard')"
                    :current="request()->routeIs('teacher.dashboard')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    Dashboard
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="users"
                    :href="route('teacher.students.index')"
                    :current="request()->routeIs('teacher.students.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    <div class="flex w-full items-center justify-between">
        <span>My Students</span>

        <span class="rounded-md bg-red-500 px-2 py-0.5 text-xs font-bold text-white">
            3
        </span>
    </div>
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="academic-cap"
                    :href="route('teacher.classes.index')"
                    :current="request()->routeIs('teacher.classes.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    My Classes
                </flux:sidebar.item>

            </flux:sidebar.group>


        @elseif(auth()->user()->isParent())

            <flux:sidebar.group :heading="__('Parent')" class="grid">

                <flux:sidebar.item
                    icon="home"
                    :href="route('parent.dashboard')"
                    :current="request()->routeIs('parent.dashboard')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    Dashboard
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="academic-cap"
                    :href="route('parent.children.index')"
                    :current="request()->routeIs('parent.children.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700"
                    >
                    My Children
                </flux:sidebar.item>

            </flux:sidebar.group>


        @elseif(auth()->user()->isStudent())

            <flux:sidebar.group :heading="__('Student')" class="grid">

                <flux:sidebar.item
                    icon="home"
                    :href="route('student.dashboard')"
                    :current="request()->routeIs('student.dashboard')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700">
                    Dashboard
                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="users"
                    :href="route('student.teachers.index')"
                    :current="request()->routeIs('student.teachers.*')"
                    wire:navigate
                    class="data-current:bg-violet-50 data-current:text-violet-700">
                    My Teachers
                </flux:sidebar.item>

            </flux:sidebar.group>

        @endif

    </flux:sidebar.nav>


    <flux:spacer />

    <flux:spacer />

<div class="border-t border-zinc-200  px-3 pt-3 pb-2">
    <x-desktop-user-menu
        class="hidden lg:block"
        :name="auth()->user()->name"
    />
</div>

</flux:sidebar>
    {{-- <flux:header class="border-b border-zinc-200 bg-white dark:bg-zinc-900 px-6 shadow-sm ">

        <x-app-logo href="{{ route('dashboard') }}" wire:navigate />

        <flux:spacer />

        <flux:navbar>

            @if(auth()->user()->isAdmin())

                <flux:navbar.item :href="route('admin.dashboard')" wire:navigate>
                    Dashboard
                </flux:navbar.item>

                <flux:navbar.item :href="route('admin.students.index')" wire:navigate>
                    Students
                </flux:navbar.item>

                <flux:navbar.item :href="route('admin.teachers.index')" wire:navigate>
                    Teachers
                </flux:navbar.item>

                <flux:navbar.item :href="route('admin.parents.index')" wire:navigate>
                    Parents
                </flux:navbar.item>

                <flux:navbar.item :href="route('admin.classes.index')" wire:navigate>
                    Classes
                </flux:navbar.item>

            @elseif(auth()->user()->isTeacher())

                <flux:navbar.item :href="route('teacher.dashboard')" wire:navigate>
                    Dashboard
                </flux:navbar.item>

                <flux:navbar.item :href="route('teacher.students.index')" wire:navigate>
                    Students
                </flux:navbar.item>

                <flux:navbar.item :href="route('teacher.classes.index')" wire:navigate>
                    Classes
                </flux:navbar.item>

            @endif

        </flux:navbar>

        <flux:spacer />

        <x-desktop-user-menu :name="auth()->user()->name" />

    </flux:header> --}}


    {{-- <flux:sidebar sticky collapsible="mobile"
        class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <flux:sidebar.nav>

            @if(auth()->user()->isAdmin())

            <flux:sidebar.group :heading="__('Admin')" class="grid">

                <flux:sidebar.item icon="home" :href="route('admin.dashboard')"
                    :current="request()->routeIs('admin.dashboard')" wire:navigate>
                    Dashboard
                </flux:sidebar.item>


                <flux:sidebar.item icon="users" :href="route('admin.students.index')"
                    :current="request()->routeIs('admin.students.*')" wire:navigate>
                    Students
                </flux:sidebar.item>


                <flux:sidebar.item icon="user" :href="route('admin.teachers.index')"
                    :current="request()->routeIs('admin.teachers.*')" wire:navigate>
                    Teachers
                </flux:sidebar.item>


                <flux:sidebar.item icon="user-group" :href="route('admin.parents.index')"
                    :current="request()->routeIs('admin.parents.*')" wire:navigate>
                    Parents
                </flux:sidebar.item>

                <flux:sidebar.item icon="academic-cap" :href="route('admin.classes.index')"
                    :current="request()->routeIs('admin.classes.*')" wire:navigate>
                    Classes
                </flux:sidebar.item>


            </flux:sidebar.group>


            @elseif(auth()->user()->isTeacher())


            <flux:sidebar.group :heading="__('Teacher')" class="grid">


                <flux:sidebar.item icon="home" :href="route('teacher.dashboard')"
                    :current="request()->routeIs('teacher.dashboard')" wire:navigate>
                    Dashboard
                </flux:sidebar.item>


                <flux:sidebar.item icon="users" :href="route('teacher.students.index')"
                    :current="request()->routeIs('teacher.students.*')" wire:navigate>
                    My Students
                </flux:sidebar.item>

                <flux:sidebar.item icon="academic-cap" :href="route('teacher.classes.index')"
                    :current="request()->routeIs('teacher.classes.*')" wire:navigate>
                    My Classes
                </flux:sidebar.item>

            </flux:sidebar.group>


            @elseif(auth()->user()->isParent())


            <flux:sidebar.group :heading="__('Parent')" class="grid">


                <flux:sidebar.item icon="home" :href="route('parent.dashboard')"
                    :current="request()->routeIs('parent.dashboard')" wire:navigate>
                    Dashboard
                </flux:sidebar.item>


                <flux:sidebar.item icon="academic-cap" :href="route('parent.children.index')"
                    :current="request()->routeIs('parent.children.*')" wire:navigate>
                    My Children
                </flux:sidebar.item>


            </flux:sidebar.group>


            @elseif(auth()->user()->isStudent())


            <flux:sidebar.group :heading="__('Student')" class="grid">


                <flux:sidebar.item icon="home" :href="route('student.dashboard')"
                    :current="request()->routeIs('student.dashboard')" wire:navigate>
                    Dashboard
                </flux:sidebar.item>


                <flux:sidebar.item icon="users" :href="route('student.teachers.index')"
                    :current="request()->routeIs('student.teachers.*')" wire:navigate>
                    My Teachers
                </flux:sidebar.item>

            </flux:sidebar.group>


            @endif

        </flux:sidebar.nav>
        <flux:spacer />



        <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
    </flux:sidebar> --}}

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer" data-test="logout-button">
                        {{ __('Log out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @persist('toast')
    <flux:toast.group>
        <flux:toast />
    </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>