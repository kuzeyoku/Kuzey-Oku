@extends(themeView('admin', 'layout.edit'), ['item' => $popup])
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/izimodal.min.css') }}">
@endpush
@section('form')
    {!! Form::label('type', __("admin/{$folder}.form_type")) !!}
    {!! Form::select(
        'type',
        [
            0 => __('admin/general.select'),
            'image' => __("admin/{$folder}.type_image"),
            'text' => __("admin/{$folder}.type_text"),
            'video' => __("admin/{$folder}.type_video"),
        ],
        $popup->type,
        ['class' => 'form-control', 'id' => 'type'],
    ) !!}
    <div id="image" style="display: none">
        {!! Form::file('image', [
            'class' => 'dropify',
            'data-default-file' => $popup->image_url,
            'accept' => '.png, .jpg, .jpeg, .gif',
        ]) !!}
    </div>
    <div class="tab-content">
        @foreach (languageList() as $key => $lang)
            <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
                {!! Form::label('title', __("admin/{$folder}.form_title")) !!}
                {!! Form::text("title[$lang->code]", $popup->titles[$lang->code] ?? null, [
                    'class' => 'form-control',
                    'placeholder' => __("admin/{$folder}.form_title_placeholder"),
                ]) !!}
                <div id="text" style="display: none">
                    {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
                    {!! Form::textarea("description[$lang->code]", $popup->descriptions[$lang->code] ?? null, ['class' => 'editor']) !!}
                </div>
            </div>
        @endforeach
    </div>
    <div id="video" style="display: none">
        {!! Form::label('video', __("admin/{$folder}.form_video")) !!}
        {!! Form::url('video', $popup->video, [
            'class' => 'form-control',
            'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            'id' => null,
        ]) !!}
    </div>
    <div class="row">
        <div class="col-lg-4">
            {!! Form::label('time', __("admin/{$folder}.form_time")) !!}
            {!! Form::number('time', $popup->settings->time, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_time_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('width', __("admin/{$folder}.form_width")) !!}
            {!! Form::number('width', $popup->settings->width, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_width_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('url', __("admin/{$folder}.form_url")) !!}
            {!! Form::url('url', $popup->url, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_url_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('closeButton', __("admin/{$folder}.form_closeButton")) !!}
            {!! Form::select('closeButton', App\Enums\StatusEnum::getTrueFalseSelectArray(), $popup->settings->closeButton, [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('closeOnEscape', __("admin/{$folder}.form_closeOnEscape")) !!}
            {!! Form::select(
                'closeOnEscape',
                App\Enums\StatusEnum::getTrueFalseSelectArray(),
                $popup->settings->closeOnEscape,
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('overlayClose', __("admin/{$folder}.form_overlayClose")) !!}
            {!! Form::select(
                'overlayClose',
                App\Enums\StatusEnum::getTrueFalseSelectArray(),
                $popup->settings->overlayClose,
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('pauseOnHover', __("admin/{$folder}.form_pauseOnHover")) !!}
            {!! Form::select(
                'pauseOnHover',
                App\Enums\StatusEnum::getTrueFalseSelectArray(),
                $popup->settings->pauseOnHover,
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('fullScreenButton', __("admin/{$folder}.form_fullScreenButton")) !!}
            {!! Form::select(
                'fullScreenButton',
                App\Enums\StatusEnum::getTrueFalseSelectArray(),
                $popup->settings->fullScreenButton,
                ['class' => 'form-control'],
            ) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('color', __("admin/{$folder}.form_color")) !!}
            {!! Form::color('color', $popup->settings->color, [
                'class' => 'form-control form-control-color',
            ]) !!}
        </div>
    </div>
    {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
    {!! Form::select('status', statusList(), $popup->status, ['class' => 'form-control']) !!}
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var type = $("#type").val()
            $("#" + type).show();
        });
        $("#type").on("change", function() {
            var type = $(this).val();
            $("#" + type).show();
            $("#text, #image, #video").not("#" + type).hide();
        });
    </script>
@endpush
