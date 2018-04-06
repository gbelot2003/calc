<!DOCTYPE html>

<html>
@include("layouts.gdc.head")

<body id="collection-56de15d1b654f94cc96bd7f9">
<a href="https://www.delcampo.academy/#" class="body-overlay"></a>

@include('layouts.gdc._sub')

<div id="siteWrapper" class="clearfix">

    @include("layouts.gdc._nav")

    <div class="banner-thumbnail-wrapper has-description" data-content-field="main-image" data-annotation-alignment="bottom left">
        <div class="color-overlay" style="background: url(/images/i3.jpg) no-repeat -4px -454px; background-size: 100% 1200px;" ></div>
        <div class="desc-wrapper">
            <p id="yui_3_17_2_1_1493864649640_49">
                <strong data-shrink-original-size="68" style="letter-spacing: 0.0588235em;">Calculadora</strong>
                <strong data-shrink-original-size="68" style="letter-spacing: 0.0588235em;">&nbsp;Virtual</strong>
            </p>
        </div>
    </div>

    <main id="page" role="main">
        <div class="app">
            @yield('content')
        </div>
    </main>

    @include('layouts.gdc._footer')
    <script src="/js/app.js"></script>
</div>
</body>
</html>