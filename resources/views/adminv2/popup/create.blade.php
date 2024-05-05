@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    <p>{{ __("admin/{$folder}.info") }}</p>
    {!! Form::label('type', __("admin/{$folder}.form_type")) !!}
    {!! Form::select(
        'type',
        [
            0 => __('admin/general.select'),
            'image' => __("admin/{$folder}.type_image"),
            'text' => __("admin/{$folder}.type_text"),
            'video' => __("admin/{$folder}.type_video"),
        ],
        'default',
        ['class' => 'form-control', 'id' => 'type'],
    ) !!}
    <div id="image" style="display: none">
        {!! Form::file('image', ['class' => 'dropify-image', 'accept' => '.png, .jpg, .jpeg, .gif']) !!}
    </div>
    @foreach (languageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label('title', __("admin/{$folder}.form_title")) !!}
            {!! Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) !!}
        </div>
        <div id="text" style="display: none">
            {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", null, ['class' => 'editor']) !!}
        </div>
    @endforeach
    <div id="video" style="display: none">
        {!! Form::label('video', __("admin/{$folder}.form_video")) !!}
        {!! Form::url('video', null, [
            'class' => 'form-control',
            'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            'id' => null,
        ]) !!}
    </div>
    <div class="row">
        <div class="col-lg-4">
            {!! Form::label('time', __("admin/{$folder}.form_time")) !!}
            {!! Form::number('time', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_time_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('width', __("admin/{$folder}.form_width")) !!}
            {!! Form::number('width', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_width_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('url', __("admin/{$folder}.form_url")) !!}
            {!! Form::url('url', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_url_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('closeButton', __("admin/{$folder}.form_closeButton")) !!}
            {!! Form::select('closeButton', App\Enums\StatusEnum::getTrueFalseSelectArray(), 'default', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('closeOnEscape', __("admin/{$folder}.form_closeOnEscape")) !!}
            {!! Form::select('closeOnEscape', App\Enums\StatusEnum::getTrueFalseSelectArray(), 'default', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('overlayClose', __("admin/{$folder}.form_overlayClose")) !!}
            {!! Form::select('overlayClose', App\Enums\StatusEnum::getTrueFalseSelectArray(), 'default', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('pauseOnHover', __("admin/{$folder}.form_pauseOnHover")) !!}
            {!! Form::select('pauseOnHover', App\Enums\StatusEnum::getTrueFalseSelectArray(), 'default', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('fullScreenButton', __("admin/{$folder}.form_fullScreenButton")) !!}
            {!! Form::select('fullScreenButton', App\Enums\StatusEnum::getTrueFalseSelectArray(), 'default', [
                'class' => 'form-control',
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('color', __("admin/{$folder}.form_color")) !!}
            {!! Form::color('color', null, [
                'class' => 'form-control form-control-color',
            ]) !!}
        </div>
    </div>
    {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
    {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
@endsection
@push('script')
    <script>
        $("#type").on("change", function() {
            var type = $(this).val();
            $("#" + type).show();
            $("#text, #image, #video").not("#" + type).hide();
        });
    </script>
@endpush
