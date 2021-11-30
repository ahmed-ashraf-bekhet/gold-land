<!-- (defer) specifies that the script is executed when the page has finished parsing -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
{{-- @if(app()->getLocale() == 'ar') --}}
{{-- <script
  src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"
  integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH"
  crossorigin="anonymous"></script> --}}
{{-- @endif --}}


{{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> --}}
{{-- <script>
    CKEDITOR.replace( 'article-ckeditor' );
    // <textarea id="article-ckeditor"></textarea>
    // id="article-ckeditor"
</script> --}}

@yield('script')
