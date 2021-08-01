    @include('includes.head')

    {{-- Style --}}
    @include('includes.style')

</head>

<body>
    {{-- Sidebar --}}
    @include('includes.sidebar')

    <div id="right-panel" class="right-panel">
        {{-- navbar --}}
        @include('includes.navbar')
        
        <div class="content">
            {{-- content --}}
            @yield('content')

        </div>
        
        <div class="clearfix"></div>
    </div>

    {{-- Scripts --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>
</html>
