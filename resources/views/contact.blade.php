@extends('layout.main')
@section('title', __('front/contact.txt1'))
@section('content')

    @endsection
    @section('script')
        <script>
            function onSubmit(token) {
                document.getElementById("contact-form").submit();
            }
        </script>
    @endsection
